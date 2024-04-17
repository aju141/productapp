<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin', 
            'email' => 'ajaythakur97368@gmail.com', 
            'password' => bcrypt('Welshbajayweb0310'), 
            'is_admin' => 1
            ]);
    }
}
