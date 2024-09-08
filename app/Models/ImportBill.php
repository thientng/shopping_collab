<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportBill extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function users(){
        return $this->belongsTo(User::class,'id_user');
    }
}
