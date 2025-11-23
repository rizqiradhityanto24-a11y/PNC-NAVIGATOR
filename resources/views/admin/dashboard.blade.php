<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <style>
        body { font-family: Arial; background: #f1f1f1; }
        .nav { background: #007bff; padding: 15px; color: white; }
        .container { padding: 20px; }
        a.btn { padding: 10px 15px; background: #007bff; color: white; text-decoration: none; border-radius: 5px; }
    </style>
</head>
<body>

<div class="nav">
    <h2>Admin Dashboard</h2>
</div>

<div class="container">
    <h3>Kelola Ruangan</h3>
    <a href="{{ route('admin.rooms') }}" class="btn">Lihat Semua Ruangan</a>
</div>

</body>
</html>
