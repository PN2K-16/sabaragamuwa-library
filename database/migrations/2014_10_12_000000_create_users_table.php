<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 128);
            $table->string('type');
            $table->string('banned_status')->default("No");
            $table->rememberToken();
            $table->timestamps();
        });
        
          DB::table('users')->insert([
            ['name' => 'admin', 'email' => 'admin@admin.com', 'password' => Hash::make('admin'), 'type' => 'admin'],
       
        
        ]);
        
        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
             