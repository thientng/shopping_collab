<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Permission extends Model
{
    use HasFactory;
    protected $guarded = [];
    

    public function permissionsChildrent() {
        return $this->hasMany(Permission::class,'parent_id');
    }

    public static function updateKeyCode()
    {
        $items = self::all();

        foreach ($items as $item) {
            $key_code = Str::slug($item->name, '-');
            $key_code = preg_replace('/[^A-Za-z0-9-]/', '', $key_code);

            $item->key_code = $key_code;
            $item->save();
        }
    }

}
