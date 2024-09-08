<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Traits\DeleteModelTrait;
use DB;
use Log;


class AdminRoleController extends Controller
{
    use DeleteModelTrait;
    private $role;
    private $permission;

    public function __construct(){
        $this->role = new Role();
        $this->permission = new Permission();
    }

    public function index(){
        $roles = $this->role->latest()->paginate(10);
        return view('admin.role.index',[
            'roles' => $roles,
        ]);
    }

    public function create(){
        $permissionsParent = $this->permission->where('parent_id',0)->get();
        return view('admin.role.add',[
            'permissionsParent' => $permissionsParent,
        ]);
    }
    public function store(Request $request){
        try{
            DB::beginTransaction();
            // dd($request);
            // dd($request->permission_id);
            $role =$this->role->create([
                'name' => $request->name,
                'display_name' => $request->display_name,
            ]);

            $role->permissions()->attach($request->permission_id);
            DB::commit();

            return redirect()->route('roles.index');

        } catch(\Exception $exception){
            DB::rollBack();
            Log::error('Message : '.$exception->getMessage().' Line : '.$exception->getLine());
        }
    }
    public function edit($id){
        $role = $this->role->find($id);
        $permissionsParent = $this->permission->where('parent_id',0)->get();
        $permissionsChecked = $role->permissions()->get();
        return view('admin.role.edit',[
            'role' => $role,
            'permissionsParent' => $permissionsParent,
            'permissionsChecked' => $permissionsChecked
        ]);
    }
    public function update($id, Request $request){
        try{
            DB::beginTransaction();

            $this->role->find($id)->update([
                'name' => $request->name,
                'display_name' => $request->display_name,
            ]); // trả về boolean nên phải truy vấn riêng $role để dùng relationship

            $role = $this->role->find($id);

            $role->permissions()->sync($request->permission_id);
            DB::commit();

            return redirect()->route('roles.index');

        } catch(\Exception $exception){
            DB::rollBack();
            Log::error('Message : '.$exception->getMessage().' Line : '.$exception->getLine());
        }
    }
    public function delete($id){
       return $this->deleteModelTrait($id,$this->role);
    }
}
