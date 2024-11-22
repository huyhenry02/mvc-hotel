<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\RoomType;
use Illuminate\Database\Seeder;
use App\Models\ServiceCleaningHour;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $json = file_get_contents(database_path('seeders/data/room_types.json'));
        $data = json_decode($json);

        foreach ($data as $item) {
            RoomType::create([
                'id' => $item->id,
                'name' => $item->name,
                'price' => $item->price,
                'description' => $item->description,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
