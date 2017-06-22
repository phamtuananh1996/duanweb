<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\User::class, 10)->create();
        factory(App\Categories::class, 10)->create();
    	factory(App\Question::class, 50)->create();
        // factory(App\Answer::class, 100)->create();
        // factory(App\AnswerComment::class, 200)->create();
    }
}
