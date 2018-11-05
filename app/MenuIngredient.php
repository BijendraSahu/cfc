<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuIngredient extends Model
{
    //
    protected $table = 'menus_ingrediant';
    public $timestamps = false;
    protected  $primaryKey ='MIID';

    public function scopeGetActiveIngredientInMenu($query)
    {
        return $query->where('Isdeleted','==',0)->get();
    }

    public function menuName()
    {
        return $this->belongsTo('App\MenuItemModel','MID');
    }

    public function itemUnit()
    {
        return $this->belongsTo('App\unit','UnitId');
    }

    public function itemName()
    {
        return $this->belongsTo('App\Item_MasterModel','ItemID');
    }

//    public function scopegetUnitNameDropdown()
    public function scopeGetUnitNameDropdown()
    {
        $unt=unit::where('Isdeleted',0)->get(['UnitID','UnitName']);
        $arr[0]="Select";
        foreach ($unt as $unt){
            $arr[$unt->UnitID]=$unt->UnitName;
        }
        return $arr;
    }

    public function scopeGetItemNameDropdown()
    {
        $itm=Item_MasterModel::where('Isdeleted',0)->get(['ItemID','ItemName']);
        $arr[0]="Select";
        foreach ($itm as $itm) {
            $arr[$itm->ItemID]=$itm->ItemName;
        }
        return $arr;
    }

    public function scopeGetMenuNameDropdown()
    {
        $mnu=MenuItemModel::where('Isdeleted',0)->get(['MID','M_Name']);
        $arr[0]="Select";
        foreach($mnu as $mnu){
            $arr[$mnu->MID]=$mnu->M_Name;
        }
        return $arr;
    }
}
