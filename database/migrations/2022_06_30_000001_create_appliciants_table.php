<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppliciantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appliciants', function (Blueprint $table) {
            $table->id('appliciant_id');
            $table->foreignId('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('designation_id')->references('designation_id')->on('designations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('season_id')->references('id')->on('recruitment_seasons')->onUpdate('cascade')->onDelete('cascade');
            $table->string('initial');
            $table->string('fname');
            $table->string('mname');
            $table->string('lname');
            $table->string('initial_name');
            $table->string('gender');
            $table->string('current_address_line1');
            $table->string('current_address_line2');
            $table->string('current_address_line3');
            $table->string('permenent_address_line1');
            $table->string('permenent_address_line2');
            $table->string('permenent_address_line3');
            $table->integer('permenant_mobile');
            $table->integer('current_mobile');
            $table->string('email');
            $table->foreign('email')->references('email')->on('users');
            $table->string('nic');
            $table->string('police_division');
            $table->DATE('dob');
            $table->string('civil_status');
            $table->string('age_as_at_closing_date');
            $table->string('driving_licen_no');
            $table->DATE('driving_licen_issuing_date');
            $table->string('citizenship');
            $table->string('citizenship_reg_no');
            $table->string('hight');
            $table->string('chest');
            $table->longText('sport_qualification');
            $table->string('quilty_status');
            $table->longText('quilty_description');
            $table->string('status_update_by');
            $table->string('selected_for_job');
            $table->string('selection_by');
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
        Schema::dropIfExists('appliciants');
    }
}
