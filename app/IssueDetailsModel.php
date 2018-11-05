<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IssueDetailsModel extends Model
{
    protected $table = 'issue_details';
    public $timestamps = false;

    public function itemName()
    {
        return $this->belongsTo('App\Item_MasterModel', 'item_id');
    }

}
