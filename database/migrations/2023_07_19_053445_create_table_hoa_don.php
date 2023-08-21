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
        Schema::create('table_hoa_don', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_phong');
            $table->unsignedInteger('id_user');
            $table->unsignedInteger('id_km');
            $table->integer('soLuong');
            $table->date('checkin');
            $table->date('checkout');
            $table->tinyInteger('pttt');
            $table->tinyInteger('status');
            $table->timestamps();
            $table->softDeletes();
        });
        

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       
        Schema::dropIfExists('table_hoa_don');
    }
};