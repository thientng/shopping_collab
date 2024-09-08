<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreatePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->insert([
            ['name' => 'Danh mục sản phẩm','display_name' => 'Danh mục sản phẩm','parent_id' => 0],
            ['name' => 'Danh sách danh mục','display_name' => 'Danh sách danh mục','parent_id' => 1],
            ['name' => 'Thêm danh mục','display_name' => 'Thêm danh mục','parent_id' => 1],
            ['name' => 'Sửa danh mục','display_name' => 'Sửa danh mục','parent_id' => 1],
            ['name' => 'Xóa danh mục','display_name' => 'Xóa danh mục','parent_id' => 1],
            ['name' => 'Menu','display_name' => 'Menu','parent_id' => 0],
            ['name' => 'Danh sách Menu','display_name' => 'Danh sách Menu','parent_id' => 6],
            ['name' => 'Thêm Menu','display_name' => 'Thêm Menu','parent_id' => 6],
            ['name' => 'Sửa Menu','display_name' => 'Sửa Menu','parent_id' => 6],
            ['name' => 'Xóa Menu','display_name' => 'Xóa Menu','parent_id' => 6],
            ['name' => 'Slider','display_name' => 'Slider','parent_id' => 0],
            ['name' => 'Danh sách Slider','display_name' => 'Danh sách Slider','parent_id' => 11],
            ['name' => 'Thêm Slider','display_name' => 'Thêm Slider','parent_id' => 11],
            ['name' => 'Sửa Slider','display_name' => 'Sửa Slider','parent_id' => 11],
            ['name' => 'Xóa Slider','display_name' => 'Xóa Slider','parent_id' => 11],
            ['name' => 'Sản phẩm','display_name' => 'Sản phẩm','parent_id' => 0],
            ['name' => 'Danh sách sản phẩm','display_name' => 'Danh sách sản phẩm','parent_id' => 16],
            ['name' => 'Thêm sản phẩm','display_name' => 'Thêm sản phẩm','parent_id' => 16],
            ['name' => 'Sửa sản phẩm','display_name' => 'Sửa sản phẩm','parent_id' => 16],
            ['name' => 'Xóa sản phẩm','display_name' => 'Xóa sản phẩm','parent_id' => 16],
            ['name' => 'Setting','display_name' => 'Setting','parent_id' => 0],
            ['name' => 'Danh sách Setting','display_name' => 'Danh sách Setting','parent_id' => 21],
            ['name' => 'Thêm Setting','display_name' => 'Thêm Setting','parent_id' => 21],
            ['name' => 'Sửa Setting','display_name' => 'Sửa Setting','parent_id' => 21],
            ['name' => 'Xóa Setting','display_name' => 'Xóa Setting','parent_id' => 21],
            ['name' => 'User','display_name' => 'User','parent_id' => 0],
            ['name' => 'Danh sách User','display_name' => 'Danh sách User','parent_id' => 26],
            ['name' => 'Thêm User','display_name' => 'Thêm User','parent_id' => 26],
            ['name' => 'Sửa User','display_name' => 'Sửa User','parent_id' => 26],
            ['name' => 'Xóa User','display_name' => 'Xóa User','parent_id' => 26],
            ['name' => 'Role','display_name' => 'Role','parent_id' => 0],
            ['name' => 'Danh sách Role','display_name' => 'Danh sách Role','parent_id' => 31],
            ['name' => 'Thêm Role','display_name' => 'Thêm Role','parent_id' => 31],
            ['name' => 'Sửa Role','display_name' => 'Sửa Role','parent_id' => 31],
            ['name' => 'Xóa Role','display_name' => 'Xóa Role','parent_id' => 31],

            
        ]);
    }
}
