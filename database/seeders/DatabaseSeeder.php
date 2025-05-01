<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\NewsSeeder;
use Database\Seeders\UserSeeder;
use App\Models\RegistrationSetting;
use Database\Seeders\CategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            NewsSeeder::class,
        ]);

        RegistrationSetting::create([
            'code' => 'DAFTAR-DESA-2025',
        ]);
    }
}
