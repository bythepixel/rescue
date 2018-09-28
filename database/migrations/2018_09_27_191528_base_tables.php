<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BaseTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('species', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('organizations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('password');
            $table->integer('organization_id')->unsigned()->nullable();
            $table->foreign('organization_id')->references('id')->on('organizations');
            $table->integer('roles_id')->unsigned()->nullable();
            $table->foreign('roles_id')->references('id')->on('roles');
            $table->timestamps();
        });
        Schema::create('species_has_organizations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('species_id')->unsigned()->nullable();
            $table->foreign('species_id')->references('id')->on('species');
            $table->integer('organization_id')->unsigned()->nullable();
            $table->foreign('organization_id')->references('id')->on('organizations');
            $table->timestamps();
        });
        Schema::create('statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('organization_id')->unsigned()->nullable();
            $table->foreign('organization_id')->references('id')->on('organizations');
            $table->timestamps();
        });
        Schema::create('pets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('breed');
            $table->text('description')->nullable();
            $table->string('age')->nullable();
            $table->date('birth')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('fee')->nullable();
            $table->integer('organization_id')->unsigned()->nullable();
            $table->foreign('organization_id')->references('id')->on('organizations');
            $table->integer('species_id')->unsigned()->nullable();
            $table->foreign('species_id')->references('id')->on('species');
            $table->integer('status_id')->unsigned()->nullable();
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path');
            $table->integer('pet_id')->unsigned()->nullable();
            $table->foreign('pet_id')->references('id')->on('pets');
            $table->timestamps();
        });
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path');
            $table->integer('pet_id')->unsigned()->nullable();
            $table->foreign('pet_id')->references('id')->on('pets');
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
        Schema::dropIfExists('images');
        Schema::dropIfExists('files');
        Schema::dropIfExists('pets');
        Schema::dropIfExists('users');
        Schema::dropIfExists('statuses');
        Schema::dropIfExists('species_has_organizations');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('organizations');
        Schema::dropIfExists('species');
    }
}
