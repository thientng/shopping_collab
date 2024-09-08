<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use DB;

class CreateRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            ['name' => 'admin','display_name' => 'Quản trị hệ thống'],
            ['name' => 'guest','display_name' => 'Khách hàng'],
            ['name' => 'developer','display_name' => 'Phát triển hệ thống'],
            ['name' => 'content','display_name' => 'Chỉnh sửa nội dung']
        ]);
    }
}
