<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuSubCategory extends Model
{
    protected $table = 'menu_subcategory';
    public $timestamps = false;
    protected $primaryKey = 'McatID';

    public function scopeGetActiveSubCat($query)
    {
        return $query->where('Isdeleted', '==', 0)->get();
    }

    public static function checkmenu($tblno,$category_id)
    {
        $tbl = MenuSubCategory::where(['Isdeleted' => 0, 'CategoryName' => $tblno,'category_id'=>$category_id])->first();
        if (is_null($tbl)) return true;
        else return false;
    }

    public
    function scopegetsubMenuDropdown()
    {
        $Mcats = MenuSubCategory::where('Isdeleted', '0')->get(['McatID', 'CategoryName']);
        $arr[0] = "SELECT";
        foreach ($Mcats as $Mcat) {
            $arr[$Mcat->McatID] = $Mcat->CategoryName;
        }
        return $arr;
    }

    public
    function category()
    {
        return $this->belongsTo('App\MenuCategory', 'category_id');
    }
}
