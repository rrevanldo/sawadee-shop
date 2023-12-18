<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class KurirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'kurir',
            'email' => 'kurir@gmail.com',
            'phone' => '0868 4686 6846',
            'adress' => 'rumah kurir',
            'role' => 'kurir',
            'password' => bcrypt('kurir123'),
        ]);
    }
}
