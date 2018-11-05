<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeModel extends Model
{
    //
    protected $table='employees';
    public $timestamps=false;
    protected $primaryKey='EmpId';

    public function scopeGetActiveEmployee($query)
    {
        return $query->where('Isdeleted','=',0)->get();
    }

    public function getEmptype()
    {
        return $this->belongsTo('App\EmplyoeeType','EPTID');
    }

    public function scopeGetEmptypeDropdown()
    {
        $emtype=EmplyoeeType::where('Isdeleted','0')->get(['EPTID','Emp_Type']);
        $arr[0]='Select';
        foreach ($emtype as $emtype)
        {
            $arr[$emtype->EPTID]=$emtype->Emp_Type;
        }
        return $arr;
    }

    public function checkEmp($empname)
    {
          $emp=EmployeeModel::where(['Isdeleted'=>0,'Emp_Name'=>$empname]);
          if(is_null($emp))return true;
          else return false;
    }

}
