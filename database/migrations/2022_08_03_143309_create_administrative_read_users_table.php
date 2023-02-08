<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministrativeReadUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('administrative_read_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('notification_id')->references('id')->on('administrative_notifications')->onUpdate('cascade')->onDelete('cascade');
            $table->string('emp_id');
            $table->foreign('emp_id')->references('emp_id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('active');
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
        Schema::dropIfExists('administrative_read_users');
    }
}
