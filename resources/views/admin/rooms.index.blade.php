<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kelola Ruangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Kelola Ruangan</h2>
        <a href="{{ route('admin.rooms.create') }}" class="btn btn-success">+ Tambah Ruangan</a>
    </div>

    <div class="card shadow">
        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Kode</th>
                        <th>Gedung</th>
                        <th width="160px">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($rooms as $room)
                    <tr>
                        <td>{{ $room->id }}</td>
                        <td>{{ $room->name }}</td>
                        <td>{{ $room->code }}</td>
                        <td>{{ $room->building }}</td>

                        <td>
                            <a href="{{ route('admin.rooms.edit', $room->id) }}" class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('admin.rooms.delete', $room->id) }}" 
                                  method="POST" 
                                  style="display:inline-block;">
                                @csrf
                                <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus ruangan ini?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
    </div>

</div>

</body>
</html>
