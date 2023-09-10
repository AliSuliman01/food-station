<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Modules\Restaurants\Model\Restaurant;
use App\Modules\Restaurants\Policy\RestaurantPolicy;
use App\Modules\Users\Model\User;
use App\Modules\Users\Policy\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //        Restaurant::class => RestaurantPolicy::class,
        //        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        Passport::tokensExpireIn(now()->addDays(15));
        Passport::refreshTokensExpireIn(now()->addDays(30));
    }
}
