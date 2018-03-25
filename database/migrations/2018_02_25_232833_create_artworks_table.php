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
            $table->string('description')->default('');
            $table->integer('w')->default(0);
            $table->integer('h')->default(0);
            $table->integer('d')->default(0);
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
        Schema::dropIfExists('artworks');
    }
}
