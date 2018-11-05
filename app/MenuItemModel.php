<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuItemModel extends Model
{
    //
    protected $table = 'menu_item';
    public $timestamps = false;
    protected $primaryKey = 'MID';

    public function scopeGetActiveMenuItem($query)
    {
        return $query->where('Isdeleted', '==', 0)->get();
    }

    public static function checkItm($itm)
    {
        $item = MenuItemModel::where(['Isdeleted' => 0, 'M_Name' => $itm])->first();
        if (is_null($item)) return true;
        else return false;
    }

    public
    function menucategory()
    {
        return $this->belongsTo('App\MenuSubCategory', 'MCID');
    }

    public
    function tax()
    {
        return $this->belongsTo('App\PercentModel', 'percent_id');
    }
}
