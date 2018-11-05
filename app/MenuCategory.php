<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuCategory extends Model
{
    //
    protected $table = 'menucategory';
    public $timestamps = false;
    protected  $primaryKey ='McatID';

    public function scopeGetActiveUserMaster($query)
    {
        return $query->where('Isdeleted', '==', 0)->get();
    }

    public static function checkmenu($tblno)
    {
        $tbl = MenuCategory::where(['Isdeleted' => 0, 'CategoryName' => $tblno])->first();
        if (is_null($tbl)) return true;
        else return false;
    }

    public
    function scopegetMenuDropdown()
    {
        $Mcat = MenuCategory::where('Isdeleted', '0')->get(['McatID', 'CategoryName']);
        $arr[0] = "SELECT";
        foreach ($Mcat as $Mcat) {
            $arr[$Mcat->McatID] = $Mcat->CategoryName;
        }
        return $arr;
    }
}
