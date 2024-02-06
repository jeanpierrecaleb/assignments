<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocindicators', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('outcome_id');
            $table->string('name');
            $table->date('baseline_date');
            $table->date('target_date');
            $table->string('sector');
            $table->string('measure_unit');

            $table->integer('baseline');
            $table->integer('target');

            $table->longText('baseline_description');
            $table->longText('target_description');







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
        Schema::dropIfExists('ocindicators');
    }
};
