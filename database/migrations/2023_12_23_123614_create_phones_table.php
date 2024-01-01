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
        Schema::create('phones', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->foreignId('brand_id')->constrained('brands')->cascadeOnDelete();
            $table->string('launch')->nullable();
            $table->string('os')->nullable();
            $table->string('cpu')->nullable();
            $table->string('gpu')->nullable();
            $table->string('ram')->nullable();
            $table->string('storage')->nullable();
            $table->string('size')->nullable();
            $table->string('camera')->nullable();
            $table->string('speaker')->nullable();
            $table->string('battery')->nullable();
            $table->string('color')->nullable();
            $table->string('phone_img')->nullable();
            $table->string('phones_img')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phones');
    }
};
