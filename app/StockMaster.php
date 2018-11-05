<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockMaster extends Model
{
    public $table = 'stock';
    public $timestamps = false;

    public
    function supplier()
    {
        return $this->belongsTo('App\SupplierModel', 'supplier_id');
    }

    public function scopeGetActiveStock($query)
    {
        return $query->where('is_active', '=', 1)->get();
    }
}
