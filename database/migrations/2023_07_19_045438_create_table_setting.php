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
        Schema::create('table_setting', function (Blueprint $table) {
            $table->string('name');
            $table->string('logo');
            $table->string('fanpage');
            $table->string('email');
            $table->string('address');
            $table->string('image');
            $table->string('tel');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_setting');
    }
};
