<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruitmentVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruitment_vacancies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('season_id')->references('id')->on('recruitment_seasons')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('designation_id')->references('designation_id')->on('designations')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('vacancies')->nullable();
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
        Schema::dropIfExists('recruitment_vacancies');
    }
}
