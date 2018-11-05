<?php

namespace App\Http\Controllers;

use App\MenuCategory;
use App\MenuSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

session_start();

class MenuSubCategoryController extends Controller
{
    public function index()
    {
        return view('MenuFiles.view_menusubcategory')->with('MenuSubCategory', MenuSubCategory::GetActiveSubCat());
    }

    public function create()
    {
        $cate = MenuCategory::getMenuDropdown();
        return view('MenuFiles.create_menusubcategory')->with(['cate' => $cate]);
    }

    public function store(Request $request)
    {
//        if (request('id_proof') != null)
//            echo "No"
        $etype = new MenuSubCategory();
        if (!$etype->checkmenu(request('name'),request('ddlcat'))) {
            return Redirect::back()->withInput()->withErrors('Menu Sub Category already exists in the system. Please enter a different subcategory.');
        }

        $type = new MenuSubCategory();
        $type->category_id = request('ddlcat');
        $type->CategoryName = request('name');
        $type->Discriptions = request('Discription');
        $type->InsertedBy = $_SESSION['user_master']->id;
        $type->save();
        return redirect('/subcategory')->with('message', 'Menu Sub category has been added...!');
    }

    public
    function destroy($id)
    {
        $Cate = MenuSubCategory::find($id);
        $Cate->Isdeleted = 1;
        $Cate->save();
        return redirect('subcategory');
    }

    public function edit($id)
    {
        $MenuCategory = MenuSubCategory::find($id);
        $cate = MenuCategory::getMenuDropdown();
        return view('MenuFiles.edit_menusubcategory')->with(['MenuCategory' => $MenuCategory, 'cate' => $cate]);
    }

    public function update($id, Request $request)
    {
        $cate = MenuSubCategory::find($id);
        $cate->category_id = request('ddlcat');
        $cate->CategoryName = request('name');
        $cate->Discriptions = request('Discription');
        $cate->UpdatedBy = $_SESSION['user_master']->id;
        $cate->save();
        //return Redirect::back();
        return redirect('subcategory');
    }
}
