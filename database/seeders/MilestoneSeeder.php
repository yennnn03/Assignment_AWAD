<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Milestone;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

class MilestoneSeeder extends Seeder
{
    public function run()
    {
        Milestone::unguard();
        // Clear existing milestones
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); // Disable foreign key checks
        Milestone::truncate(); // Truncate the bids table
        DB::statement('SET FOREIGN_KEY_CHECKS=1;'); // Enable foreign key checks

        Milestone::create([
            'project_id' => 1,
            'title' => 'Design Phase',
            'description' => 'UI/UX design for the project.',
            'amount' => 2000,
            'due_date' => '2025-06-01',
        ]);
        Milestone::create([
            'project_id' => 1,
            'title' => 'Development Phase',
            'description' => 'Development of the core features.',
            'amount' => 5000,
            'due_date' => '2025-09-01',
        ]);
        Milestone::create([
            'project_id' => 1,
            'title' => 'Testing Phase',
            'description' => 'Testing and bug fixing.',
            'amount' => 3000,
            'due_date' => '2025-12-01',
        ]);
        Milestone::create([
            'project_id' => 3,
            'title' => 'Deployment Phase',
            'description' => 'Deployment to production environment.',
            'amount' => 2000,
            'due_date' => '2026-01-01',
        ]);
        Milestone::create([
            'project_id' => 3,
            'title' => 'Research Phase',
            'description' => 'Research and analysis of the project requirements.',
            'amount' => 1500,
            'due_date' => '2025-07-01',
        ]);
        Milestone::create([
            'project_id' => 3,
            'title' => 'Implementation Phase',
            'description' => 'Implementation of the project features.',
            'amount' => 4000,
            'due_date' => '2025-11-01',
        ]);



        Milestone::reguard();
    }
}