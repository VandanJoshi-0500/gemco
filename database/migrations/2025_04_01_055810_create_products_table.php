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
            $table->text('name')->nullable();
            $table->string('sku')->nullable();
            $table->text('color')->nullable();
            $table->text('size')->nullable();
            $table->integer('hsn_code')->nullable();
            $table->integer('category')->nullable();
            $table->integer('subcategory')->nullable();
            $table->integer('collection')->nullable();
            $table->integer('secoundary_collection_1')->nullable();
            $table->integer('secoundary_collection_2')->nullable();
            $table->integer('price')->nullable();
            $table->integer('special_price')->nullable();
            $table->integer('tag_price')->nullable();
            $table->integer('quantity_stock')->default(0)->nullable();
            $table->text('long_description')->nullable();
            $table->text('long_description_2')->nullable();
            $table->text('long_description_3')->nullable();
            $table->text('short_description')->nullable();
            $table->string('sUrlkey')->nullable();
            $table->string('sCountryName')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('keyword')->nullable();
            $table->integer('gold_weight')->nullable();
            $table->integer('silver_weight')->nullable();
            $table->integer('diamond_weight')->nullable();
            $table->string('diamond_grade')->nullable();
            $table->text('gemstone_name_1')->nullable();
            $table->integer('gemstone_weight_1')->nullable();
            $table->text('gemstone_name_2')->nullable();
            $table->integer('gemstone_weight_2')->nullable();
            $table->text('gemstone_name_3')->nullable();
            $table->integer('gemstone_weight_3')->nullable();
            $table->text('other_gemstones')->nullable();
            $table->integer('other_gemstone_weight')->nullable();
            $table->text('fossil_name')->nullable();
            $table->integer('fossil_weight')->nullable();
            $table->integer('gross_weight')->nullable();
            $table->integer('total_gemstone_weight')->nullable();
            $table->text('gemstone_type')->nullable();
            $table->text('diamond_cut')->nullable();
            $table->text('diamond_shape')->nullable();
            $table->integer('image_type')->default(0)->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->string('image5')->nullable();
            $table->integer('status')->default('0');
            $table->integer('active')->default('0');
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
