<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // lệnh thêm một cột vào bảng php artisan make:migration add_column_deleted_at_table_categories --table=categories
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->softDeletes(); // thêm một trạng thái xóa ảo để lưu tgian xóa 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('deleted_at'); // lệnh xóa cột dùng cho rollback hoặc ...
        });
    }
};
