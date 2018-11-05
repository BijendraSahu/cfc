<?php

namespace App\Http\Controllers;

use App\SupplierModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

session_start();

class SupplierController extends Controller
{
    //
    public function index()
    {
        return view('SupplierFiles.view_supplier')->with('Supplier', SupplierModel::GetActiveSuppliers());
    }

    public function create()
    {
        return view('SupplierFiles.create_supplier');
    }

    public function store(Request $request)
    {
        $supl = new SupplierModel();
        if (!$supl->checkSupplierName(request('name'))) {
            return Redirect::back()->withInput()->withErrors('Supplier Name already exists in the system. Please enter a different Supplier Name.');
        }

        $sup = new SupplierModel();
        $sup->S_Name = request('name');
        $sup->Addr = request('address');
        $sup->Contact = request('contact');
        $sup->save();
        return redirect('/Supplier')->with('message', 'Supplier has been added...!');
    }

    public function edit($id)
    {
        $sup = SupplierModel::find($id);
        return view('SupplierFiles.edit_suppllier')->with(['sup' => $sup]);
    }

    public function update($id, Request $request)
    {
        $sup = SupplierModel::find($id);
        $sup->S_Name = request('name');
        $sup->Addr = request('address');
        $sup->Contact = request('contact');
        $sup->save();
        return redirect('/Supplier')->with('message', 'Supplier has been updated...!');
    }

    public function destroy($id)
    {
        $sup = SupplierModel::find($id);
        $sup->Isdeleted = 1;
        $sup->save();
        return redirect('/Supplier')->with('message', 'Supplier has been deleted...!');
    }
}
