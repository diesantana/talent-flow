<?php

namespace App\Providers;

use App\Models\Candidate;
use App\Policies\CandidatePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(Candidate::class, CandidatePolicy::class);
    }
}
