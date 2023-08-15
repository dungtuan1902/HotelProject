<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('table_hoa_don_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_hd');
            $table->integer('total');
            $table->date('checkin');
            $table->date('checkout');
            $table->tinyInteger(2);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_hoa_don_detail');
    }
};
