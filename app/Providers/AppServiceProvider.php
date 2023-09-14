<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        view()->composer('*', function ($view) {
            if (Auth::check()) {
                $userId = Auth::user()->id;
                $user = DB::table('users')->join('user_info', 'users.id', '=', 'user_info.user_id')
                    ->select(
                        'user_info.name',
                        'users.email',
                        'users.id',
                        'users.status',
                        'users.level',
                        'user_info.image',
                        'user_info.phone',
                        'user_info.address'
                    )
                    ->where('users.id', $userId)
                    ->first();
                $view->with(['user' => $user]);
            } else {
                $view->with(['user' => null]);
            }
        });
    }
}
