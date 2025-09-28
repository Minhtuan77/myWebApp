<!DOCTYPE html>
<html>
<head>
    <title>Chỉnh sửa sách</title>
</head>
<body>
    <h1>Chỉnh sửa sách</h1>
    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        <p>
            <label>Tiêu đề:</label>
            <input type="text" name="title" value="{{ $book->title }}" required>
        </p>
        <p>
            <label>Tác giả:</label>
            <input type="text" name="author" value="{{ $book->author }}" required>
        </p>
        <button type="submit">Cập nhật</button>
    </form>
</body>
</html>
