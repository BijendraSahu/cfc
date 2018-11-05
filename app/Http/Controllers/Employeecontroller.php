<?php

namespace App\Http\Controllers;

use App\EmployeeModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

session_start();

class Employeecontroller extends Controller
{
    //
    public function index()
    {
        return view('EmployeeFile.view_employeeDetails')->with('Employee', EmployeeModel::GetActiveEmployee());
    }

    public function create()
    {
        $etype = EmployeeModel::GetEmptypeDropdown();
        return view('EmployeeFile.create_Employee')->with(['etype' => $etype]);
    }

    public function store(Request $request)
    {
        $empname = new EmployeeModel();
        if ($empname->checkEmp(request('empname'))) {
            Redirect::back()->withInput()->withErrors('Employee Name Is Already Exists');
        }

        $emp = new EmployeeModel();
        $emp->JoiningDate = Carbon::parse(request('jod'))->format('Y-m-d');
        $emp->Emp_Name = request('empname');
        $emp->ContactNo = request('contactno');
        $emp->Alt_No = request('altno');
        $emp->DOB = Carbon::parse(request('dob'))->format('Y-m-d');
        $emp->Gender = request('gender');
        $emp->Addr = request('address');
        $emp->EmailID = request('email');
        $emp->City = request('city');
        $emp->EPTID = request('ddlemp');
        $emp->InsertedBy = $_SESSION['user_master']->id;
        $emp->save();
        return redirect('Employee');
    }

    public function destroy($id)
    {
        $emp = EmployeeModel::find($id);
        $emp->Isdeleted = 1;
        $emp->DeletedBy = $_SESSION['user_master']->id;
        $emp->save();
        return redirect('Employee');
    }

    public function edit($id)
    {
        $emp = EmployeeModel::find($id);
        $etype = EmployeeModel::GetEmptypeDropdown();
        return view('EmployeeFile.edit_EmployeeDetails')->with(['emp'=>$emp,'etype'=>$etype]);
    }

    public function update($id,Request $request)
    {
        $emp = EmployeeModel::find($id);
        $emp->JoiningDate = Carbon::parse(request('jod'))->format('Y-m-d');
        $emp->Emp_Name = request('empname');
        $emp->ContactNo = request('contactno');
        $emp->Alt_No = request('altno');
        $emp->DOB = Carbon::parse(request('dob'))->format('Y-m-d');
        $emp->Gender = request('gender');
        $emp->Addr = request('address');
        $emp->EmailID = request('email');
        $emp->City = request('city');
        $emp->EPTID = request('ddlemp');
        $emp->UpdatedBy = $_SESSION['user_master']->id;
        $emp->save();
        return view('EmployeeFile.view_employeeDetails')->with('Employee', EmployeeModel::GetActiveEmployee());
    }
}
