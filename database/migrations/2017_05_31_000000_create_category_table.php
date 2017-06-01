<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('parent_category_id')->unsigned()->nullable();
            $table->foreign('parent_category_id')->references('id')->on('categories');
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
