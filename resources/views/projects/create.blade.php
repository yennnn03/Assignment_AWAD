@extends('layouts.standard')
@section('title','Create Projects')

@section('content')
    <h1>Create New Project</h1>
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <label>
            New Project Title: <br>
            <input type="text" name='title' required><br>
        </label><br>
        <label>
            New Project Description:<br>
            <input type="text" name='description' required><br>
        </label><br>
        <label>
            New Project Budget:<br>
            <input type="text" name='budget' required><br>
        </label><br>

        <div id="milestones">
            <hr>
            <label>
            Milestone 1 Title:<br>
            <input type="text" name="milestones[0][title]" required><br>
            </label><br>
            <label>
            Milestone 1 Description:<br>
            <input type="text" name="milestones[0][description]" required><br>
            </label><br>
            <label>
            Milestone 1 Due Date:<br>
            <input type="date" name="milestones[0][due_date]" required min="{{ date('Y-m-d') }}"><br>
            </label><br>
        </div>
        <button type="button" id="add-milestone">+ Add Milestone</button>
        <button type="submit">Create Project</button>
    </form>

@endsection