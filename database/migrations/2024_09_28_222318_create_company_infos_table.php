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
        Schema::create('company_infos', function (Blueprint $table) {
            $table->id();
            //id_user, integer
            $table->integer('id_user');
            $table->string('name');
            //phone number, string, nullable
            $table->string('phone')->nullable();
            //email, string, nullable
            $table->string('email')->nullable();
            //address, text, nullable
            $table->text('address')->nullable();
            //province, city, industry, company size, npwp, taxable, tax_name, hq_initial, umr, umr_province, bpjs_kesehatan, bpjs_ketenagakerjaan
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('industry')->nullable();
            $table->string('company_size')->nullable();
            $table->string('npwp')->nullable();
            $table->string('taxable')->nullable();
            $table->string('tax_name')->nullable();
            $table->string('hq_initial')->nullable();
            $table->string('umr')->nullable();
            $table->string('umr_province')->nullable();
            $table->string('bpjs_kesehatan')->nullable();
            $table->string('bpjs_ketenagakerjaan')->nullable();
            $table->text('description')->nullable();
            $table->text('logo')->nullable();
            //signature, text, nullable
            $table->text('signature')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_infos');
    }
};
