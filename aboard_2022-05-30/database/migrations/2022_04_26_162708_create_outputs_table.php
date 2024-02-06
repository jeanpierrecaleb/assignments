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
        Schema::create('outputs', function (Blueprint $table) {
            $table->id();

            /*  'name',
        'subprogram_id',
        'status',
        'quater',
        'description',
        'risks',
        'indicators',
        */

            $table->string('name');
            $table->bigInteger('subprogram_id');
            $table->string('status');
            $table->string('quater');
            $table->longText('description');
            $table->bigInteger('outcome_id')->nullable();
            $table->longText('risks');
            $table->longText('indicators');
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
        Schema::dropIfExists('outputs');
    }
};
