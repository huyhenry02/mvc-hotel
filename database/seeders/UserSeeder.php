<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\ServiceCleaningHour;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $json = file_get_contents(database_path('seeders/data/users.json'));
        $data = json_decode($json);

        foreach ($data as $item) {
            User::create([
                'id' => $item->id,
                'full_name' => $item->full_name,
                'address' => $item->address,
                'phone' => $item->phone,
                'role_type' => $item->role_type,
                'email' => $item->email,
                'password' => bcrypt($item->password),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
