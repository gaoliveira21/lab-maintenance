<?php

namespace App\Providers;

use App\Models\Laboratory;
use App\Models\Problem;
use App\Models\Report;
use App\Models\User;

use App\Policies\LaboratoryPolicy;
use App\Policies\ProblemPolicy;
use App\Policies\ReportPolicy;
use App\Policies\UserPolicy;


use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Laboratory::class => LaboratoryPolicy::class,
        Problem::class => ProblemPolicy::class,
        Report::class => ReportPolicy::class,
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-users', function ($user) {
            return $user->role === 100;
        });

        Gate::define('manage-labs', function ($user) {
            return $user->role >= 80;
        });

        Gate::define('manage-reports', function ($user) {
            return $user->role >= 80;
        });

        Gate::define('view-reports', function ($user, $report) {
            if($user->role === 100) {
                return true;
            }

            return $user->id === $report->user_id;
        });

        Gate::define('view-problems', function ($user, $problem) {
            if($user->role > 60) {
                return true;
            }

            return $user->role <= 60 && $problem->user_id === $user->id;
        });
    }
}
