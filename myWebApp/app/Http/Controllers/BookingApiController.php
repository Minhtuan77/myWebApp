<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Booking;
use App\Models\Room;
use App\Models\Customer;

class BookingApiController extends Controller
{
    // 📌 Lấy danh sách booking (GET /api/bookings)
    public function apiIndex(Request $request)
    {
        $query = Booking::with(['room', 'customer']);

        // Tìm kiếm theo tên khách hàng hoặc phòng
        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('customer', fn($q) => $q->where('name', 'like', "%{$search}%"))
                  ->orWhereHas('room', fn($q) => $q->where('name', 'like', "%{$search}%"));
        }

        $bookings = $query->paginate(10);

        return response()->json([
            'status' => 'success',
            'data' => $bookings->items(),
            'pagination' => [
                'total' => $bookings->total(),
                'per_page' => $bookings->perPage(),
                'current_page' => $bookings->currentPage(),
                'last_page' => $bookings->lastPage(),
            ]
        ], 200);
    }

    //  Tạo booking mới (POST /api/bookings)
    public function apiStore(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'customer_id' => 'required|exists:customers,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ]);

        $room = Room::findOrFail($request->room_id);

        // Kiểm tra phòng đã được đặt chưa
        if ($room->status === 'booked') {
            return response()->json([
                'status' => 'error',
                'message' => 'This room is already booked!'
            ], 400);
        }

        DB::beginTransaction();
        try {
            $customer = Customer::findOrFail($request->customer_id);

            $booking = Booking::create([
                'room_id' => $room->id,
                'customer_id' => $customer->id,
                'customer_name' => $customer->name,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);

            // Cập nhật trạng thái phòng & khách hàng
            $room->update(['status' => 'booked']);
            $customer->update(['status' => 'Booking']);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Booking created successfully!',
                'data' => $booking
            ], 201);

        } catch (\Exception $e) {
            DB::rollback();

            return response()->json([
                'status' => 'error',
                'message' => 'Booking failed!',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
