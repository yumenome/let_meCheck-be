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
        Schema::create('blog_reivews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('phone_id')->constrained('phones')->cascadeOnDelete();
            $table->string('source');
            $table->text('intro');
            $table->text('blog_link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_reivews');
    }
};
