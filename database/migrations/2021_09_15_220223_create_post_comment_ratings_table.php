<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostCommentRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_comment_ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('comment_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->integer('upvote')->nullable();
            $table->integer('downvote')->nullable();
            $table->timestamps();
            $table->boolean('archived')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_comment_ratings');
    }
}
