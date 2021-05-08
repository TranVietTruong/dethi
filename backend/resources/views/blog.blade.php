<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

</head>
<body>

    <form action="/drive" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <label for="image">Chọn ảnh</label>
        <input type="file" id="image" name="image">
        <button type="submit">Upload</button>
    </form>

    <a href="/create">Tạo folder</a>
</body>
</html>
