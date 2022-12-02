<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blocks', function (Blueprint $table) {
            $table->id();
            $table->integer('status');
            $table->string('title');
            $table->string('use_for')->default('home','category','product');
            $table->string('identifier')->unique();
            $table->text('description');
            $table->integer('ordering')->default('0');
            $table->string('meta_title');
            $table->string('meta_tag');
            $table->text('meta_description');


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
        Schema::dropIfExists('blocks');
    }
};
