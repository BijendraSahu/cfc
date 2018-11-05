<?php

namespace App\Http\Controllers;

use App\EmplyoeeType;
use Illuminate\Http\Request;
session_start();
class EmployeeTypeController extends Controller
{
    //
    public function index()
    {
        return view('EmployeeFile.view_emptype')->with('EmplyoeeType', EmplyoeeType::getActiveUserMaster());
    }
    public  function  create()
    {
        return view('EmployeeFile.create_emptype');
    }
    public function store(Request $request)
    {
//        if (request('id_proof') != null)
//            echo "No"
        $etype=new EmplyoeeType();
        if (!$etype->checkEtype(request('name'))){
            return Redirect::back()->withInput()->withErrors('Emp Type already exists in the system. Please type a different unit.');
        }

        $type = new EmplyoeeType();
        $type->Emp_type = request('name');
        $type->save();
        return redirect('EMPTYPE');
    }

    public
    function destroy($id)
    {
        $Cate = EmplyoeeType::find($id);
        $Cate->Isdeleted = 1;
        $Cate->save();
        return redirect('EMPTYPE');
    }

    public function edit($id)
    {
        $cate = EmplyoeeType::find($id);
        return view('EmployeeFile.edit_emptype')->with(['EmplyoeeType' => $cate]);
    }

    public function update($id, Request $request)
    {
        $cate = EmplyoeeType::find($id);
        $cate->Emp_type = request('name');
        $cate->save();
        //return Redirect::back();
        return view('EmployeeFile.view_emptype')->with('EmplyoeeType', EmplyoeeType::getActiveUserMaster());
    }
}
