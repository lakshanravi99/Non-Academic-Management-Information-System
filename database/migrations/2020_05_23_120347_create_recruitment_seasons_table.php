<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruitmentSeasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruitment_seasons', function (Blueprint $table) {
            $table->id();
            $table->string('season');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('currently_active')->default(0);
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
        Schema::dropIfExists('recruitment_seasons');
    }
}
