<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        // Clear existing projects
        Project::truncate();

        $projects = [
            [
                //Project 1 assigned to freelancer
                'owner_id' => 1,
                'freelancer_id' => 2,
                'title' => 'Web Development Project',
                'description' => 'Build a Laravel-based project management system.',
                'budget' => 10000,
                'status' => 'assigned',
            ],
            [
                //Project 2 open to bid
                'owner_id' => 3,
                'freelancer_id' => null,
                'title' => 'Mobile App Development',
                'description' => 'Develop a mobile app using React Native.',
                'budget' => 15000,
                'status' => 'open'
            ],

            [
                //Project 3 bidded but owner not assigned yet
                'owner_id' => 4,
                'freelancer_id' => null,
                'title' => 'CRM System Development',
                'description' => 'Create a customer relationship management system.',
                'budget' => 8000,
                'status' => 'in_progress',
            ],

            [
                //Project 4 assigned and in progress
                'owner_id' => 4,
                'freelancer_id' => 5,
                'title' => 'Inventory Management System',
                'description' => 'Develop an inventory tracking system.',
                'budget' => 9000,
                'status' => 'in_progress',
            ],
            [
                //Project 5 assigned and in progress
                'owner_id' => 6,
                'freelancer_id' => 7,
                'title' => 'Social Media Analytics Dashboard',
                'description' => 'Build a dashboard for social media metrics.',
                'budget' => 10000,
                'status' => 'in_progress',
            ]
        ];

        
        foreach ($projects as $project) {
            try {
                Project::create($project);
            } catch (\Exception $e) {
                logger()->error("Failed to create project: ".$e->getMessage());
                continue;
            }
        }
    }
}