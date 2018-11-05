<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetails extends Model
{
    protected $table = 'bill_details';
    public $timestamps = false;

    public
    function menudetail()
    {
        return $this->belongsTo('App\MenuItemModel', 'MID');
    }
}
