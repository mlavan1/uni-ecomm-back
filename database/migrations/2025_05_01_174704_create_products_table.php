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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code',50)->default('');
            $table->string('nameOf',200)->default('');
            $table->string('slug',200)->default('');
            $table->string('description',500)->default('');
            $table->string('imgPath',500)->default('');
            $table->string('isActive',5)->default('Y');
            $table->decimal('price',18,2)->default(0);
            $table->unsignedBigInteger('mainCategory_id');
            $table->foreign('mainCategory_id')->references('id')->on('major_categories')->onDelete('cascade');
            $table->unsignedBigInteger('subCategory_id');
            $table->foreign('subCategory_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->unsignedBigInteger('scale_id');
            $table->foreign('scale_id')->references('id')->on('scales')->onDelete('cascade');
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->string('sku',200)->default('');
            $table->decimal('discountRate',18,2)->default(0);
            $table->decimal('discountAmount',18,2)->default(0);
            $table->decimal('vatRate',18,2)->default(0);
            $table->decimal('vatAmount',18,2)->default(0);
            $table->decimal('qty',18,2)->default(0);
            $table->string('isNew',5)->default('N');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
