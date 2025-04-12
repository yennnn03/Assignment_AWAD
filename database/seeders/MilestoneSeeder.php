<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Milestone;
use App\Models\Project;

class MilestoneSeeder extends Seeder
{
    public function run()
    {
        // Clear existing milestones
        Milestone::truncate();

        // Get projects
        $project1 = Project::find(1);
        $project4 = Project::where('title', 'Inventory Management System')->first();
        $project5 = Project::where('title', 'Social Media Analytics Dashboard')->first();

        // Milestones for Project 1
        Milestone::create([
            'project_id' => 1,
            'title' => 'Design Phase',
            'description' => 'UI/UX design for the project.',
            'amount' => 2000,
            'due_date' => '2025-06-01',
            'status' => 'completed', // Changed from 'done'
            'completed_at' => '2025-05-28'
        ]);
        
        // Milestones for Project 4
        if ($project4) {
            Milestone::create([
                'project_id' => $project4->id,
                'title' => 'Requirement Analysis & Planning',
                'amount' => 2000,
                'description' => 'Gather all requirements and create project plan',
                'status' => 'completed',
                'due_date' => '2025-03-15',
                'completed_at' => '2025-03-12'
            ]);
            
            Milestone::create([
                'project_id' => $project4->id,
                'title' => 'UI/UX Design',
                'amount' => 3000,
                'description' => 'Design the user interface and experience',
                'status' => 'completed',
                'due_date' => '2025-04-30',
                'completed_at' => '2025-04-25',
            ]);
            
            Milestone::create([
                'project_id' => $project4->id,
                'title' => 'Development Phase',
                'amount' => 4000,
                'description' => 'Develop the core functionality of the system',
                'status' => 'pending',
                'due_date' => '2025-06-25',
                'completed_at' => null,
            ]);
        }

        // Milestones for Project 5
        if ($project5) {
            Milestone::create([
                'project_id' => $project5->id,
                'title' => 'Data Collection & Analysis',
                'amount' => 2000,
                'description' => 'Collect and analyze data from various social media platforms.',
                'status' => 'completed',
                'due_date' => '2025-03-01',
                'completed_at' => '2025-02-28'
            ]);
            
            Milestone::create([
                'project_id' => $project5->id,
                'title' => 'Dashboard Design',
                'amount' => 2500,
                'description' => 'Design the dashboard layout and user interface.',
                'status' => 'pending',
                'due_date' => '2025-04-15',
                'completed_at' => null,
            ]);
            
            Milestone::create([
                'project_id' => $project5->id,
                'title' => 'Final Development & Testing',
                'amount' => 2500,
                'description' => 'Complete the development and conduct testing.',
                'status' => 'pending',
                'due_date' => '2025-05-30',
                'completed_at' => null,
            ]);
        }
    }
}