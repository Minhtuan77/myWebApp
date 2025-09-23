<!DOCTYPE html>
<html>
<head>
    <title>Chỉnh sửa sách</title>
</head>
<body>
    <h1>Chỉnh sửa sách</h1>
    <form action="/books/save" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $book->id }}">
        <p>
            <label>Tiêu đề:</label>
            <input type="text" name="title" value="{{ $book->title }}">
        </p>
        <p>
            <label>Tác giả:</label>
            <input type="text" name="author" value="{{ $book->author }}">
        </p>
        <button type="submit">Lưu</button>
    </form>
</body>
</html>
