<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->string('title');
            $table->enum('status', ['y', 'n'])->default('y');
            $table->foreign('customer_id')
                    ->references('id')->on('customers')
                    ->onDelete('cascade');            
            $table->timestamps();
            $table->softDeletes();
        });
        
        Schema::create('site_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('site_id')->unsigned();  
            $table->integer('user_id')->unsigned();
            $table->foreign('site_id')
                    ->references('id')->on('sites')
                    ->onDelete('cascade');          
            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_site');
        Schema::dropIfExists('site_user');
        Schema::dropIfExists('sites');
    }
}
