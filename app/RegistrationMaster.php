<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RegistrationMaster extends Model
{
    protected $table = 'registrations';
    public $timestamps = false;
    protected $primaryKey = 'Regid';

    public function scopeGetActiveRegMaster($query)
    {
        return $query->where('Isdeleted', '=', 0)->orderBy('Regid', 'desc')->get();
    }

    public static function GenerateRegNumber()
    {
        $user_no = DB::table('registrations')->max('Regid');
        if (is_null($user_no)) $user_no = 1;
        else $user_no++;
        return $user_no;
    }
}
