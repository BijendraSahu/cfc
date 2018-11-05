<?php

namespace App\Http\Controllers;

use App\MenuCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

session_start();

class Menu_CategoryController extends Controller
{
    //
    public function index()
    {
        return view('MenuFiles.view_MemuCategory')->with('MenuCategory', MenuCategory::getActiveUserMaster());
    }

    public function create()
    {
        return view('MenuFiles.create_menucategory');
    }

    public function store(Request $request)
    {
//        if (request('id_proof') != null)
//            echo "No"
        $etype = new MenuCategory();
        if (!$etype->checkmenu(request('name'))) {
            return Redirect::back()->withInput()->withErrors('Menu Category already exists in the system. Please enter a different Category.');
        }

        $type = new MenuCategory();
        $type->CategoryName = request('name');
        $type->Discriptions = request('Discription');
        $type->InsertedBy = $_SESSION['user_master']->id;
        $type->save();
        return redirect('/MCATE')->with('message', 'Menu Category has been added...!');
    }

    public
    function destroy($id)
    {
        $Cate = MenuCategory::find($id);
        $Cate->Isdeleted = 1;
        $Cate->save();
        return redirect('/MCATE')->with('message', 'Menu Category has been deleted...!');
    }

    public function edit($id)
    {
        $cate = MenuCategory::find($id);
        return view('MenuFiles.edit_Menucategory')->with(['MenuCategory' => $cate]);
    }

    public function update($id, Request $request)
    {
        $cate = MenuCategory::find($id);
        $cate->CategoryName = request('name');
        $cate->Discriptions = request('Discription');
        $cate->UpdatedBy = $_SESSION['user_master']->id;
        $cate->save();
        //return Redirect::back();
        return redirect('/MCATE')->with('message', 'Menu Category has been updated...!');
    }
}
