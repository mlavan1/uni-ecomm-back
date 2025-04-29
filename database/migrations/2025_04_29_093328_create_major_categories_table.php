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
        Schema::create('major_categories', function (Blueprint $table) {
            $table->id();
            $table->string('code',50)->default('');
            $table->string('name_of',200)->default('');
            $table->string('icon',200)->default('');
            $table->string('img_path',500)->default('');
            $table->string('is_active',5)->default('Y');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('major_categories');
    }
};
