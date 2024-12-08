<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Hotel</title>
</head>
<body>

    <h1>Add new hotels</h1>
    <form method= "POST" action="{{route('admin.hotels.store') }}">

        @csrf

        <label>Name:</label>
        <input type="text" name="name" required>
        <br>

        <label>Location</label>
        <input type="text" name="location" required>
        <br>
        <button type="submit">save</button>
    </form>

</body>
</html>
