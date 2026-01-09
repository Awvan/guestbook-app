<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            // Hubungkan ke kategori
            $table->foreignId('event_category_id')->constrained('event_categories');
            $table->string('title');
            $table->text('description');
            $table->dateTime('event_date');
            $table->string('location');
            $table->integer('quota')->default(100); // Fitur Kuota
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
