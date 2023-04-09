<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
         //User
         Gate::define('registerUser', function($user){
            $role = $user->roles()->first()->id;
            $allow;
            if($role == 1 or $role == 2){
                $allow=true;
            }else{
                $allow=false;
            }

            return $allow;
        });
        Gate::define('deleteUser', function($user){
            $role = $user->roles()->first()->id;

            $allow;
            if($role == 1 or $role == 2 ){
                $allow=true;
            }else{
                $allow=false;
            }

            return $allow;
        });

        Gate::define('editUser', function($user){
            $role = $user->roles()->first()->id;

            $allow;
            if($role == 1 or $role == 2 ){
                $allow=true;
            }else{
                $allow=false;
            }

            return $allow;
        });

        Gate::define('consultUser', function($user){
            $role = $user->roles()->first()->id;

            $allow;
            if($role == 1 ){
                $allow=true;
            }else{
                $allow=false;
            }

            return $allow;
        });

        Gate::define('consultUsers', function($user){
            $role = $user->roles()->first()->id;

            $allow;
            if($role == 1 or $role == 2){
                $allow=true;
            }else{
                $allow=false;
            }

            return $allow;
        });
        //Session
        Gate::define('registerSession', function($user){
            $role = $user->roles()->first()->id;
            $allow;
            if($role == 1 or $role == 2){
                $allow=true;
            }else{
                $allow=false;
            }

            return $allow;
        });
        Gate::define('deleteSession', function($user){
            $role = $user->roles()->first()->id;

            $allow;
            if($role == 1 or $role == 2 ){
                $allow=true;
            }else{
                $allow=false;
            }

            return $allow;
        });

        Gate::define('editSession', function($user){
            $role = $user->roles()->first()->id;

            $allow;
            if($role == 1 or $role == 2 ){
                $allow=true;
            }else{
                $allow=false;
            }

            return $allow;
        });

        Gate::define('consultSession', function($user){
            $role = $user->roles()->first()->id;

            $allow;
            if($role == 1 ){
                $allow=true;
            }else{
                $allow=false;
            }

            return $allow;
        });

        Gate::define('consultSessions', function($user){
            $role = $user->roles()->first()->id;

            $allow;
            if($role == 1 or $role == 2){
                $allow=true;
            }else{
                $allow=false;
            }

            return $allow;
        });
    }
}
