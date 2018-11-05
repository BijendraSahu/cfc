<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order_descriptions';
    public $timestamps = false;

    public function scopeGetActiveOrder($query)
    {
       return $query->where(['Isdeleted' => 0, 'IsBill' => 0])->get();
    }

    public function scopeGetActiveSale($query)
    {
        return $query->where(['Isdeleted' => 0, 'IsBill' => 1])->get();
    }

    public
    function menudetail()
    {
        return $this->belongsTo('App\MenuItemModel', 'mid');
    }
}
