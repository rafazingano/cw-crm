<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('leads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('site_id')->unsigned();
            $table->string('code')->unique();
            $table->json('content');
            $table->foreign('site_id')
                    ->references('id')->on('sites')
                    ->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
        
        Schema::create('lead_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lead_id')->unsigned();
            $table->integer('user_id')->unsigned();            
            $table->foreign('lead_id')
                    ->references('id')->on('leads')
                    ->onDelete('cascade');
            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('lead_user');
        Schema::dropIfExists('leads');
    }

}
