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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->integer('status');
            $table->string('title');
            $table->string('menu_title');
            $table->integer('show_in_navigation')->default('0');
            $table->integer('show_in_footer')->default('0');
            $table->text('description');
            $table->string('url_key')->unique();
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
        Schema::dropIfExists('pages');
    }
};
