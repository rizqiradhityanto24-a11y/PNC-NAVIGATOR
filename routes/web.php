<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Models\Room;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES 
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('eksplor');
});

Route::get('/eksplor', function () {
    return view('eksplor');
});

Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
Route::get('/rooms/{room}', [RoomController::class, 'show'])->name('rooms.show');
Route::get('/search', [RoomController::class, 'search'])->name('rooms.search');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES 
|--------------------------------------------------------------------------
*/

// Halaman login admin
Route::get('/admin/login', function () {
    return view('admin.login');
});

// Proses login
Route::get('/admin/do-login', function () {
    $email = request('email');
    $password = request('password');
    
    if ($email == 'admin@pnc.ac.id' && $password == 'admin123') {
        session(['admin' => true]);
        return redirect('/admin/rooms');
    }
    
    return redirect('/admin/login')->with('error', 'Email atau password salah!');
});

// Logout
Route::get('/admin/logout', function () {
    session()->forget('admin');
    return redirect('/admin/login');
});

// ====== ADMIN ROOM MANAGEMENT ======
Route::get('/admin/rooms', function () {
    if (!session('admin')) {
        return redirect('/admin/login');
    }
    
    $rooms = Room::all();
    return view('admin.rooms.index', compact('rooms'));
});

// Tambah ruangan - UPDATE KE FORM LENGKAP
Route::get('/admin/rooms/create', function () {
    if (!session('admin')) {
        return redirect('/admin/login');
    }
    return view('admin.rooms.create.ruangan'); // Arahkan ke form lengkap
});

Route::post('/admin/rooms/store', function () {
    if (!session('admin')) {
        return redirect('/admin/login');
    }
    
    Room::create([
        'name' => request('name'),
        'code' => request('code'),
        'building' => request('building'),
        'floor' => request('floor'),
        'description' => request('description'),
        'capacity' => request('capacity', 0),
        'lat' => request('lat'),
        'lng' => request('lng'),
        'type' => 'classroom'
    ]);
    
    return redirect('/admin/rooms')->with('success', 'Ruangan berhasil ditambahkan!');
});

// Edit ruangan - UPDATE KE FORM LENGKAP
Route::get('/admin/rooms/{id}/edit', function ($id) {
    if (!session('admin')) {
        return redirect('/admin/login');
    }
    
    $room = Room::find($id);
    if (!$room) {
        return redirect('/admin/rooms')->with('error', 'Ruangan tidak ditemukan!');
    }
    
    return view('admin.rooms.edit.ruangan', compact('room')); // Arahkan ke form lengkap
});

Route::post('/admin/rooms/{id}/update', function ($id) {
    if (!session('admin')) {
        return redirect('/admin/login');
    }
    
    $room = Room::find($id);
    if (!$room) {
        return redirect('/admin/rooms')->with('error', 'Ruangan tidak ditemukan!');
    }
    
    $room->update([
        'name' => request('name'),
        'code' => request('code'),
        'building' => request('building'),
        'floor' => request('floor'),
        'description' => request('description'),
        'capacity' => request('capacity', 0),
        'lat' => request('lat'),
        'lng' => request('lng')
    ]);
    
    return redirect('/admin/rooms')->with('success', 'Ruangan berhasil diupdate!');
});

// Hapus ruangan
Route::post('/admin/rooms/{id}/delete', function ($id) {
    if (!session('admin')) {
        return redirect('/admin/login');
    }
    
    $room = Room::find($id);
    if ($room) {
        $room->delete();
        return redirect('/admin/rooms')->with('success', 'Ruangan berhasil dihapus!');
    }
    
    return redirect('/admin/rooms')->with('error', 'Ruangan tidak ditemukan!');
});

// UPDATE SEARCH ROUTE UNTUK AMBIL DATA DARI DATABASE
Route::get('/search', function () {
    $rooms = Room::all();
    return view('rooms.search', compact('rooms'));
});