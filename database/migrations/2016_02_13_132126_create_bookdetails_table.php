<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookdetails', function (Blueprint $table) {
            $table->increments('id');
			$table->float('cl_number');
            $table->double('cat_num');
			$table->string('author');
            $table->string('name');
            $table->string('edit_translate');
            $table->integer('pages');
        //    $table->string('img_location');
            $table->float('height');
            
            $table->string('series');
            $table->integer('series_num');
            
            $table->string('isbn');
            $table->string('remarks');
            
            
            $table->string('published_place');
            $table->string('publisher');
            $table->integer('published_year');
            $table->date('date_created');
            $table->date('date_updated');
            $table->string('last_edited_user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bookdetails');
    }
}
