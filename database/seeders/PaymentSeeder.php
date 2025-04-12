<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;
use App\Models\Project;
use App\Models\Milestone;
use App\Models\User;

class PaymentSeeder extends Seeder
{
    public function run()
    {
        // Clear existing payments
        Payment::truncate();

        // Find required projects
        $project4 = Project::find(4); // Inventory Management System
        $project5 = Project::find(5); // Social Media Analytics Dashboard

        // Find required freelancers
        $freelancer1 = User::find(5); // Project 4 freelancer (ID 5)
        $freelancer2 = User::find(7); // Project 5 freelancer (ID 7)

        // Find milestones for Project 4
        $milestone1_p4 = Milestone::where('project_id', 4)
                                ->where('title', 'Requirement Analysis & Planning')
                                ->first();
        $milestone2_p4 = Milestone::where('project_id', 4)
                                ->where('title', 'UI/UX Design')
                                ->first();

        // Find milestone for Project 5
        $milestone1_p5 = Milestone::where('project_id', 5)
                                ->where('title', 'Data Collection & Analysis')
                                ->first();

        // Create payments for Project 4
        if ($project4 && $freelancer1 && $milestone1_p4) {
            Payment::create([
                'milestone_id' => $milestone1_p4->id,
                'freelancer_id' => $freelancer1->id,
                'transaction_id' => 'TRX-20250313-001',
                'amount' => 2000,
            ]);
        }

        if ($project4 && $freelancer1 && $milestone2_p4) {
            Payment::create([
                'milestone_id' => $milestone2_p4->id,
                'freelancer_id' => $freelancer1->id,
                'transaction_id' => 'TRX-20250313-002',
                'amount' => 3000,
            ]);
        }

        // Create payment for Project 5
        if ($project5 && $freelancer2 && $milestone1_p5) {
            Payment::create([
                'milestone_id' => $milestone1_p5->id,
                'freelancer_id' => $freelancer2->id,
                'transaction_id' => 'TRX-20250313-003',
                'amount' => 2000,
            ]);
        }
    }
}