<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestDetails extends Model
{
    protected $table = 'request_details';
    public $timestamps = false;

    public function itemName()
    {
        return $this->belongsTo('App\Item_MasterModel', 'item_id');
    }
}
