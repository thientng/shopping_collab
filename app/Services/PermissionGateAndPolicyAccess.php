<?php 

namespace App\Services;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class PermissionGateAndPolicyAccess {
    public function setGateAndPolicyAccess(){

        // $this->defineGateAdmin();
        
        // Gate back-end
        $this->defineGateCategory();
        $this->defineGateMenu();
        $this->defineGateProduct();
        $this->defineGateSlider();
        $this->defineGateSetting();
        $this->defineGateRole();
        $this->defineGateUser();
    }


    
    // public function defineGateAdmin(){
    //     Gate::define('admin-view', function (User $user){
    //         return $user->checkPermissionAccess(config('permissions.access.view-admin'));
    //     });
    // }

    public function defineGateCategory(){
        Gate::define('category-list', 'App\Policies\CategoryPolicy@view');
        Gate::define('category-create', 'App\Policies\CategoryPolicy@create');
        Gate::define('category-update', 'App\Policies\CategoryPolicy@update');
        Gate::define('category-delete', 'App\Policies\CategoryPolicy@delete');
    }
    public function defineGateMenu(){
        Gate::define('menu-list', 'App\Policies\MenuPolicy@view');
        Gate::define('menu-create', 'App\Policies\MenuPolicy@create');
        Gate::define('menu-update', 'App\Policies\MenuPolicy@update');
        Gate::define('menu-delete', 'App\Policies\MenuPolicy@delete');
    }
    public function defineGateProduct(){
        Gate::define('product-list', 'App\Policies\ProductPolicy@view');
        Gate::define('product-create', 'App\Policies\ProductPolicy@create');
        Gate::define('product-update', 'App\Policies\ProductPolicy@update');
        Gate::define('product-delete', 'App\Policies\ProductPolicy@delete');
    }
    public function defineGateSlider(){
        Gate::define('slider-list', 'App\Policies\SliderPolicy@view');
        Gate::define('slider-create', 'App\Policies\SliderPolicy@create');
        Gate::define('slider-update', 'App\Policies\SliderPolicy@update');
        Gate::define('slider-delete', 'App\Policies\SliderPolicy@delete');
    }
    public function defineGateSetting(){
        Gate::define('setting-list', 'App\Policies\SettingPolicy@view');
        Gate::define('setting-create', 'App\Policies\SettingPolicy@create');
        Gate::define('setting-update', 'App\Policies\SettingPolicy@update');
        Gate::define('setting-delete', 'App\Policies\SettingPolicy@delete');
    }
    public function defineGateRole(){
        Gate::define('role-list', 'App\Policies\RolePolicy@view');
        Gate::define('role-create', 'App\Policies\RolePolicy@create');
        Gate::define('role-update', 'App\Policies\RolePolicy@update');
        Gate::define('role-delete', 'App\Policies\RolePolicy@delete');
    }
    public function defineGateUser(){
        Gate::define('user-list', 'App\Policies\UserPolicy@view');
        Gate::define('user-create', 'App\Policies\UserPolicy@create');
        Gate::define('user-update', 'App\Policies\UserPolicy@update');
        Gate::define('user-delete', 'App\Policies\UserPolicy@delete');
    }
}