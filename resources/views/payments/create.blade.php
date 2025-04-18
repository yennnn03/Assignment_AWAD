@extends('layouts.standard')
@section('content')
<div class="container">
    <h1 class="mt-4">Make Payment</h1>
    <div class="card mt-4">
        <div class="card-header">
            <h2>Create Payment for Milestone: {{ $milestone->title }}</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('payments.store', [$project->id, $milestone->id]) }}" method="POST">
                @csrf
                <label>
                    <strong>Amount:</strong>
                    <input type="number" step="0.01" name="amount" value="{{ old('amount') }}" required>
                </label>
                
                <label>
                    <strong>Payment Method:</strong>
                    <input type="text" name='transaction_id'>
                    </select>
                </label>

                <button type="submit" class="btn btn-primary mt-3">Create Payment</button>
            </form>
        </div>
        <div class="card-footer">
            <a href="{{ route('projects.show', $project->id) }}" class="btn btn-primary">Back to Project</a>
        </div>
    </div>