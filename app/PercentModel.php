<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PercentModel extends Model
{
    protected $table = 'percent';
    public $timestamps = false;

    public function scopeGetActivePercent($query)
    {
        return $query->where('is_active', '=', 1)->get();
    }

    public
    function scopegetPercentDropdown()
    {
        $Mcats = PercentModel::where('is_active', '1')->get();
        $arr[0] = "SELECT";
        foreach ($Mcats as $Mcat) {
            $arr[$Mcat->id] = $Mcat->type." ".$Mcat->percent."%";
        }
        return $arr;
    }
}
