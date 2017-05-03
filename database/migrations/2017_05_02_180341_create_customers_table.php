<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();  
            $table->string('title');
            $table->json('options')->nullable();
            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
            $table->timestamps();
        });
        
        Schema::create('customer_site', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->integer('site_id')->unsigned();            
            $table->foreign('customer_id')
                    ->references('id')->on('customers')
                    ->onDelete('cascade');
            $table->foreign('site_id')
                    ->references('id')->on('sites')
                    ->onDelete('cascade');
        });
        
        Schema::create('customer_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->integer('user_id')->unsigned();            
            $table->foreign('customer_id')
                    ->references('id')->on('customers')
                    ->onDelete('cascade');
            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
        });
    }
    
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_user');
        Schema::dropIfExists('customer_site');
        Schema::dropIfExists('customers');
    }
}
