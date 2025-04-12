<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => Hash::make('password123'),
            'bio' => 'Experienced Laravel Developer',
            'skill' => 'Laravel, PHP, MySQL',
        ]);
        User::create([
            'id' => 2, // Freelancer
            'name' => 'Jane Smith',
            'email' => 'janesmith@example.com',
            'password' => Hash::make('securepass'),
            'bio' => 'Frontend Engineer',
            'skill' => 'Vue, React, Tailwind',
        ]);
    }
}
