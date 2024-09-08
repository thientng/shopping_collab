<?php

namespace App\Traits;
use Illuminate\Support\Facades\Log;

trait DeleteModelTrait {
    public function deleteModelTrait($id,$model){
        try {
            $model->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success',
            ],200);

        } catch(\Exception $exception) { // nếu lỗi sẽ chạy catch
            Log::error('Message : '. $exception->getMessage().'. Line : '.$exception->getLine()); // vào storage/logs/.. để xem lỗi được in ra
            return response()->json([
                'code' => 500,
                'message' => 'error',
            ],500);
        }
    }
}