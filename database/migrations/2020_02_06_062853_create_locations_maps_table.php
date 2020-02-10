<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsMapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations_maps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string("privince_name")->nullable();
            $table->string("district_name")->nullable();
            $table->string("dsd_name")->nullable();
            $table->string("gnd_no")->nullable();
            $table->string("gnd_name")->nullable();
            $table->string("mc_uc_ps_name")->nullable();
            $table->string("moh_name")->nullable();
            $table->string("rdhs_name")->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations_maps');
    }
}
