<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->boolean('enable')->default(false);
            $table->text('content')->default('');
            $table->integer('view_count')->unsigned()->default(0);

            $table->integer('author_id')->unsigned();
            $table->foreign('author_id')->references('id')->on('admins');

            $table->integer('updater_id')->unsigned();
            $table->foreign('updater_id')->references('id')->on('admins');

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
        Schema::dropIfExists('blog');
    }
}