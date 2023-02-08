<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestPromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_promotions', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id');
            $table->foreign('emp_id')->references('emp_id')->on('employees');
            $table->String('name');
            $table->Integer('mobile');
            $table->String('post_confirm');
            $table->String('current_position');
            $table->String('current_position_grade');
            $table->date('date_of_join_present_post');
            $table->String('expect_post');
            $table->String('done_study_or_abroad');
            $table->date('leave_start_date');
            $table->date('leave_end_date');
            $table->String('grade_of_expect_post');
            $table->String('other');
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
        Schema::dropIfExists('request_promotions');
    }
}
