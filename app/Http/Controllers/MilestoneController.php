<?php

namespace App\Http\Controllers;

use App\Models\Milestone;
use App\Models\Project;
use Illuminate\Http\Request;

class MilestoneController extends Controller
{
    public function create(Project $project)
    {
        return view('milestones.create', ['project' => $project]);
    }
    public function store(Project $project, Request $req)
    {
        $incomingFields = $req->validate([
            'title' => ['required, string'],
            'description' => ['required, string'],
            'amount' => ['required', 'number'],
            'due_date' => ['required', 'date'],
        ]);

        $incomingFields['project_id'] = $project->id;

        Milestone::create($incomingFields);

        return redirect()->route('projects.show', $project->id)
                        ->with('success','Bid submitted successfully!');
    }
    public function edit(Project $project, Milestone $milestone)
    {
        return view('milestones.edit', ['project' => $project, 'milestone' => $milestone]);
    }

    public function update(Request $req,Project $project, Milestone $milestone)
    {
        $milestone = Milestone::findOrFail($milestone->id);

        $incomingFields = $req->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'amount' => ['required', 'number'],
            'due_date' => ['required', 'date'],
            'status' => ['required', 'string'],
        ]);
        
        $milestone->update($incomingFields);

        return redirect()->route('projects.show', $milestone->project_id)
                        ->with('success','Milestone updated successfully!');
    }
}
