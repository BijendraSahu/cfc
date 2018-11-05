<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmplyoeeType extends Model
{
    //
    protected $table = 'emp_type';
    public $timestamps = false;
    protected  $primaryKey ='EPTID';

    public function scopeGetActiveUserMaster($query)
    {
        return $query->where('Isdeleted', '==', 0)->get();
    }

    public static function checkEtype($tblno)
    {
        $tbl = EmplyoeeType::where(['Isdeleted' => 0, 'Emp_Type' => $tblno])->first();
        if (is_null($tbl)) return true;
        else return false;
    }
}
