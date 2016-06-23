<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('Last_Name');
            $table->string('Mobile_Number')->unique();
            $table->string('Land_Number');
            $table->string('address');
            $table->string('Address_Line_1');
            $table->string('Address_Line_2');
            $table->string('Address_Line_3');
            $table->string('town');
            $table->string('email')->nullable();
            $table->string('typee'); // whether it's a library or a student readers group member or a normal client
            
            
            $table->string('nic')->nullable(); // nullable because students dont have an nic, //also check whether this nic exisits in the system if entered
            $table->string('Ref_Num')->nullable(); //only created when library accepts registration fees or accepts the registration.
            
            /**
             * these are the references client will use to login to the system.
             * Upon registering using the system a username and a password has to be set.
             * If they registered manually by going to the library, they will have to enter the reference number,              * they were given, if it matches in the reference field of a given user and if the status is false                * the user will be sent a text msg with a random system generated 6 digit  code and his account will              * be activated after entering the valid code.  the 6 digit code should timeout after 30 mins. 
             */
            
            
            
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('status')->default('false');
            
            $table->date('date_registered');
            $table->date('exp_date')->nullable();
            $table->date('last_renewed_date')->nullable();
            $table->string('remarks')->nullable();
            
            $table->string('ban_status')->default('false'); //if banned user cannot reserve books using the system.
            
              
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('members');
    }
}
