<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Models\Profile; // Pievienojam importu
use App\Policies\AdminPolicy;
use App\Policies\ProfilePolicy; // Pievienojam importu
use App\Policies\CommentPolicy; // Pievienojam importu

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => AdminPolicy::class,
        Profile::class => ProfilePolicy::class,
        UserComment::class => CommentPolicy::class,
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}