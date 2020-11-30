<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogpostsTable extends Migration
{
    public function up()
    {
        Schema::create('blogposts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('text');
            $table->timestamps();    
        });
    }
    public function down()
    {
        Schema::dropIfExists('blogposts');
    }
}
