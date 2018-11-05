<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentModel extends Model
{
    protected $table = 'department';
    public $timestamps = false;

    public
    function scopegetDeptDropdown()
    {
        $supls = DepartmentModel::where(['is_active' => '1', 'id' => 4])->orWhere(['id' => 5])->get(['id', 'name']);
        $arr[0] = "SELECT";
        foreach ($supls as $sup) {
            $arr[$sup->id] = $sup->name;
        }
        return $arr;
    }
}
