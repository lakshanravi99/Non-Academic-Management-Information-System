<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_transfers', function (Blueprint $table) {
            $table->id();
            $table->String('fname');
            $table->string('emp_id');
            $table->foreign('emp_id')->references('emp_id')->on('employees');
            $table->date('dob');
            $table->String('permenant_address');
            $table->String('tempory_address');
            $table->Integer('mobile');
            $table->String('martial_status');
            $table->String('present_position');
            $table->date('Present_position_date_of_appointment');
            $table->date('Date_confirmed_in_present_post');
            $table->String('name_of_current_working_institute');
            $table->String('current_faculty');
            $table->Integer('Length_of_service_years');
            $table->Integer('Length_of_service_months');
            $table->Integer('Length_of_service_days');
            $table->String('transfered_reason');
            $table->String('partner_position');
            $table->String('partners_place');
            $table->String('reason_for_transfer');
            $table->String('status')->nullable();
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
        Schema::dropIfExists('request_transfers');
    }
}
