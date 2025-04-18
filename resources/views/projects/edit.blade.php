@extends('layouts.standard')
@section('title','Create Projects')

@section('content')
    <h1>Create New Project</h1>
    <form action="{{ route('projects.store', $project->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>
            New Project Title: <br>
            <input type="text" name='title' value='{{ old('title', $project->title ?? '') }}' required><br>
        </label><br>
        <label>
            New Project Description:<br>
            <input type="text" name='description' value='{{ old('description', $project->description ?? '') }}' required><br>
        </label><br>
        <label>
            New Project Budget:<br>
            <input type="text" name='budget' required><br>
        </label><br>
        <button type="submit">Create Project</button>
    </form>

@endsection