<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('request_lists', function (Blueprint $table) {
            $table->increments('request_id');
            $table->string('req_type');
            $table->string('description');
            $table->string('priority');
            $table->string('status');
            $table->string('emp_id');
            $table->foreign('emp_id')->references('emp_id')->on('employees');
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
        Schema::dropIfExists('request_lists');
    }
}
