<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbl_OrderModel extends Model
{
    //
    protected $table = 'tbl_order';
    public $timestamps = false;
    protected $primaryKey = 'OID';

    public
    function user()
    {
        return $this->belongsTo('App\UserMaster', 'InsertBy');
    }


}
