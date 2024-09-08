<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class LoginGoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
      
            $user = Socialite::driver('google')->user();
       
            $finduser = User::where('google_id', $user->id)->first();
       
            if($finduser){
       
                auth()->guard('guest')->login($finduser);
      
                return redirect()->intended('/');
       
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('Thien.tng1@@'),
                    'status' => 1,
                ]);

                $this->setRoleGuest($newUser);
      
                auth()->guard('guest')->login($newUser);
      
                return redirect()->intended('/');
            }
      
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function setRoleGuest($user){
    /* Start add guest role for new user */
        // Find the 'guest' role
        $guestRole = Role::where('name', 'guest')->first();

        // If the 'guest' role doesn't exist, you might want to create it first
        if (!$guestRole) {
            $guestRole = Role::create(['name' => 'guest','display_name' => 'Khách hàng']);
        } 
        $user->roles()->attach($guestRole);
    /* End */
    }
}
