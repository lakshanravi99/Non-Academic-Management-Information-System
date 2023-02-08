<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministrativeNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('administrative_notifications', function (Blueprint $table) {
            $table->id();
            $table->string('sender_id');
            $table->foreign('sender_id')->references('emp_id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->string('single_user_id')->nullable();
            $table->string('designation_name')->nullable();
            $table->string('faculty_name')->nullable();
            $table->string('department_name')->nullable();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('administrative_notifications');
    }
}
