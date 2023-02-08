<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruitmentSeasonTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruitment_season_tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('season_id')->references('id')->on('recruitment_seasons')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('test_id')->references('test_id')->on('appliciant_tests')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('mark_limit');
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
        Schema::dropIfExists('recruitment_season_tests');
    }
}
