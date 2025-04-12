@extends('layouts.standard')

@section('title','Create Milestone')

@section('content')
    <label>
        <strong>Title:</strong>
        <input type="text" name='title' required>
    </label>
    <label>
        <strong>Description:</strong>
        <input type="text" name='description' required>
    </label>
    <label>
        <strong>Amount:</strong>
        <input type="number" name='description' required>
    </label>
    <label>
        <strong>Due date:</strong>
        <input type="date" name='due_date' required>
    </label>
    <form action="{{route('milestones.store', $project->id)}}" method="POST">
        <button type ="submit">Submit milestones</button>
    </form>

@endsection