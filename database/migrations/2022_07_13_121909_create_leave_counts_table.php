<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveCountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('leave_counts', function (Blueprint $table) {
            $table->string('emp_id')->primary();
            $table->foreign('emp_id')->references('emp_id')->on('employees');
            $table->integer('short_leave');
            $table->float('casual_leave');
            $table->integer('medical_leave');
            $table->integer('subbatical_leave');
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
        Schema::dropIfExists('leave_counts');
    }
}
