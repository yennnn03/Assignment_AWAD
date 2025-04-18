<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;
use Illuminate\Support\Facades\Hash;

class AuthorSeeder extends Seeder
{
    public function run()
    {
        Author::create([
            'id' => 001, //Boss,Freelancer
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => Hash::make('john123'),
            'bio' => 'Experienced Laravel Developer',
            'skill' => 'Laravel, PHP, MySQL',
        ]);
        Author::create([
            'id' => 002, //Boss,Freelancer
            'name' => 'Jane Smith',
            'email' => 'janesmith@example.com',
            'password' => Hash::make('jane456'),
            'bio' => 'Frontend Engineer',
            'skill' => 'Vue, React, Tailwind',
        ]);
    }
}
