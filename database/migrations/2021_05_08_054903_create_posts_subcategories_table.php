<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_subcategories', function (Blueprint $table) {
            $table->id();
            $table->integer('post_id')->index('post_index')->unsigned();
            $table->integer('category_id')->index('category_index')->unsigned();
            $table->integer('subcategory_id')->index('subcategory_index')->unsigned();
            $table->integer('price')->unsigned();
            $table->softDeletes();
            $table->timestamps();

            $table->index(['category_id','subcategory_id'],'cat_subcat_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts_subcategories');
    }
}
