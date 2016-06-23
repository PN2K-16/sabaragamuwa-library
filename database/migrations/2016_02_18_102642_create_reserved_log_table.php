<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservedLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserved_log', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('book_id'); //foreign key is id from books. Not book_names
            $table->integer('client_id');
            $table->date('reserved_date');
            $table->integer('duration'); //calcu
            $table->date('due_date');
            $table->integer('user_issued'); //id of the user who issued 
            $table->string('lend_status')->default("No"); //id of the user who issued 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reserved_log');
    }
}
