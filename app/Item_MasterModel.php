<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//session_start();

class Item_MasterModel extends Model
{
    //
    protected $table = 'item_master';
    public $timestamps = false;
    protected $primaryKey = 'ItemID';

    public function scopeGetActiveItemMaster($query)
    {
        return $query->where('Isdeleted', '==', 0)->get();
    }

    public static function checkItemName($name)
    {
        $cate = Item_MasterModel::where(['Isdeleted' => 0, 'ItemName' => $name])->first();
        if (is_null($cate)) return true;
        else return false;
    }

    public
    function scopegetCategoryDropdown()
    {
        $Icat = ItemCategory::where('Isdeleted', '0')->get(['ICatID', 'Cat_Name']);
        $arr[0] = "SELECT";
        foreach ($Icat as $Icat) {
            $arr[$Icat->ICatID] = $Icat->Cat_Name;
        }
        return $arr;
    }

    public
    function scopegetUnitDropdown()
    {
        $unt = unit::where('Isdeleted', '0')->get(['UnitID', 'UnitName']);
        $arr[0] = "SELECT";
        foreach ($unt as $unt) {
            $arr[$unt->UnitID] = $unt->UnitName;
        }
        return $arr;
    }

    public
    function menuUnit()
    {
        return $this->belongsTo('App\unit', 'UnitID');
    }

    public
    function menuItemCategory()
    {
        return $this->belongsTo('App\ItemCategory', 'IcatID');
    }
}
