<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function attributeColor(){
        return $this->belongsTo(Attribute::class,'color_id');
    }
    public function attributeSize(){
        return $this->belongsTo(Attribute::class,'size_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

}
