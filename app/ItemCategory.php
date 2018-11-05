<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    //
    protected $table = 'item_category';
    public $timestamps = false;
    protected  $primaryKey ='ICatId';

    public function scopeGetActiveUserMaster($query)
    {
        return $query->where('Isdeleted', '==', 0)->get();
    }
    public static function checkUnitName($unitname)
    {
        $cate = ItemCategory::where(['Isdeleted' => 0, 'Cat_Name' => $unitname])->first();
        if (is_null($cate)) return true;
        else return false;
    }
}
