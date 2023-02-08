<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->string('emp_id')->primary();
            $table->foreignId('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('appliciant_id')->references('appliciant_id')->on('appliciants')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('faculty_id')->references('faculty_id')->on('faculties')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('department_id')->references('department_id')->on('departments')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('designation_id')->references('designation_id')->on('designations')->onUpdate('cascade')->onDelete('cascade');
            $table->string('fname');
            $table->string('mname');
            $table->string('lname');
            $table->string('gender');
            $table->string('place');
            $table->string('emp_pic');
            $table->string('civil_status');
            $table->string('current_postal_address');
            $table->string('permanent_postal_address');
            $table->string('current_mobile');
            $table->string('permanent_mobile');
            $table->string('police_division');
            $table->string('email');
            $table->date('dob');
            $table->string('age_as_at_closing_date');
            $table->string('citizenship');
            $table->string('nic');
            $table->string('driving_licen_no');
            $table->string('driving_licen_issuing_date');
            $table->string('salary');
            $table->string('status');//active,suspend or retire
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
