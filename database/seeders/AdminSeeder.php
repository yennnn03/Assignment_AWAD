<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'id' => 1, // Admin
            'name' => 'Jackson Wang',
            'email' => 'jacksonwang@example.com',
            'password' => Hash::make('jacksonwang123'),
            'bio' => 'Admin of CodeFlex',
        ]);
        Admin::create([
            'id' => 2, //Admin
            'name' => 'Apple Lee',
            'email' => 'applelee@example.com',
            'password' => Hash::make('applelee123'),
            'bio' => 'Admin of CodeFlex',
        ]);
    }
}
