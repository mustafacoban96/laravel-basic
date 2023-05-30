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
        Schema::table('personels', function (Blueprint $table) {
            $table->string('birim_adi')->after('birim_id')->nullable();
            $table->string('meslek_adi')->after('meslek_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('personels', function (Blueprint $table){
            $table->dropColumn('birim_adi');
            $table->dropColumn('meslek_adi');
        });
    }
};
