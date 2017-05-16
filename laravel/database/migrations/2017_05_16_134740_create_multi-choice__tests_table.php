<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMultiChoiceTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multi-choice_tests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('test_id');
            $table->string('title');
            $table->float('max_point')->nullable();
            $table->float('question_time');
            $table->text('explan')->nullable();
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
        Schema::dropIfExists('multi-choice__tests');
    }
}
