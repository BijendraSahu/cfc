<?php

namespace App;

use App\Http\Controllers\unitcontroller;
use Illuminate\Database\Eloquent\Model;

class unit extends Model
{
    //
    protected $table = 'units';
    public $timestamps = false;
    protected  $primaryKey ='UnitID';

    public function scopeGetActiveUserMaster($query)
    {
        return $query->where('Isdeleted', '==', 0)->get();
    }

    public static function checkUnitName($unitname)
    {
        $unitname = unit::where(['Isdeleted' => 0, 'UnitName' => $unitname])->first();
        if (is_null($unitname)) return true;
        else return false;
    }
}
