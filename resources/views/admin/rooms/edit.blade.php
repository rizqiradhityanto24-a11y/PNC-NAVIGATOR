<!DOCTYPE html>
<html>
<head>
    <title>Edit Ruangan - Admin</title>
    <style>
        body { 
            font-family: Arial; 
            background: #f5f5f5; 
            margin: 0; 
            padding: 20px;
        }
        .container { 
            max-width: 600px; 
            background: white; 
            padding: 30px; 
            border-radius: 5px;
            margin: 0 auto;
        }
        .form-group { 
            margin-bottom: 20px; 
        }
        label { 
            display: block; 
            margin-bottom: 5px; 
            font-weight: bold; 
            color: #333;
        }
        input, textarea, select { 
            width: 100%; 
            padding: 10px; 
            border: 1px solid #ddd; 
            border-radius: 4px; 
            font-size: 16px;
        }
        input:focus, textarea:focus {
            border-color: #007bff;
            outline: none;
        }
        .btn { 
            padding: 12px 25px; 
            text-decoration: none; 
            border-radius: 4px; 
            color: white; 
            border: none; 
            cursor: pointer; 
            font-size: 16px;
            margin-right: 10px;
        }
        .save { 
            background: #007bff; 
        }
        .save:hover {
            background: #0056b3;
        }
        .cancel { 
            background: #6c757d; 
        }
        .cancel:hover {
            background: #5a6268;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid #eee;
        }
        .header h1 {
            margin: 0;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Edit Ruangan: {{ $room->name }}</h1>
            <a href="/admin/rooms" class="btn cancel">← Kembali</a>
        </div>
        
        <form method="POST" action="/admin/rooms/{{ $room->id }}/update">
            @csrf
            <div class="form-group">
                <label>Nama Ruangan *</label>
                <input type="text" name="name" value="{{ $room->name }}" required>
            </div>
            
            <div class="form-group">
                <label>Gedung</label>
                <input type="text" name="building" value="{{ $room->building }}">
            </div>
            
            <div class="form-group">
                <label>Lantai</label>
                <input type="number" name="floor" value="{{ $room->floor }}">
            </div>
            
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="description" rows="4">{{ $room->description }}</textarea>
            </div>
            
            <div style="text-align: center; margin-top: 30px;">
                <button type="submit" class="btn save">Update Ruangan</button>
                <a href="/admin/rooms" class="btn cancel">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>