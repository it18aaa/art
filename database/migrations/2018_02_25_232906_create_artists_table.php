<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');            
            $table->string('lastname');
            $table->string('address1')->nullable(true);
            $table->string('address2')->nullable(true);
            $table->string('town')->nullable(true);;
            $table->string('county')->nullable(true);;
            $table->string('postcode')->nullable(true);;
            $table->string('telephone')->nullable(true);;
            $table->string('email')->nullable(true);
            $table->text('bio')->nullable(true);;
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
        Schema::dropIfExists('artists');
    }
}
