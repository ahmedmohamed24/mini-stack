<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_question', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tag_id');
            $table->foreign('tag_id')->references('id')->on('tags');
            $table->foreignId('question_id');
            $table->foreign('question_id')->references('id')->on('questions');
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
        Schema::dropIfExists('tag_question');
    }
}
