<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SettingAddRequest;
use App\Models\Setting;
use App\Traits\DeleteModelTrait;
use Illuminate\Support\Facades\DB;
use Log;

class AdminSettingController extends Controller
{
    private $setting;

    use DeleteModelTrait;
    public function __construct(){
        $this->setting = new Setting();
    }
    public function index() {
        $settings = $this->setting->latest()->paginate(5);
        return view('admin.setting.index',[
            'settings' => $settings
        ]);
    }
    public function create() {
        return view('admin.setting.add');
    }
    public function store(SettingAddRequest $request) {
        // dd($request);
        try{
            DB::beginTransaction();
            $this->setting->create([
                'config_key' => $request->config_key,
                'config_value' => $request->config_value,
            ]);
            DB::commit();

            return redirect()->route('settings.index');

        } catch(\Exception $exception){
            DB::rollBack();
            Log::error('Message : '.$exception->getMessage().' Line : '.$exception->getLine());
        }
    }
    
    public function edit($id){
        $setting = $this->setting->find($id);
        return view('admin.setting.edit',[
            'setting' => $setting,
        ]);
    }

    public function update($id,SettingAddRequest $request) {
        try{
            DB::beginTransaction();
            $this->setting->find($id)->update([
                'config_key' => $request->name,
                'config_value' => $request->contents,
            ]);
            DB::commit();

            return redirect()->route('settings.index');

        } catch(\Exception $exception){
            DB::rollBack();
            Log::error('Message : '.$exception->getMessage().' Line : '.$exception->getLine());
        }
    }

    public function delete($id){
        return $this->deleteModelTrait($id, $this->setting);
    }

    
}
