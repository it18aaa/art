<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('basket_id');
            $table->integer('customer_id');
            $table->decimal('sale_price', 8, 2);            
            $table->timestamp('sale_date');            
            $table->timestamps();
            
        });        
    }

    
    public function down()
    {        
        Schema::dropIfExists('sales');
    }
}
