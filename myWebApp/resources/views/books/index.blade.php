<!DOCTYPE html>
<html>
<head>
    <title>Danh sách sách</title>
</head>
<body>
    <h1>Danh sách sách</h1>
    <a href="{{ route('books.create') }}">+ Thêm sách mới</a>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Tiêu đề</th>
            <th>Tác giả</th>
            <th>Hành động</th>
        </tr>
        @foreach($books as $book)
        <tr>
            <td>{{ $book->id }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td>
                <a href="{{ route('books.edit', $book->id) }}">Sửa</a> |
                <a href="{{ route('books.destroy', $book->id) }}" onclick="return confirm('Bạn có chắc muốn xóa không?')">Xóa</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
