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
        Schema::create('job_levels', function (Blueprint $table) {
            $table->id();
            //id user, bigint
            $table->bigInteger('id_user');
            //id company, bigint
            $table->bigInteger('id_company');
            //job code, varchar, nullable
            $table->string('job_code')->nullable();
            //job name, text
            $table->text('job_name');
            //description, text, nullable
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_levels');
    }
};
