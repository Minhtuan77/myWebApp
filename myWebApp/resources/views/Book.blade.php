<!DOCTYPE html>
<html>
<head>
    <title>Danh sách sách</title>
</head>
<body>
    <h1>Danh sách sách</h1>
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
                <a href="/books/edit/{{ $book->id }}">Sửa</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
