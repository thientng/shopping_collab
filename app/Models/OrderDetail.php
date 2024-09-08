<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function productAttributes(){
        return $this->belongsTo(ProductAttribute::class,'product_attribute_id','id');
    }
}
