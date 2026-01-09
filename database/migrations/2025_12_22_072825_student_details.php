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
        Schema::create('student_details', function (Blueprint $table) {
            $table->id();
            // Terhubung ke tabel registrations
            $table->foreignId('registration_id')->constrained('registrations')->onDelete('cascade');
            $table->string('nim');
            $table->string('university'); // Asal Kampus
            $table->string('major');      // Prodi
            $table->integer('semester');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
