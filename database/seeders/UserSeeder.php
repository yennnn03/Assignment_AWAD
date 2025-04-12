<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Clear existing users to avoid duplicates
        User::query()->delete();

        // Reset auto-increment counter
        \DB::statement('ALTER TABLE users AUTO_INCREMENT = 1');

        $users = [
            [
                'id' => 1,
                'name' => 'John Doe',
                'email' => 'johndoe@example.com',
                'password' => Hash::make('password123'),
                'bio' => 'Experienced Laravel Developer',
                'skill' => 'Laravel, PHP, MySQL',
                
            ],
            [
                'id' => 2,
                'name' => 'Jane Smith',
                'email' => 'janesmith@example.com',
                'password' => Hash::make('securepass'),
                'bio' => 'Frontend Engineer',
                'skill' => 'Vue, React, Tailwind',
                
            ],
            [
                'id' => 3,
                'name' => 'Alice Johnson',
                'email' => 'alicejohnson@example.com',
                'password' => Hash::make('alicepass'),
                'bio' => 'Project Manager',
                'skill' => 'Agile, Scrum, Communication',
                
            ],
            [
                'id' => 4,
                'name' => 'Bob Brown',
                'email' => 'bobbrown@example.com',
                'password' => Hash::make('bob5869'),
                'bio' => 'Backend Developer',
                'skill' => 'Node.js, Express, MongoDB',
               
            ],
            [
                'id' => 5,
                'name' => 'Charlie Black',
                'email' => 'charlieblack@example.com',
                'password' => Hash::make('charliepwd'),
                'bio' => 'Full Stack Developer',
                'skill' => 'JavaScript, Python, Django',
                
            ],
            [
                'id' => 6,
                'name' => 'Diana White',
                'email' => 'dianawhite@example.com',
                'password' => Hash::make('dianapwd'),
                'bio' => 'UI/UX Designer',
                'skill' => 'Figma, Sketch, Adobe XD',
                
            ]
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                $user
            );
        }
    }
}