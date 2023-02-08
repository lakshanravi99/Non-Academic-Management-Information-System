<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppliciantTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appliciant_tests', function (Blueprint $table) {
            $table->id('test_id');
            $table->foreignId('designation_id')->references('designation_id')->on('designations')->onUpdate('cascade')->onDelete('cascade');
            $table->string('test_name');
            $table->string('test_part');
            $table->string('test_type');
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
        Schema::dropIfExists('appliciant_tests');
    }
}
