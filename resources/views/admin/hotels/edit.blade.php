<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Hotel</title>
</head>
<body>
    <h1>Edit Hotel</h1>
    <form action="{{ route('admin.hotels.update', $hotel->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Name:</label>
        <input type="text" name="name" value="{{ $hotel->name}}" required>
        <br>
        <label for="">Location</label>
        <input type="text" name="location"  value="{{ $hotel->location}}"required>
        <br>
        <button>Update</button>
    </form>

</body>
</html>
