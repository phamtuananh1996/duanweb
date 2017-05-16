<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('categories_id');
            $table->string('question_title')->nullable();
            $table->text('question_content');
            $table->boolean('is_resolved')->default(false);
            $table->integer('vote_count')->default(0);
            $table->boolean('as_anonymously')->default(false);
            $table->integer('view_count')->default(0);
            $table->integer('answer_count')->default(0);
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
        Schema::dropIfExists('questions');
    }
}
