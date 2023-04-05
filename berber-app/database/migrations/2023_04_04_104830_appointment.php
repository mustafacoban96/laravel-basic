<?php

use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('appointments' ,function (Blueprint $table){
            $table->increments('id');
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('users')->where('role',2)->onDelete('cascade');
            $table->integer('worktime_id')->unsigned();
            $table->foreign('worktime_id')->references('id')->on('worktimes')->onDelete('cascade');
            $table->timestamps();
            
       });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
