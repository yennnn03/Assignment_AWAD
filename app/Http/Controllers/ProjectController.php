<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Milestone;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Contracts\Service\Attribute\Required;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $incomingFields = $request->validate([
            'title' => ['string','required','max:50'],
            'description' => ['string','required'],
            'budget' => ['numeric','required'] 
        ]);
        $incomingFields['owner_id']=Auth::id();
        Project::create($incomingFields);

        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $project = Project::findOrFail($project->id);
        $milestones = collect();
        
        if ($project->status === 'assigned' && ($project->freelancer_id === Auth::id() || $project->owner_id === Auth::id())) {
            $milestones = Milestone::where('project_id', $project->id)->get();
        }
        $bids = collect();
        if ($project->status === 'open' && $project->owner_id === Auth::id()) {
            $bids = Bid::where('project_id', $project->id)->get();
        }
        return view('projects.show', compact('project', 'milestones', 'bids'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('projects.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showBids(Project $project)
    {
        $this->authorize('viewBids', $project);
        return response()->json($project->bids);
    }
}
