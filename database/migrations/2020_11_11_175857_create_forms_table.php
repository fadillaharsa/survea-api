<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->text('description');
            $table->string('category');
            $table->text('link');
            $table->integer('target_max_age')->nullable();
            $table->integer('target_min_age')->nullable();
            $table->text('target_persona')->nullable();
            $table->integer('points')->default(0);
            $table->string('status')->default('open');
            $table->text('responses_link')->nullable();
            $table->string('market_status')->nullable();
            $table->integer('price')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forms');
    }
}
