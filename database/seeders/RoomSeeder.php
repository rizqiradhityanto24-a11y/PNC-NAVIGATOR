<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    public function run()
    {
        // 1️⃣ Gedung GKB (5 lantai, 3 ruangan per lantai)
        for ($lantai = 1; $lantai <= 5; $lantai++) {
            for ($i = 1; $i <= 3; $i++) {
                Room::create([
                    'name' => "Ruang $i Lantai $lantai",
                    'building' => 'GKB',
                    'floor' => $lantai,
                ]);
            }
        }

        // 2️⃣ Gedung GTIL (5 lantai, 3 ruangan per lantai)
        for ($lantai = 1; $lantai <= 5; $lantai++) {
            for ($i = 1; $i <= 3; $i++) {
                Room::create([
                    'name' => "Ruang $i Lantai $lantai",
                    'building' => 'GTIL',
                    'floor' => $lantai,
                ]);
            }
        }

        // 3️⃣ Gedung Utama (GEDUT) - beberapa ruangan di lantai 2
        $gedutRooms = [
            'Ruang Informatika',
            'Ruang Administrasi',
            'Ruang Rapat',
            'Ruang Multimedia',
            'Ruang Perpustakaan'
        ];

        foreach ($gedutRooms as $room) {
            Room::create([
                'name' => $room,
                'building' => 'GEDUT',
                'floor' => 2,
            ]);
        }
    }
}
