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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone_number',255)->unique();
            $table->enum('email_verified',['0','1'])->default('0');
            $table->enum('phone_number_verified',['0','1'])->default('0');
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('phone_number_verified_at')->nullable();
            $table->string('password');
            $table->string('id_token')->unique();
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
