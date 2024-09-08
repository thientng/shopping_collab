<?php 

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

trait StorageImageTrait {
    public function storageTraitUpload($request, $fieldName , $folderName) {
        if($request->hasFile($fieldName)) { // hasFile() kiểm tra xem đã cho file vào Request đã chỉ định(name input) hay chưa 

            $file = $request->$fieldName;

            $fileNameOrgin = $file->getClientOriginalName(); // lấy tên của file upload
            //$filePath = $request->file('feature_image_path')->store('public/product'); // phương thức store() upload file vào đường dẫn local storage/app và file ảnh được up lên sẽ được mã hóa
            //$filePath = $request->feature_image_path->store('public/product'); // 2 cách viết như nhau : có thể viết tên file trong $request->file('tên') hoặc có thể gọi thẳng $request->tên
            $fileNameHash = Str::random(20).'.'.$file->getClientOriginalExtension(); // xử lí tên file, getClientOriginalExtension() là gì thì chưa biết tự tra
            $filePath = $request->$fieldName->storeAs( 'public/'.$folderName.'/' . Auth::id(), $fileNameHash); // storeAs() giống store() đều dùng để upload file , tuy nhiên storeAs hỗ trợ lấy file ảnh với tên tùy chỉnh(có thể đã qua xử lí $fileNameHash ) VÀ chỉ định lưu vào thư mục nào được (lưu ý : lấy từ storage/app/ local ), $fileNameHash đã xử lí tên file 
            $dataUploadTrait = [
                'file_name' => $fileNameOrgin,
                'file_path' => Storage::url($filePath) // $filePath nhận đường dẫn từ storage/app/public dùng Storage::url() để đưa sang public/storage 
            ];
    
            return $dataUploadTrait;
            
        } else {
            return null;
        }
    }

    public function storageTraitUploadMultiple($file , $folderName) {
        $fileNameOrgin = $file->getClientOriginalName(); // lấy tên của file upload
        $fileNameHash = Str::random(20).'.'.$file->getClientOriginalExtension(); // xử lí tên file, getClientOriginalExtension() là gì thì chưa biết tự tra
        $filePath = $file->storeAs( 'public/'.$folderName.'/' . Auth::id(), $fileNameHash); // storeAs() giống store() đều dùng để upload file , tuy nhiên storeAs hỗ trợ lấy file ảnh với tên tùy chỉnh(có thể đã qua xử lí $fileNameHash ) VÀ chỉ định lưu vào thư mục nào được (lưu ý : lấy từ storage/app/ local ), $fileNameHash đã xử lí tên file 
        $dataUploadTrait = [
            'file_name' => $fileNameOrgin,
            'file_path' => Storage::url($filePath) // $filePath nhận đường dẫn từ storage/app/public dùng Storage::url() để đưa sang public/storage 
        ];

        return $dataUploadTrait;
    }
}