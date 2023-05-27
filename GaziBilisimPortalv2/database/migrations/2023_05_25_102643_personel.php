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
        Schema::create('personels', function (Blueprint $table) {
            $table->id();
            $table->string('tc_num')->nullable();
            $table->string('cinsiyet')->nullable();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('kan_grubu')->nullable();
            $table->string('telefon')->nullable();
            $table->string('baba_adi')->nullable();
            $table->dateTime('dogum_tarihi')->nullable();
            $table->string('adres')->nullable();
            $table->string('is_yeri_tipi')->nullable();
            //
            $table->foreignId('birim_id')->constrained('birimler')->nullable();
            //
            $table->foreignId('meslek_id')->constrained('meslekler')->nullable();
            //
            $table->dateTime('is_giris')->nullable();
            $table->integer('maas')->nullable();
            $table->string('maas_tipi')->nullable();
            $table->dateTime('is_ayrilma_tarihi')->nullable();
            $table->string('isten_ayrilma_nedeni')->nullable();
            $table->integer('kidem_tazminati')->nullable();
            $table->integer('ihbar_tazminati')->nullable();
            $table->integer('yıllık_izin_ücreti')->nullable();
            $table->string('ssk_sicil')->nullable();
            //status atanacak
            $table->unsignedBigInteger('status_id')->default(3);
            $table->foreign('status_id')->references('id')->on('personel_status')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personels');
    }
};
