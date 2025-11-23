<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // HALAMAN LOGIN
    public function showLogin()
    {
        return view('admin.login');
    }

    // PROSES LOGIN
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->is_admin) {
                return redirect('/admin/rooms');
            } else {
                Auth::logout();
                return redirect('/admin/login')->with('error', 'Hanya admin yang bisa akses.');
            }
        }

        return redirect('/admin/login')->with('error', 'Email atau password salah.');
    }

    // LOGOUT
    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }

    // HALAMAN DASHBOARD
    public function index()
    {
        $rooms = Room::all();
        return view('admin.rooms.index', compact('rooms'));
    }

    // TAMPILKAN SEMUA RUANGAN
    public function rooms()
    {
        $rooms = Room::all(); 
        return view('admin.rooms.index', compact('rooms'));
    }

    // HALAMAN TAMBAH RUANGAN
    public function create()
    {
        return view('admin.rooms.create');
    }

    // SIMPAN RUANGAN BARU
    public function store(Request $request)
    {
        Room::create([
            'name' => $request->name,
            'code' => $request->code,
            'building' => $request->building,
            'floor' => $request->floor,
            'location' => $request->location,
            'description' => $request->description,
        ]);

        return redirect('/admin/rooms')->with('success', 'Ruangan berhasil ditambahkan!');
    }

    // HALAMAN EDIT RUANGAN
    public function edit($id)
    {
        $room = Room::find($id);
        return view('admin.rooms.edit', compact('room'));
    }

    // UPDATE RUANGAN
    public function update(Request $request, $id)
    {
        $room = Room::find($id);
        $room->update([
            'name' => $request->name,
            'code' => $request->code,
            'building' => $request->building,
            'floor' => $request->floor,
            'location' => $request->location,
            'description' => $request->description,
        ]);

        return redirect('/admin/rooms')->with('success', 'Ruangan berhasil diupdate!');
    }

    // HAPUS RUANGAN
    public function destroy($id)
    {
        Room::find($id)->delete();
        return redirect('/admin/rooms')->with('success', 'Ruangan berhasil dihapus!');
    }
}