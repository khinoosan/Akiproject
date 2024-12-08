<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotels Management</title>
</head>
<body>

    <h1>Hotels</h1>
    <a href="{{ route('admin.hotels.create') }}">Add new Hotel</a>
    <table>
        <thead>
            <tr>

                <th>ID</th>
                <th>Name</th>
                <th>Location</th>
                <th>Actions</th>


            </tr>
        </thead>

        <tbody>
            @foreach ($hotels as $hotel)
            <tr>
                <td>{{ $hotel->id }}</td>
                <td>{{ $hotel->name }}</td>
                <td>{{ $hotel->location }}</td>
                <td>
                    <a href="{{ route('admin.hotels.edit', $hotel->id) }}">Edit</a>
                    <form action="{{ route('admin.hotels.destroy', $hotel->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">削除</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
