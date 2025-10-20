<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone_1')->nullable();
            $table->string('phone_2')->nullable();
            $table->string('address')->nullable();
            $table->integer('age')->nullable();
            $table->date('dob')->nullable();

            $table->enum('gender', ['male', 'female'])->nullable();
            $table->enum('marital_status', ['single', 'married'])->nullable();
            // In the migration file for the `users` table
   
            $table->string('profile_picture')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}