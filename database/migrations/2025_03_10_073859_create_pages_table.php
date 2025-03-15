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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('page_title')->nullable();
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->text('meta_text')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('keyword')->nullable();
            $table->integer('status')->default(0)->nullable();
            $table->integer('active')->default(1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
