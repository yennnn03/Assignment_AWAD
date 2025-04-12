<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BidController extends Controller
{
    public function show()
    {
        
    }

    public function create(Project $project)
    {
        return view('bids.create', ['project' => $project]);
    }  

    public function store(Project $project, Request $req)
    {
        $incomingFields = $req->validate([
            'bid_amount'=>['required','numeric'],
            'msg'=>['required','string'],
        ]);
        $incomingFields['project_id'] = $project->id;
        $incomingFields['freelancer_id'] = Auth::id();

        Bid::create($incomingFields);

        return redirect()->route('projects.show', $project->id)
                        ->with('success','Bid submitted successfully!');
    }
}
