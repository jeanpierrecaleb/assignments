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
        Schema::create('subprograms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('program_id');
            $table->string('status');
            $table->string('active');
            $table->date('startdate');
            $table->date('endate');
            $table->longText('objective');
            $table->longText('description');
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
        Schema::dropIfExists('subprograms');
    }
};
