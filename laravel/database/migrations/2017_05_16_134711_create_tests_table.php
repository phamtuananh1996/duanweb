<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('title');
            $table->integer('number_of_questions');
            $table->integer('total_time')->default(0);
            $table->integer('category_id');
            $table->integer('test_type');
            $table->string('level')->nulable();
            $table->integer('user_test_count')->default(0);
            $table->integer('test_vote')->default(0);
            $table->integer('state')->default(0);//this is attribute to check question creating state 
            //if = 0 is not ready, = 1 is ready and you could be attend this test.
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
        Schema::dropIfExists('tests');
    }
}
