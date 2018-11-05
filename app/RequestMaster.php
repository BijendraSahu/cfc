<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestMaster extends Model
{
    protected $table = 'request_master';
    public $timestamps = false;

    public function scopeGetActiverequest($query)
    {
        return $query->where('is_active', '=', '1')->get();
    }

    public function scopeGetActiverequestByUser($query)
    {
        return $query->where(['is_active' => '1', 'request_by' => $_SESSION['user_master']->id])->get();
    }

    public function user()
    {
        return $this->belongsTo('App\UserMaster', 'request_by');
    }

    public function userAccept()
    {
        return $this->belongsTo('App\UserMaster', 'accept_by');
    }


    public function dept()
    {
        return $this->belongsTo('App\DepartmentModel', 'dept_request_by');
    }

    public function status()
    {
        return $this->belongsTo('App\RequestStatus', 'status_id');
    }
}
