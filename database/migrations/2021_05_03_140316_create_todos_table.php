<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->integer('assigned_id')->unsigned(); //Many to Many
            $table->integer('creator_id')->unsigned();
            $table->integer('tag_id')->unsigned(); //Many to Many
            $table->date('due_date');
            $table->text('description');
            $table->enum('status',['in_progress','completed', 'deleted'])->default('in_progress');
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
        Schema::dropIfExists('todos');
    }
}
