<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierModel extends Model
{
    //
    protected $table = 'suppliers';
    public $timestamps = false;
    protected $primaryKey = 'SID';

    public function scopeGetActiveSuppliers($query)
    {
        return $query->where('Isdeleted', '=', '0')->get();
    }

    public function checkSupplierName($name)
    {
        $nme = SupplierModel::where(['Isdeleted' => 0, 'S_Name' => $name])->first();
        if (is_null($nme)) return true;
        else return false;
    }

    public
    function scopegetSupplierDropdown()
    {
        $supls = SupplierModel::where(['Isdeleted' => '0'])->get(['SID', 'S_Name']);
        $arr[0] = "SELECT";
        foreach ($supls as $sup) {
            $arr[$sup->SID] = $sup->S_Name;
        }
        return $arr;
    }
}
