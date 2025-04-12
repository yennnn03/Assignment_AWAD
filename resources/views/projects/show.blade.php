@extends('layouts.standard')

@section('title','Project page')

@section('content')
    <h1>{{ $project->title }}</h1>
    <p><strong>Description:</strong> {{ $project->description }}</p>
    <p><strong>Budget:</strong> ${{ $project->budget }}</p>
    <p><strong>Status:</strong> {{ ucfirst($project->status) }}</p>
    <p><strong>Owner ID:</strong> {{ $project->owner_id }}</p>
    <p><strong>Freelancer ID:</strong> {{ $project->freelancer_id ?? 'Not Assigned' }}</p>

    @if ($project->status === 'open')
        @php
            $userHasBidded = $bids->contains('freelancer_id', Auth::id());
        @endphp
        @if ($userHasBidded)
            <div>
                <h2>Bid History</h2>
                @if ($bids->isEmpty())
                    <p>No bids available.</p>
                @else
                    <ul>
                        @foreach ($bids as $bid)
                            <li>
                                <strong>Bidder ID:</strong> {{ $bid->freelancer_id }}<br>
                                <strong>Amount:</strong> ${{ $bid->amount }}<br>
                                <strong>Status:</strong> {{ ucfirst($bid->status) }}<br>
                                @if ($bid->freelancer_id === Auth::id())
                                    <a href="{{ route('bids.edit', $bid->id) }}" class="btn btn-sm btn-primary ml-2">
                                        Update
                                    </a>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        @else
            <form action="{{ route('bids.create', $project->id) }}" method="GET">
                <button type="submit">Bid Now</button>
            </form>
        @endif
    @elseif ($project->status === 'assigned' && !empty($milestones))
        <div class="mb-4">
            <h3>Total Milestones: {{ $milestones->count() }}</h3>

            @foreach ($milestones as $milestone)
                <div class="border p-3 rounded mb-2">
                    <strong>Milestone{{ $loop->iteration }}</strong><br>
                    <p>{{ $milestone->title }}</p>

                    <a href="{{ route('milestones.edit', $milestone->id) }}" class="btn btn-sm btn-primary ml-2">
                        Update
                    </a>
                </div>
            @endforeach
        </div>
    @endif
    <a href="{{ route('projects.index') }}">← Back to Project List</a>
@endsection