<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::updateOrCreate(
            [
                'email' => 'user@admin.com',
            ],
            [
                'name' => 'admin',
                'password' => bcrypt('123456789'),
            ]
            );
    }
}
