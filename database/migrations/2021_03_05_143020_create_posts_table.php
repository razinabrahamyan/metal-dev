<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')
                  ->unsigned();
            $table->string('title');
            $table->text('description');
            $table->json('address')
                  ->nullable();
            $table->json('work_hours')
                  ->nullable();
            $table->string('phone')
                  ->nullable();
            $table->string('link')
                  ->nullable();
            $table->string('email')
                  ->nullable();
            $table->integer('market_id')
                  ->nullable()
                  ->unsigned();
            $table->integer('city_id')
                  ->unsigned()
                  ->index('post_city_id_index');
            $table->enum('status', ['1', '0'])->default('1');
            $table->timestamps();
            $table->timestamp('moderated_at')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
