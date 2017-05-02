<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });
        
        Schema::create('client_site', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned();
            $table->integer('site_id')->unsigned();            
            $table->foreign('client_id')
                    ->references('id')->on('clients')
                    ->onDelete('cascade');
            $table->foreign('site_id')
                    ->references('id')->on('sites')
                    ->onDelete('cascade');
        });
        
        Schema::create('client_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned();
            $table->integer('user_id')->unsigned();            
            $table->foreign('client_id')
                    ->references('id')->on('clients')
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
        Schema::dropIfExists('client_user');
        Schema::dropIfExists('client_site');
        Schema::dropIfExists('clients');
    }
}
