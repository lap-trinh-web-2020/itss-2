<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserfollowerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_follower', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('following_id ')->unsigned();
            $table->integer('follower_id ')->unsigned();
            $table->timestamp('accepted_at',0);
            
            $table->foreign('following_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('follower_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_follower');
    }
}
