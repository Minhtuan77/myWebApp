<!DOCTYPE html>
<html>
<head>
    <title>Thêm sách mới</title>
</head>
<body>
    <h1>Thêm sách mới</h1>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <p>
            <label>Tiêu đề:</label>
            <input type="text" name="title" required>
        </p>
        <p>
            <label>Tác giả:</label>
            <input type="text" name="author" required>
        </p>
        <button type="submit">Lưu</button>
    </form>
</body>
</html>
