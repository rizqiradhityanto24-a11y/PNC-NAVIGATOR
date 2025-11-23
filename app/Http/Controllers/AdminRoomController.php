<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminRoomController extends Controller
{
    public function index()
    {
        $rooms = Ruangan::latest()->get();
        return view('admin.rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('admin.rooms.create.ruangan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:ruangans,code',
            'building' => 'required|string|max:255',
            'floor' => 'required|string|max:50',
            'description' => 'nullable|string',
            'capacity' => 'required|integer',
            'lat' => 'nullable|numeric',
            'lng' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('rooms', 'public');
            $data['image'] = $imagePath;
        }

        Ruangan::create($data);

        return redirect()->route('admin.rooms.index')
            ->with('success', 'Ruangan berhasil ditambahkan!');
    }

    public function show($id)
    {
        $room = Ruangan::findOrFail($id);
        return view('admin.rooms.show', compact('room'));
    }

    public function edit($id)
    {
        $room = Ruangan::findOrFail($id);
        return view('admin.rooms.edit.ruangan', compact('room'));
    }

    public function update(Request $request, $id)
    {
        $room = Ruangan::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:ruangans,code,' . $id,
            'building' => 'required|string|max:255',
            'floor' => 'required|string|max:50',
            'description' => 'nullable|string',
            'capacity' => 'required|integer',
            'lat' => 'nullable|numeric',
            'lng' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($room->image) {
                Storage::disk('public')->delete($room->image);
            }
            $imagePath = $request->file('image')->store('rooms', 'public');
            $data['image'] = $imagePath;
        }

        $room->update($data);

        return redirect()->route('admin.rooms.index')
            ->with('success', 'Ruangan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $room = Ruangan::findOrFail($id);
        
        // Delete image
        if ($room->image) {
            Storage::disk('public')->delete($room->image);
        }
        
        $room->delete();

        return redirect()->route('admin.rooms.index')
            ->with('success', 'Ruangan berhasil dihapus!');
    }
}