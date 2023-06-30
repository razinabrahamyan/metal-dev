<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->json('full_name');
            $table->string('phone')->unique()->nullable();
            $table->string('avatar')->nullable();
            $table->date('dob')->nullable();
            $table->integer('role_id')->nullable();
            $table->string('email')->unique();
            $table->string('website')->nullable();
            $table->integer('city_id')->unsigned();
            $table->integer('pack_id')->default(1)->unsigned();
            $table->enum('status',['1','0'])->default('1');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
