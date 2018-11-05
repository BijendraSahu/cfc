<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistrationDetails extends Model
{
    protected $table = 'reg_details';
    public $timestamps = false;
    protected  $primaryKey ='RDID';
}
