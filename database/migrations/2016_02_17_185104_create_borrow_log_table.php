<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrow_log', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('book_id'); //foreign key is id from books. Not book_names
            $table->integer('client_id');
            $table->date('borrowed_date');
            $table->integer('duration'); //calculated using days as an integer.
            $table->date('due_date');
            $table->integer('user_issued'); //id of the user who issued it to the client from the library
            $table->string('issue_comments')->nullable();
                
                
            $table->date('returned_date')->nullable();
            $table->integer('user_accepted')->nullable(); //id of the user who accepted the return from the client
            $table->string('return_comments')->nullable();
            $table->string('returned_status')->default("No");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('borrow_log');
    }
}
