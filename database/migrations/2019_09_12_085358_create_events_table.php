<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->mediumText('summary')->nullable();
            $table->longText('description');
            $table->string('venue');
            $table->string('city');   
            $table->string('country');
            $table->string('event_by')->nullable();
            $table->dateTime('event_date');
            $table->dateTime('event_end_date');
            $table->string('event_type');
            $table->tinyInteger('status'); 
            $table->integer('created_by');
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
        Schema::dropIfExists('events');
    }
}
