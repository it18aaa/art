<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artworks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');            
            $table->integer('price');
            $table->boolean('sold');
            $table->boolean('pricepublic');        
            
            $table->unsignedInteger('artist_id');
            $table->string('description')->nullable()->default('');
            $table->integer('width')->default(0);
            $table->integer('height')->default(0);
            $table->integer('depth')->default(0);
            $table->timestamps();

            $table->foreign('artist_id')->references('id')->on('artists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artworks');
    }
}
