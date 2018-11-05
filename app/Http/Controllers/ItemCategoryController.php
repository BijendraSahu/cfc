<?php

namespace App\Http\Controllers;

use App\ItemCategory;
use Illuminate\Http\Request;

session_start();
class ItemCategoryController extends Controller
{
    //
    public function index()
    {
        return view('Item.view_itemcategory')->with('ItemCategory', ItemCategory::getActiveUserMaster());
    }
    public  function  create()
    {
        return view('Item.create_Itemcategory');
    }
    public function store(Request $request)
    {
//        if (request('id_proof') != null)
//            echo "No"
        $itemcate=new ItemCategory();
        if (!$itemcate->checkUnitName(request('name'))){
            return Redirect::back()->withInput()->withErrors('Unit already exists in the system. Please type a different unit.');
        }

        $cate = new ItemCategory();
        $cate->Cat_Name = request('name');

        $cate->InsertedBy=$_SESSION['user_master']->id;
        $cate->save();
        return redirect('ItemCat');
    }

    public
    function destroy($id)
    {
        $Cate = ItemCategory::find($id);
        $Cate->Isdeleted = 1;
        $Cate->save();
        return redirect('ItemCat');
    }

    public function edit($id)
    {
        $cate = ItemCategory::find($id);
        return view('Item.edit_ItemCategory')->with(['ItemCategory' => $cate, 'ItemCategory' => $cate]);
    }

    public function update($id, Request $request)
    {
        $cate = ItemCategory::find($id);
        $cate->Cat_Name = request('name');
        $cate->save();
//        return Redirect::back();
        return view('Item.view_itemcategory')->with('ItemCategory', ItemCategory::getActiveUserMaster());
    }

}
