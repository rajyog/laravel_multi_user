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
            $table->string('name');
            $table->integer('role_id');
            $table->string('email');
            $table->tinyInteger('gender')->comment('0-male,1-female');
            $table->integer('city');
            $table->integer('state');
            $table->integer('country');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('filepath');
            $table->tinyInteger('status')->comment('0-delete,1-exist')->default(1);
            $table->tinyInteger('active_status')->comment('0-active,1-decative')->default(1);
            $table->integer('addedby');
            $table->string('google_id')->nullable();
             $table->string('facebook_id')->nullable();
            $table->string('login_type')->nullable();
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
