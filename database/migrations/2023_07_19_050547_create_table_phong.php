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
        Schema::create('table_phong', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_lp');
            $table->unsignedInteger('id_km')->nullable();
            $table->string('name');
            $table->integer('soLuong');
            $table->integer('price');
            $table->string('image');
            $table->string('img_descrition');
            $table->longText('description');
            $table->string('note');
            $table->tinyInteger('action');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_phong');
        Schema::enableForeignKeyConstraints();
    }
};
