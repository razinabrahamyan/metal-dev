<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsPrioritiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_priorities', function (Blueprint $table) {
            $table->id();
            $table->integer("post_id")->unique()->unsigned();
            $table->integer("user_id")->unsigned();
            $table->integer("post_rate_id")->nullable()->unsigned();
            $table->integer("post_sort")->default(0)->unsigned();
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
        Schema::dropIfExists('posts_priorities');
    }
}
