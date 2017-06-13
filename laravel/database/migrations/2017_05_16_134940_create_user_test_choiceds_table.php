<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTestChoicedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_test_choiceds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_test_id')->unsigned();
            $table->foreign('user_test_id')->references('id')->on('user_tests')->onDelete('cascade');
            $table->integer('multi_choice_test_id');
            $table->integer('user_test_choiced')->default(0);
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
        Schema::dropIfExists('user_test_choiceds');
    }
}
