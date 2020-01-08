<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryPostsTable extends Migration
{
    
    public function up()
    {
        Schema::create('category_posts', function (Blueprint $table) {
            $table->integer('post_id');
            $table->integer('category_id');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('category_posts');
    }
}
