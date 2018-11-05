<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IssueModel extends Model
{
    protected $table = 'issue';
    public $timestamps = false;

    public function scopeGetActiveIssues($query)
    {
        return $query->where('is_active', '=', '1')->get();
    }

    public function scopeGetActiveIssuesByUser($query)
    {
        return $query->where(['is_active' => '1', 'issue_dept_id' => $_SESSION['user_master']->role_master_id])->get();
    }


    public function user()
    {
        return $this->belongsTo('App\UserMaster', 'issue_by');
    }

    public function dept()
    {
        return $this->belongsTo('App\DepartmentModel', 'issue_dept_id');
    }
}
