<?php

namespace App\Http\Controllers;

use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use App\Http\Requests\SliderAddRequest;
use App\Models\Slider;
use Log;
use DB;
use App\Traits\DeleteModelTrait;



class SliderAdminController extends Controller
{
    use StorageImageTrait;
    use DeleteModelTrait;
    private $slider;
    public function __construct(){
        $this->slider = new Slider();
    }
    public function index(){
        $sliders = $this->slider->latest()->paginate(5);
        return view('admin.slider.index',[
            'sliders' => $sliders
        ]);
    }
    
    public function validateInputField($request, $fieldName = '',$message ='Không được để trống trường này'){
        $rules = [
            $fieldName => 'required',
        ];
        $messages = [
            $fieldName.'.required' => $message,
        ];
        return $request->validate($rules,$messages);
    }

    public function create(){
        return view('admin.slider.add');
    }
    public function store(SliderAddRequest $request){
        try{
            DB::beginTransaction();
            $dataSliderInsert =[
                'title' => $request->name,
                'description' => $request->contents,
            ];
            $dataImageSlider =$this->storageTraitUpload($request,'image_path','slider');
            if(!empty($dataImageSlider)){
                $dataSliderInsert['image_name'] = $dataImageSlider['file_name'];
                $dataSliderInsert['image_path'] = $dataImageSlider['file_path'];
            }
            $this->slider->create($dataSliderInsert);
            DB::commit();

            return redirect()->route('slider.index');

        } catch(\Exception $exception){
            DB::rollBack();
            Log::error('Message : '.$exception->getMessage().' Line : '.$exception->getLine());
        }
    }


    public function edit($id){
        $slider = $this->slider->find($id);
        return view('admin.slider.edit',[
            'slider' => $slider,
        ]);
    }
    public function update($id, SliderAddRequest $request){
        // if($request->hasFile('image_path')){
        //     $this->validateInputField($request,'image_path','Không được bỏ trống hình ảnh');
        // }

        try{
            DB::beginTransaction();
            $dataSliderUpdate =[
                'title' => $request->name,
                'description' => $request->contents,
            ];
            $dataImageSlider =$this->storageTraitUpload($request,'image_path','slider');
            if(!empty($dataImageSlider)){
                $dataSliderUpdate['image_name'] = $dataImageSlider['file_name'];
                $dataSliderUpdate['image_path'] = $dataImageSlider['file_path'];
            }
            $this->slider->find($id)->update($dataSliderUpdate);
            DB::commit();
            
            return redirect()->route('slider.index');


        } catch(\Exception $exception){
            DB::rollBack();
            Log::error('Message : '. $exception->getMessage().'. Line : '.$exception->getLine()); // vào storage/logs/.. để xem lỗi được in ra
        }
    }
    public function delete($id){
        return $this->deleteModelTrait($id, $this->slider);
    }
}
