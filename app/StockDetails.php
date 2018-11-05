<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockDetails extends Model
{
    public $table = 'stock_details';
    public $timestamps = false;

    public
    function item_master()
    {
        return $this->belongsTo('App\ItemMaster', 'item_id');
    }
}
