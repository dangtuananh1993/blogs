<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\user;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('post-index',function($user){
            $allowRoles=[
                'admin',
                'editor',
            ];
            return in_array($user->getStrType(), $allowRoles);
        });

        Gate::define('post-creat',function($user){
            $allowRoles=[
                'admin',
                'editor',
                'collaborators',
            ];
            return in_array($user->getStrType(), $allowRoles);
        });

        Gate::define('post-edit',function($user){
            $allowRoles=[
                'admin',
                'editor',
                'collaborators',
            ];
            return in_array($user->getStrType(), $allowRoles);
        });

        Gate::define('post-delete',function($user){
            $allowRoles=[
                'admin',
                'editor',
                'collaborators',
            ];
            return in_array($user->getStrType(), $allowRoles);
        });    

        Gate::define('tag-delete',function($user){
            $allowRoles=[
                'admin',
                'editor',
            ];
            return in_array($user->getStrType(), $allowRoles);
        });   

        Gate::define('category-index',function($user){
            $allowRoles=[
                'admin',
                'editor',
            ];
            return in_array($user->getStrType(), $allowRoles);
        });  

        Gate::define('category-create',function($user){
            $allowRoles=[
                'admin',
                'editor',
            ];
            return in_array($user->getStrType(), $allowRoles);
        });

        Gate::define('master-layout',function($user){
            $allowRoles=[
                'admin',
                'editor', 
            ];
            return in_array($user->getStrType(), $allowRoles);
        });

        Gate::define('user-roles',function($user){
            $allowRoles=[
                'admin',
            ];
            return in_array($user->getStrType(), $allowRoles);
        });

        Gate::define('collaborators-posts',function($user){
            $allowRoles=[
                'collaborators',
            ];
            return in_array($user->getStrType(), $allowRoles);
        });

    }
}
