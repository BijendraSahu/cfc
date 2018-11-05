<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CashRegistration extends Model
{
    protected $table = 'cashregister';
    public $timestamps = false;
    protected  $primaryKey ='CSID';
}
