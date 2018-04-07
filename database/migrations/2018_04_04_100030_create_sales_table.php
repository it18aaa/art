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
            $table->integer('customer_id')->nullable()->default(null);
            $table->decimal('sale_price', 8, 2)->nullable()->default(0.0);            
            $table->timestamp('sale_date');    
            $table->boolean('fulfilled')->default(false);
            $table->boolean('paid')->default(false);
            $table->text('notes')->nullable()->default(null);
            $table->timestamps();            
        });        
    }

    
    public function down()
    {        
        Schema::dropIfExists('sales');
    }
}
