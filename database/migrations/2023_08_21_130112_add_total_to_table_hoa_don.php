<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('table_hoa_don', function (Blueprint $table) {
            $table->integer('total')->nullable()->after('pttt');
            $table->integer('soPhong')->nullable()->after('soLuong');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_hoa_don', function (Blueprint $table) {
            $table->dropColumn('total');
            $table->dropColumn('soPhong');
        });
    }
};