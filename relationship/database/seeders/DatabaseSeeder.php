<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        for ($i = 1; $i <= 10; $i++) {
            Profile::create([
                'user_id' => $i,
                'city' => Str::random(5),
                'zip_code' => $i % 2 == 0 ? rand(1000, 2000) : null,
                'phone' => rand(100, 8000),
                'view' => rand(100, 200),
            ]);
        };
    }
}
