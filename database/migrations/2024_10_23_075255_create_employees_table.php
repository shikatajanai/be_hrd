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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            //first name
            $table->string('first_name');
            //last name
            $table->string('last_name');
            //email
            $table->string('email')->unique();
            //phone
            $table->string('phone');
            //place of birth, nullable
            $table->string('place_of_birth')->nullable();
            //birth date
            $table->date('birth_date');
            //gender
            $table->string('gender');
            //marital status
            $table->string('marital_status');
            //religion
            $table->string('religion');
            //blood type
            $table->string('blood_type')->nullable();
            //npwp
            $table->string('npwp')->nullable();
            //address
            $table->text('address');
            //employee id
            $table->string('employee_id')->unique();
            //employment status
            $table->string('employment_status');
            //join date
            $table->string('join_date');
            $table->string('end_date');
            //company id, int, bukan unsigned
            $table->integer('company_id');
            //division id, int, bukan unsigned
            $table->integer('division_id');
            //position id, int, bukan unsigned
            $table->integer('position_id');
            //job level id, int, bukan unsigned
            $table->integer('job_level_id');
            //user_approval_id, int, bukan unsigned
            $table->integer('user_approval_id')->nullable();
            //user_manager_id, int, bukan unsigned
            $table->integer('user_manager_id')->nullable();
            //shift id, int, bukan unsigned
            $table->integer('shift_id');
            //basic salary, big integer
            $table->bigInteger('basic_salary');
            //salary type
            $table->string('salary_type');
            //bank name
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
