<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hospital');
            $table->string('bht_no');
            $table->dateTime('notification_at')->nullable();
            $table->string('case_no');
            $table->string('name');
            $table->integer('age_years')->nullable();
            $table->integer('age_months')->nullable();
            $table->dateTime('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('ethnicity')->nullable();
            $table->string('occupation')->nullable();
            $table->string('address')->nullable();
            $table->string('DPDHS_area')->nullable();
            $table->string('MOH_area')->nullable();
            $table->string('GN_area')->nullable();
            $table->dateTime('report_form_filled_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
