<?php

namespace App\Http\Controllers;

use App\unit;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
session_start();
class unitcontroller extends Controller
{
    public function index()
    {
        return view('Unitpages.view_unit_master')->with('unit', unit::getActiveUserMaster());;
    }

    public function create()
    {
        return view('Unitpages.create_unit_master');
    }

    public function store(Request $request)
    {
//        if (request('id_proof') != null)
//            echo "No"
        $unitmaster=new unit();
        if (!$unitmaster->checkUnitName(request('name'))){
            return Redirect::back()->withInput()->withErrors('Unit already exists in the system. Please type a different unit.');
        }

        $Units = new unit();
        $Units->UnitName = request('name');
        $Units->UnitMinorValue = request('valueunit');
        $Units->InsertedBy=$_SESSION['user_master']->id;
        $Units->save();
        return redirect('/Unit')->with('message', 'Unit has been added...!');
    }
    public
    function destroy($id)
    {
        $Units = unit::find($id);
        $Units->Isdeleted = 1;
        $Units->save();
        return redirect('/Unit')->with('message', 'Unit has been deleted...!');

    }
    public function edit($id)
    {
        $UnitMaster = unit::find($id);
        return view('Unitpages.edit_unit_master')->with(['unit' => $UnitMaster, 'unit' => $UnitMaster]);
    }

    public function update($id, Request $request)
    {
        $unitMaster = unit::find($id);
        $unitMaster->UnitName = request('name');
        $unitMaster->UnitMinorValue = request('unitvalue');
        $unitMaster->save();
//        return Redirect::back();
        return redirect('/Unit')->with('message', 'Unit has been updated...!');

    }
    public function checkUnitName($unitname)
    {
        $name = unit::where(['Isdeleted' => 0, 'UnitName' => $unitname])->first();
        if (is_null($name)) return true;
        else return false;
    }
}
