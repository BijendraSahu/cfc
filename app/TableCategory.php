<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableCategory extends Model
{
    protected $table = 'table_category';
    public $timestamps = false;

    public
    function scopegettableCategory()
    {
        $users = TableCategory::where('is_active', '1')->get(['id', 'category']);
        $arr[0] = "SELECT";
        foreach ($users as $user) {
            $arr[$user->id] = $user->category;
        }
        return $arr;
    }


}
