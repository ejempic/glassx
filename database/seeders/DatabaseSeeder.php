<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ProductType;
use App\Models\User;
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
        User::factory()->create([
            'name' => 'Administrator',
            'username' => 'admin',
            'is_admin' => true
        ]);
        User::factory()->create([
            'name' => 'Bambi',
            'username' => 'bambi',
            'is_admin' => true
        ]);
    }
}

