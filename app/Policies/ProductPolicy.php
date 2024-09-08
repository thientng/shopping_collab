<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProductPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    // public function viewAny(User $user): bool
    // {
    //     //
    // }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool
    {
        return $user->checkPermissionAccess(config('permissions.access.list-product'));
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionAccess(config('permissions.access.create-product'));
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user,$id): bool
    {   
        $product = Product::find($id);
        // dd($id.'-'.$product->user_id.'-'.$user->id.'-'.$user->checkPermissionAccess(config('permissions.access.update-product')));

        if($user->checkPermissionAccess(config('permissions.access.update-product')) && ($product->user_id === $user->id) ){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        return $user->checkPermissionAccess(config('permissions.access.delete-product'));
    }

    /**
     * Determine whether the user can restore the model.
     */
    // public function restore(User $user, Product $product): bool
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can permanently delete the model.
    //  */
    // public function forceDelete(User $user, Product $product): bool
    // {
    //     //
    // }
}
