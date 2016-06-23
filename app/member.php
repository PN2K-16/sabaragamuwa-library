<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    //
    protected $fillable = array('name', 'Last_Name', 'typee', 'nic', 'Ref_Num', 'Address_Line_1', 'Address_Line_2', 'Land_Number', 'Address_Line_3', 'Mobile_Number', 'email', 'status', 'remarks');
    
}
