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
            $table->string('name');
            $table->string('category');
            $table->string('contact_mail');
            $table->string('contact_instagram');
            $table->string('contact_facebook');
            $table->string('description');
            $table->timestamps();
        });
        
        Schema::create('achievements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('artist_id')->unsigned();
            $table->string('name');
            $table->string('content');
            $table->timestamps();
            
            $table->foreign('artist_id')->references('id')->on('artists');
        });
        
        Schema::create('portfolio', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('artist_id')->unsigned();
            $table->string('name');
            $table->integer('content_type');
            $table->string('content');
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
        Schema::dropIfExists('portfolio');
        Schema::dropIfExists('achievements');
        Schema::dropIfExists('artists');
    }
}
