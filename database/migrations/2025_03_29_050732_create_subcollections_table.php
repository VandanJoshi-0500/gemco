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
        Schema::create('subcollections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('collection_id')->constrained('collections')->onDelete('cascade');
            $table->string('collection_name'); // Added column to store collection name
            $table->string('secoundary_collection_1');
            $table->string('secoundary_collection_2')->nullable();
            $table->string('slug')->unique();
            $table->string('meta_text')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('keywords')->nullable();
            $table->boolean('status')->default(1); // Active by default
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subcollections');
    }
};
