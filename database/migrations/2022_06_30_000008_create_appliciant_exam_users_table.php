<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppliciantExamUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appliciant_exam_users', function (Blueprint $table) {
            $table->id('mark_id');
            $table->foreignId('season_id')->references('id')->on('recruitment_seasons')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('appliciant_id')->references('appliciant_id')->on('appliciants')->onUpdate('cascade')->onDelete('cascade');
            //$table->foreignId('test_id')->references('test_id')->on('appliciant_exams')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('exam_id')->references('exam_id')->on('appliciant_exams')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('marks');
            $table->string('status');
            $table->string('edit_status')->default(0);
            $table->string('created_by')->nullable();
            $table->string('updated_by')->default(0);
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
        Schema::dropIfExists('appliciant_exam_users');
    }
}
