<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Ruangan - Admin PNC Navigator</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #4361ee;
            --secondary: #3a0ca3;
            --accent: #7209b7;
            --light: #f8f9fa;
            --dark: #212529;
            --success: #4cc9f0;
            --danger: #e63946;
            --warning: #f4a261;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8f9fa;
            color: var(--dark);
            line-height: 1.6;
        }

        /* ADMIN NAVBAR */
        .admin-navbar {
            background: white;
            padding: 1rem 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .admin-logo {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .admin-logo i {
            margin-right: 0.5rem;
        }

        .admin-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .btn {
            padding: 0.7rem 1.5rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            border: none;
            cursor: pointer;
            font-size: 0.9rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.4);
        }

        .btn-success {
            background: var(--success);
            color: white;
        }

        .btn-danger {
            background: var(--danger);
            color: white;
        }

        .btn-outline {
            background: transparent;
            border: 2px solid var(--primary);
            color: var(--primary);
        }

        .btn-outline:hover {
            background: var(--primary);
            color: white;
        }

        /* MAIN CONTENT */
        .admin-container {
            margin-top: 80px;
            padding: 2rem;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }

        .admin-header {
            display: flex;
            justify-content: between;
            align-items: center;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .admin-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        .admin-subtitle {
            color: #6c757d;
            font-size: 1.1rem;
        }

        /* ROOMS TABLE */
        .table-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .rooms-table {
            width: 100%;
            border-collapse: collapse;
        }

        .rooms-table th {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white;
            padding: 1.2rem 1rem;
            text-align: left;
            font-weight: 600;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .rooms-table td {
            padding: 1.2rem 1rem;
            border-bottom: 1px solid #e9ecef;
            font-size: 0.95rem;
        }

        .rooms-table tr:hover {
            background: #f8f9fa;
        }

        .rooms-table tr:last-child td {
            border-bottom: none;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .btn-sm {
            padding: 0.5rem 1rem;
            font-size: 0.8rem;
            border-radius: 6px;
        }

        .btn-edit {
            background: var(--warning);
            color: white;
        }

        .btn-delete {
            background: var(--danger);
            color: white;
        }

        /* EMPTY STATE */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: #6c757d;
        }

        .empty-state i {
            font-size: 4rem;
            margin-bottom: 1rem;
            color: #dee2e6;
        }

        .empty-state h3 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            color: #495057;
        }

        /* ALERTS */
        .alert-success {
            background: rgba(76, 201, 240, 0.1);
            border: 1px solid var(--success);
            color: var(--success);
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .admin-navbar {
                padding: 1rem;
                flex-direction: column;
                gap: 1rem;
            }

            .admin-container {
                margin-top: 120px;
                padding: 1rem;
            }

            .admin-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .rooms-table {
                display: block;
                overflow-x: auto;
            }

            .action-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <!-- ADMIN NAVBAR -->
    <nav class="admin-navbar">
        <div class="admin-logo">
            <i class="fas fa-map-marked-alt"></i>
            PNC NAVIGATOR - ADMIN
        </div>
        
        <div class="admin-actions">
            <a href="/admin/rooms/create" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Ruangan
            </a>
            <a href="/" class="btn btn-outline">
                <i class="fas fa-globe"></i> Lihat Website
            </a>
            <a href="/admin/logout" class="btn btn-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <div class="admin-container">
        <div class="admin-header">
            <div>
                <h1 class="admin-title">Kelola Ruangan</h1>
                <p class="admin-subtitle">Manajemen data ruangan kampus PNC</p>
            </div>
        </div>

        @if(session('success'))
            <div class="alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        @if($rooms->count() > 0)
            <div class="table-container">
                <table class="rooms-table">
                    <thead>
                        <tr>
                            <th>Nama Ruangan</th>
                            <th>Gedung</th>
                            <th>Lantai</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rooms as $room)
                        <tr>
                            <td><strong>{{ $room->name }}</strong></td>
                            <td>{{ $room->building ?? '-' }}</td>
                            <td>{{ $room->floor ?? '-' }}</td>
                            <td>{{ $room->description ? \Illuminate\Support\Str::limit($room->description, 50) : 'Tidak ada deskripsi' }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="/admin/rooms/{{ $room->id }}/edit" class="btn btn-edit btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="/admin/rooms/{{ $room->id }}/delete" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-delete btn-sm" onclick="return confirm('Yakin hapus ruangan ini?')">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="empty-state">
                <i class="fas fa-door-open"></i>
                <h3>Belum Ada Ruangan</h3>
                <p>Mulai dengan menambahkan ruangan pertama Anda</p>
                <a href="/admin/rooms/create" class="btn btn-primary" style="margin-top: 1rem;">
                    <i class="fas fa-plus"></i> Tambah Ruangan Pertama
                </a>
            </div>
        @endif
    </div>

    <script>
        // Auto-hide success message
        @if(session('success'))
            setTimeout(() => {
                document.querySelector('.alert-success')?.style.display = 'none';
            }, 5000);
        @endif

        // Smooth animations
        document.addEventListener('DOMContentLoaded', function() {
            const rows = document.querySelectorAll('.rooms-table tbody tr');
            rows.forEach((row, index) => {
                row.style.opacity = '0';
                row.style.transform = 'translateX(-20px)';
                row.style.transition = 'all 0.4s ease';
                
                setTimeout(() => {
                    row.style.opacity = '1';
                    row.style.transform = 'translateX(0)';
                }, index * 100);
            });
        });
    </script>
</body>
</html>