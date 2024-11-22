<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Room;
use Illuminate\Database\Seeder;
use App\Models\ServiceCleaningHour;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $json = file_get_contents(database_path('seeders/data/rooms.json'));
        $data = json_decode($json);

        foreach ($data as $item) {
            Room::create([
                'id' => $item->id,
                'room_type_id' => $item->room_type_id,
                'code' => $item->code,
                'floor' => $item->floor,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
