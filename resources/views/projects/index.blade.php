@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar Column - MUST come first in HTML flow -->
        <div class="col-md-3 order-md-first sidebar-col">
            <div class="sidebar-content bg-light p-3 h-100">
                <h5 class="mb-3"><strong>Projects Navigation</strong></h5>
                <ul class="list-group">
                    <li class="list-group-item border-0 bg-transparent">
                        <a href="{{ route('projects.index') }}" class="text-decoration-none">All Projects</a>
                    </li>
                    <li class="list-group-item border-0 bg-transparent">
                        <a href="{{ route('projects.bidded') }}" class="text-decoration-none">Bidded Projects</a>
                    </li>
                    <li class="list-group-item border-0 bg-transparent">
                        <a href="{{ route('projects.own') }}" class="text-decoration-none">Own Projects</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Content Column -->
        <div class="col-md-9 order-md-last main-content-col">
            <h2 class="mb-4">Projects</h2>
            <div id="projects-root"></div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src='/js/app.js'></script>

@endsection