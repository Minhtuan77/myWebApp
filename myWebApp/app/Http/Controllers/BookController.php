<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    // READ - Hiển thị danh sách sách
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    // CREATE - Hiển thị form thêm sách
    public function create()
    {
        return view('books.create');
    }

    // CREATE - Lưu sách mới
    public function store(Request $request)
    {
        Book::create($request->only(['title', 'author']));
        return redirect()->route('books.index');
    }

    // UPDATE - Hiển thị form sửa sách
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    // UPDATE - Lưu chỉnh sửa
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->update($request->only(['title', 'author']));
        return redirect()->route('books.index');
    }

    // DELETE - Xóa sách
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('books.index');
    }
}
