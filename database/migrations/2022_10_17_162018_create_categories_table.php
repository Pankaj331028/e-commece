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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_category');
            $table->string('category_name',100);
            $table->integer('status');
            $table->integer('include_in_menu');
            $table->string('thumbnail_image',200);
            $table->string('description',200);
            $table->string('url_key',150);
            $table->string('meta_title',150);
            $table->string('meta_keyword',150);
            $table->string('meta_desc',150);
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
        Schema::dropIfExists('categories');
    }
};
