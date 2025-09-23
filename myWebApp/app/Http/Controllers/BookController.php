<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    // Hiển thị danh sách sách
    public function displayBook()
    {
        $books = Book::all();
        return view('Book', compact('books'));
    }

    // Hiển thị form chỉnh sửa
    public function editBook(Request $request)
    {
        $id = $request->id;
        $book = Book::findOrFail($id);
        return view('EditBook', compact('book'));
    }

    // Lưu thông tin chỉnh sửa
    public function saveBook(Request $request)
    {
        $id = $request->input('id');
        $title = $request->input('title');
        $author = $request->input('author');

        $book = Book::findOrFail($id);
        $book->update([
            'title' => $title,
            'author' => $author,
        ]);

        $books = Book::all();
        return view('Book', compact('books'));
    }
}