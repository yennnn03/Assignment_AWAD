<?php

namespace App\Providers;

use App\Models\Milestone;
use App\Models\Project;
use App\Models\User;
use App\Policies\MilestonePolicy;
use App\Policies\ProjectPolicies;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Project::class => ProjectPolicies::class,
        Milestone::class => MilestonePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('viewBids', function(User $user, Project $project)
        {
            return $user->id === $project->owner_id || 
               $project->bids()->where('freelancer_id', $user->id)->exists();
        });
    }
}
