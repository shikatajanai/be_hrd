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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            //id_company, integer
            $table->integer('id_company');
            //name
            $table->string('name');
            //description, nullable
            $table->text('description')->nullable();
            //start date, end date
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            //start time, end time
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
