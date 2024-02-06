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
        Schema::create('outcomes', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->bigInteger('program_id');

            $table->string('status');
            $table->longText('objective');
            $table->string('description');
            $table->longText('indicators');

            $table->timestamps();
        });
    }


    /* 'name',
        'program_id',

        'status',
        'objective',
        'description',
        'indicators',
 */

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outcomes');
    }
};
