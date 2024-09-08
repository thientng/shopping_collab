<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate; // class Dùng để định nghĩa các nguồn
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use App\Services\PermissionGateAndPolicyAccess;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Gate::define("", function ($user) { 
        //     return $user->hasRole("");
        // });
        
        // Define Permission
        $permissionGateAndPolicy = new PermissionGateAndPolicyAccess();
        $permissionGateAndPolicy->setGateAndPolicyAccess();
        
        // Nguyễn bản lúc ms học
        // Gate::define('category-delete', function (User $user) {
        //     return $user->checkPermissionAccess(config('permissions.access.delete-category'));
        // });
        // Gate::define('category-list', function (User $user) {
        //     return $user->checkPermissionAccess('danh-sach-danh-muc');
        // });
    }

}
