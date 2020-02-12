<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete("cascade");
            $table->softDeletes();

            $table->string('mode_of_admission');               //Direct OPD, transferred
            $table->string('transferred_from')->nullable();
            $table->dateTime('date_of_admission');

            $table->dateTime("date_of_onset");
            $table->string('diagnosed_by');     //Clinical, test
            $table->string("etiology_by")->nullable();
            $table->dateTime('date_of_first_FBC')->nullable();
            $table->integer('first_FBC_count')->nullable();


//            $table->boolean("diagnosis_DF")->default(false);
//            $table->boolean("diagnosis_uncomplicated_DHF")->default(false);
//            $table->boolean("diagnosis_complicated_DHF")->default(false);
//            $table->boolean("diagnosis_DHF_complications")->default(false);
            $table->string('diagnosis');
            $table->string('dhf_complication')->nullable();
            $table->string('outcome');
            $table->dateTime('date_of_outcome');
            $table->string('if_transferred_hospital')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_reports');
    }
}
