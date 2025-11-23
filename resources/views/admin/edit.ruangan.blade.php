<?php
// edit_ruangan.php
// Halaman untuk mengedit data ruangan
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Ruangan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Edit Ruangan</h4>
            </div>
            <div class="card-body">
                <?php
                    // Ambil data ruangan berdasarkan ID
                    include 'config.php';

                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $query = mysqli_query($conn, "SELECT * FROM ruangan WHERE id_ruangan = '$id'");
                        $data = mysqli_fetch_assoc($query);
                    }
                ?>

                <form action="update_ruangan.php" method="POST">
                    <input type="hidden" name="id_ruangan" value="<?php echo $data['id_ruangan']; ?>">

                    <div class="mb-3">
                        <label class="form-label">Nama Ruangan</label>
                        <input type="text" name="nama_ruangan" class="form-control" value="<?php echo $data['nama_ruangan']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Lokasi</label>
                        <input type="text" name="lokasi" class="form-control" value="<?php echo $data['lokasi']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kapasitas</label>
                        <input type="number" name="kapasitas" class="form-control" value="<?php echo $data['kapasitas']; ?>" required>
                    </div>

                    <div class="text-end">
                        <a href="kelola_ruangan.php" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
