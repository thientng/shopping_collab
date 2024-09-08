<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded =[]; // k cấm cột nào

    // Tìm hiểu Eloquent: Relationships One to Many
    public function images() {
        // khóa ngoại tới bảng product_image
        return $this->hasMany(ProductImage::class,'product_id','id'); 
    }
    
    
    // Tìm hiểu Eloquent: Many To Many 
    public function tags() {
        // liên kết bảng product với bảng tags thông qua(cầu nối) bảng product_tags
        return $this->belongsToMany(Tag::class,'product_tags','product_id','tag_id')->withTimestamps(); // withTimestamps() dùng để insert cả thời gian tạo tgian xóa 
        // belongsToMany(Role::class, 'bảng trung gian', 'user_id', 'role_id')
    }
    // Tìm hiểu Eloquent: Many To One
    public function categories(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    
    // One To Many
    public function productAttribute() {
        return $this->hasMany(ProductAttribute::class,'product_id');
    }
    public function productAttributeColor() {
        return $this->belongsToMany(Attribute::class,'product_attributes','product_id','color_id')->withTimestamps();
    }
    public function colors() {
        return $this->belongsToMany(Attribute::class,'product_attributes','product_id','color_id')->withTimestamps();
    }
    public function sizes() {
        return $this->belongsToMany(Attribute::class,'product_attributes','product_id','size_id')->withTimestamps();
    }

}
