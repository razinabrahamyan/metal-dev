<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->integer('post_id')
                  ->index('post_id_index')
                  ->unsigned()
                  ->nullable();
            $table->string('phone');
            $table->string('full_name');
            $table->string('email')
                  ->nullable();
            $table->text('comment')
                  ->nullable();
            $table->integer('type_id');
            $table->string('status')
                  ->nullable();

            $table->integer('user_id')
                  ->nullable();
            $table->string('title')
                  ->nullable();
            $table->json('address')
                  ->nullable();
            $table->float('size')
                  ->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('leads');
    }
}
