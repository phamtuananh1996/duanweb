<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableVoteAnswerCommentTest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote_answer_comment_tests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('test_comment_replies_id')->unsigned();
            $table->foreign('test_comment_replies_id')->references('id')->on('test_comment_replies')->onDelete('cascade');
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
        Schema::dropIfExists('vote_answer_comment_tests');
    }
}
