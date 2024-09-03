<?php

namespace App\Providers;

use App\Models\CV;
use App\Policies\CVPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        CV::class => CVPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}
