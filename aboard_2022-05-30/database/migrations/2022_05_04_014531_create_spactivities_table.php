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
        Schema::create('spactivities', function (Blueprint $table) {
            $table->id();
            /*
            'name',
        'subprogram_id',
        'status',
        'pyearactivity',
        'code',
        'category',
        'location',
        'ecowas_budget',
        'dornor_budget',
        'startdate',
        'endate',
        'responsible_officer',
        'l_comments',
             */

            $table->string('name');
            $table->bigInteger('subprogram_id');
            $table->string('status');
            $table->string('pyearactivity');
            $table->string('code');
            $table->string('category');
            $table->string('location');
            $table->decimal('ecowas_budget');
            $table->decimal('donor_budget');
            $table->date('startdate');
            $table->date('endate');
            $table->longText('responsible_officer');
            $table->bigInteger('output_id')->nullable();
            $table->longText('l_comments');

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
        Schema::dropIfExists('spactivities');
    }
};
