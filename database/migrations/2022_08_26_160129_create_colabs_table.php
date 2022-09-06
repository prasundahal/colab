<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colabs', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('first_question');
            $table->string('second_question');
            $table->string('image1');
            $table->string('number');
            $table->string('state');
            $table->string('email')->nullable();
            $table->string('image2');
            $table->string('third_question');
            $table->string('fourth_question');
            $table->string('fifth_question');
            $table->string('note')->nullable();
            $table->string('r_id')->nullable();
            $table->string('ip')->nullable();
            $table->string('trackrecord')->nullable();
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
        Schema::dropIfExists('colabs');
    }
}
