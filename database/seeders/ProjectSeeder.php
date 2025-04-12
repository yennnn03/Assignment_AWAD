<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        Project::unguard();
        // Clear existing projects
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); // Disable foreign key checks
        Project::truncate(); // Truncate the bids table
        DB::statement('SET FOREIGN_KEY_CHECKS=1;'); // Enable foreign key checks
        // Create new projects
        Project::create([
            'owner_id' => 1,
            'freelancer_id' => 2,
            'title' => 'Web Development Project',
            'description' => 'Build a Laravel-based project management system.',
            'budget' => 10000,
            'status' => 'assigned',
        ]);
        Project::create([
            'owner_id' => 2,
            'freelancer_id' => null,
            'title' => 'Project 2',
            'description' => 'Description for project 2',
            'budget' => 2000,
        ]);
        Project::create([
            'owner_id' => 3,
            'freelancer_id' => 1,
            'title' => 'Project 3',
            'description' => 'Description for project 3',
            'budget' => 3000,
            'status' => 'assigned',

        ]);
        Project::create([
            'owner_id' => 1,
            'freelancer_id' => null,
            'title' => 'Project 4',
            'description' => 'Description for project 4',
            'budget' => 4000,
        ]);
        Project::create([
            'owner_id' => 2,
            'freelancer_id' => 1,
            'title' => 'Project 5',
            'description' => 'Description for project 5',
            'budget' => 5000,
            'status' => 'assigned',

        ]);
        Project::create([
            'owner_id' => 3,
            'freelancer_id' => 2,
            'title' => 'Project 6',
            'description' => 'Description for project 6',
            'budget' => 6000,
            'status' => 'assigned',

        ]);
        Project::create([
            'owner_id' => 1,
            'freelancer_id' => 2,
            'title' => 'Project 7',
            'description' => 'Description for project 7',
            'budget' => 7000,
            'status' => 'assigned',

        ]);
        Project::create([
            'owner_id' => 2,
            'freelancer_id' => 3,
            'title' => 'Project 8',
            'description' => 'Description for project 8',
            'budget' => 8000,
            'status' => 'assigned',

        ]);

        Project::reguard();
    }
}