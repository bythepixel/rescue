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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('role');
            $table->integer('organizations_id')->unsigned()->nullable();
            $table->foreign('organizations_id')->references('id')->on('organizations');
            $table->timestamps();
        });
        Schema::create('species_has_organizations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('species_id')->unsigned()->nullable();
            $table->foreign('species_id')->references('id')->on('species');
            $table->integer('organizations_id')->unsigned()->nullable();
            $table->foreign('organizations_id')->references('id')->on('organizations');
            $table->timestamps();
        });
        Schema::create('statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('organizations_id')->unsigned()->nullable();
            $table->foreign('organizations_id')->references('id')->on('organizations');
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
            $table->integer('organizations_id')->unsigned()->nullable();
            $table->foreign('organizations_id')->references('id')->on('organizations');
            $table->integer('species_id')->unsigned()->nullable();
            $table->foreign('species_id')->references('id')->on('species');
            $table->integer('statuses_id')->unsigned()->nullable();
            $table->foreign('statuses_id')->references('id')->on('statuses');
            $table->integer('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->integer('last_edited_by')->unsigned()->nullable();
            $table->foreign('last_edited_by')->references('id')->on('users');
            $table->timestamps();
        });
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path');
            $table->integer('pets_id')->unsigned()->nullable();
            $table->foreign('pets_id')->references('id')->on('pets');
            $table->timestamps();
        });
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path');
            $table->integer('pets_id')->unsigned()->nullable();
            $table->foreign('pets_id')->references('id')->on('pets');
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
