<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAddRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Traits\DeleteModelTrait;
use DB;
use Log;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    private $user;
    private $role;

    use DeleteModelTrait;
    
    public function __construct(){
        $this->user = new User();
        $this->role = new Role();
    }

    public function index(){
        $users = $this->user->latest()->paginate(10);
        return view('admin.user.index',[
            'users' => $users,
        ]);
    }

    public function create() {
        $roles = $this->role->all();
        return view('admin.user.add',[
            'roles' => $roles
        ]);
    }

    public function store(Request $request) {
        try{            
            DB::beginTransaction();
            $user = $this->user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'status' => 1,
            ]);
            // dd($user);
            
            $roleIds = $request->roles;
            $user->roles()->attach($roleIds);
            // foreach($roleIds as $roleId){
            //     DB::table('user_role')->insert([
            //         'role_id' => $roleId,
            //         'user_id' => $user->id
            //     ]);
            // }
            
            DB::commit();

            return redirect()->route('users.index');

        } catch(\Exception $exception){
            DB::rollBack();
            Log::error('Message : '.$exception->getMessage().' Line : '.$exception->getLine());
        }
    }
    
    public function edit($id) {
        $user = $this->user->find($id);
        $roles = $this->role->all();
        $roleOfUser = collect($user->roles);
        // dd($roleOfUser);    
        // dd($roleOfUser); 
        return view('admin.user.edit',[
            'user' => $user,
            'roles' => $roles,
            'roleOfUser' =>  $roleOfUser,
        ]);
    }
    public function update($id,Request $request) {
        try{            
            DB::beginTransaction();
             $this->user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            
            $roleIds = $request->roles;
            $user = $this->user->find($id);
            $user->roles()->sync($roleIds);

            DB::commit();

            return redirect()->route('users.index');

        } catch(\Exception $exception){
            DB::rollBack();
            Log::error('Message : '.$exception->getMessage().' Line : '.$exception->getLine());
        }
    }

    public function delete($id){
        return $this->deleteModelTrait($id, $this->user);
    }
}
