<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_galleries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('album_id')->unsigned();
            $table->string('title');
            $table->text('description');
            $table->string('href')->nullable();
            $table->string('image');
            $table->string('type')->nullable();
            $table->string('thumbnail')->nullable();
            // $table->string('youtube');
            // $table->string('vimeo');
            // $table->string('poster');
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
        Schema::dropIfExists('photo_galleries');
    }
}
