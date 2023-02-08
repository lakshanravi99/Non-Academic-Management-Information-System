<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaveCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rave_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rave_id')->references('rave_id')->on('rave_users');
            $table->string('content');
            $table->string('from_id');
            $table->foreign('from_id')->references('emp_id')->on('employees');
            $table->string('to_id');
            $table->foreign('to_id')->references('emp_id')->on('employees');
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
        Schema::dropIfExists('rave_comments');
    }
}
