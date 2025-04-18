@extends('layouts.standard')

@section('content')
<div class="container">
    <h1 class="mt-4">Milestone Details</h1>
    <div class="card mt-4">
        @php
            $isOwner = Auth::user()->can('update', $milestone);
        @endphp
        <div class="card-header">
            <h2>{{ $milestone->title }}</h2>
        </div>
        <div class="card-body">
            <form action="{{route('milestones.update', [$project->id, $milestone->id])}}" method="POST">
                @csrf
                @method('PUT')
                <label>
                    <strong>Title:</strong>
                    <input type="text" name="title" value="{{ old('title', $milestone->title ?? '') }}" {{ $isOwner ? '' : 'disabled' }} required>
                </label>
                
                <label>
                    <strong>Description:</strong>
                    <input type="text" name="description" value="{{ old('description', $milestone->description ?? '') }}" {{ $isOwner ? '' : 'disabled' }} required>
                </label>
                
                <label>
                    <strong>Amount:</strong>
                    <input type="number" step="0.01" name="amount" value="{{ old('amount', $milestone->amount ?? '') }}" {{ $isOwner ? '' : 'disabled' }} required>
                </label>
                
                <label>
                    <strong>Due date:</strong>
                    <input 
                    type="date" 
                    name="due_date" 
                    value="{{ old('due_date', $milestone->due_date ? \Carbon\Carbon::parse($milestone->due_date)->format('Y-m-d') : '') }}" 
                    {{ $isOwner ? '' : 'disabled' }} 
                    min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"
                    required
                    >
                </label>

                <label>
                    <strong>Status:</strong>
                    <select name="status" {{ $isOwner ? '' : 'disabled' }} required>
                        <option value="in_progress" {{ old('status', $milestone->status) === 'in_progress' ? 'selected' : '' }}>In progress</option>
                        <option value="completed" {{ old('status', $milestone->status) === 'completed' ? 'selected' : '' }}>Completed</option>
                        
                        {{-- Owner-only options --}}
                        <option value="approved" {{ old('status', $milestone->status) === 'approved' ? 'selected' : '' }} {{ $isOwner ? '' : 'disabled' }}>Approved</option>
                        <option value="paid" {{ old('status', $milestone->status) === 'paid' ? 'selected' : '' }} {{ $isOwner ? '' : 'disabled' }}>Paid</option>
                        <option value="rejected" {{ old('status', $milestone->status) === 'rejected' ? 'selected' : '' }} {{ $isOwner ? '' : 'disabled' }}>Rejected</option>
                        
                        {{-- Freelancer-only option --}}
                        <option value="received" {{ old('status', $milestone->status) === 'received' ? 'selected' : '' }} {{ !$isOwner ? '' : 'disabled' }}>Received</option>
                    </select>
                </label>
                <button type ="submit">Submit milestones</button>
            </form>
        </div>
        <div class="card-footer">
            <a href="{{ route('projects.show', $project->id) }}" class="btn btn-primary">Back to Milestones</a>
        </div>
    </div>
</div>
@endsection