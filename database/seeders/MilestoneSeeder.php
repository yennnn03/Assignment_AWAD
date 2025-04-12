<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Milestone;

class MilestoneSeeder extends Seeder
{
    public function run()
    {
        Milestone::create([
            'project_id' => 1,
            'title' => 'Design Phase',
            'description' => 'UI/UX design for the project.',
            'amount' => 2000,
            'due_date' => '2025-06-01',
        ]);
    }
}
