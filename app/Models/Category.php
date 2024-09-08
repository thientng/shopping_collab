<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;

    use SoftDeletes; // thêm vào để sử dụg được chức năng softdelete (sẽ tự động update thời gian xóa vào database)
    protected $fillable = ['name','parent_id','slug']; 
    // $fillable dùng để gọi những trường cần Insert ở trong bảng
    // $guarded dùng để ngăn chặn những cột mà bạn không muốn insert vào. Mẹo: nếu dùng $guarded = [] có nghĩa là không cấn insert cột nào cả, được phép insert tất cả các cột
    
    public function categoryChildren(){
        return $this->hasMany(Category::class,'parent_id');
    }


}
