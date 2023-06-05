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
        Schema::create('personel_files', function(Blueprint $table) {
            $table->id();
            //
            $table->foreignId('personel_id')->constrained('personels')->nullable();
            //
            $table->string('file_name')->nullable();
            $table->string('file_path')->nullable();
            $table->enum('file_type',['cv','anlasma','kimlik_bilgileri'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personel_files');
    }
};