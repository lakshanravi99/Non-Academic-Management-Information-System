<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignationChangeHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('designation_change_histories', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id');
            $table->foreign('emp_id')->references('emp_id')->on('employees');
            $table->foreignId('from_designation')->references('designation_id')->on('designations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('to_designation')->references('designation_id')->on('designations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('from_faculty')->references('faculty_id')->on('faculties')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('to_faculty')->references('faculty_id')->on('faculties')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('from_department')->references('department_id')->on('departments')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('to_department')->references('department_id')->on('departments')->onUpdate('cascade')->onDelete('cascade');
            $table->string('designation_description');
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
        Schema::dropIfExists('designation_change_histories');
    }
}
