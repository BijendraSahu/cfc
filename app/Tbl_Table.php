<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tbl_Table extends Model
{
    //
    protected $table = 'tbl_table';
    public $timestamps = false;
    protected $primaryKey = 'Tid';

    public function scopeGetActiveUserMaster($query)
    {
        return $query->where('Isdeleted', '==', 0)->get();
    }

    public static function checkTblNo($tblno)
    {
        $tbl = Tbl_Table::where(['Isdeleted' => 0, 'TblNo' => $tblno])->first();
        if (is_null($tbl)) return true;
        else return false;
    }

    public
    function scopegetTableDropdown()
    {
        $tables = Tbl_Table::where(['Isdeleted' => '0', 'is_booked' => 1])->get(['Tid', 'TblNo']);
        $arr[0] = "SELECT";
        foreach ($tables as $table) {
            $arr[$table->Tid] = $table->TblNo;
        }
        return $arr;
    }
    public
    function table_category()
    {
        return $this->belongsTo('App\TableCategory');
    }

    public
    function scopegetTableListDropdown()
    {
        $tables = Tbl_Table::where(['Isdeleted' => '0'])->get(['Tid', 'TblNo']);
        $arr[0] = "SELECT";
        foreach ($tables as $table) {
            $arr[$table->Tid] = $table->TblNo;
        }
        return $arr;
    }
}
