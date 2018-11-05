<?php

namespace App\Http\Controllers;

use App\TableCategory;
use App\Tbl_Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

session_start();

class Tbl_TableController extends Controller
{
    //
    public function index()
    {
        return view('TableCreation.view_tabledata')->with('Tbl_Table', Tbl_Table::getActiveUserMaster());
    }

    public function create()
    {
        $t_category = TableCategory::gettableCategory();
        return view('TableCreation.create_table')->with(['t_category' => $t_category]);
    }

    public function store(Request $request)
    {
//        if (request('id_proof') != null)
//            echo "No"
        $itemcate = new Tbl_Table();
        if (!$itemcate->checktblno(request('name'))) {
            return Redirect::back()->withInput()->withErrors('Table No already exists in the system. Please type a different Table No.');
        }

        $cate = new Tbl_Table();
        $cate->table_category_id = request('table_category_id');
        $cate->TblNo = request('name');
        $cate->save();
        return redirect('/Tbl')->with('message', 'Table has been added...!');
    }

    public
    function destroy($id)
    {
        $Cate = Tbl_Table::find($id);
        $Cate->Isdeleted = 1;
        $Cate->save();
        return redirect('/Tbl')->with('message', 'Table has been deleted...!');

    }

    public
    function show($id)
    {
    }

    public function edit($id)
    {
        $cate = Tbl_Table::find($id);
        return view('TableCreation.edit_table')->with(['Tbl_Table' => $cate]);
    }

    public function update($id, Request $request)
    {
        $cate = Tbl_Table::find($id);
        $cate->table_category_id = request('table_category_id');
        $cate->TblNo = request('name');
        $cate->save();
        //return Redirect::back();
        return redirect('/Tbl')->with('message', 'Table has been updated...!');

    }
}
