<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMultiChoiceTestChoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multi-choice_test_choices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('multi-choice_test_id');
            $table->string('title');
            $table->boolean('is_answer');
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
        Schema::dropIfExists('multi-choice__test__choices');
    }
}
