<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Ruangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Tambah Ruangan</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.rooms.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Ruangan</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kode</label>
                    <input type="text" name="code" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gedung / Lokasi</label>
                    <input type="text" name="building" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Latitude</label>
                    <input type="text" name="lat" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Longitude</label>
                    <input type="text" name="lng" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="description" class="form-control" rows="4"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto Ruangan (Opsional)</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <button class="btn btn-success w-100">Simpan</button>
            </form>

            <div class="mt-3 text-center">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary w-100">Kembali</a>
            </div>

        </div>
    </div>
</div>

</body>
</html>
