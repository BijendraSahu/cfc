<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bill';
    public $timestamps = false;

    public function scopeGetActiveBill($query)
    {
        return $query->where(['Isdeleted' => 0, 'InsertedDate' => Carbon::parse(Carbon::now())->format('Y-m-d')])->orderBy('bill_date', 'desc')->get();
    }

    public
    function user()
    {
        return $this->belongsTo('App\UserMaster', 'InsertedBy');
    }
}
