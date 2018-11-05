<?php

namespace App\Http\Controllers;

use App\Item_MasterModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

session_start();

class ItemMasterController extends Controller
{
    //
    public function index()
    {
        return view('Item.view_ItemList')->with('Item', Item_MasterModel::GetActiveItemMaster());
    }

    public function create()
    {
        $Icate = Item_MasterModel::getCategoryDropdown();
        $unt = Item_MasterModel::getUnitDropdown();

        return view('Item.create_Item')->with(['Icate' => $Icate, 'unt' => $unt]);
    }

    public function store(Request $request)
    {
//        if (request('id_proof') != null)
//            echo "No"
        $etype = new Item_MasterModel();
        if (!$etype->checkItemName(request('name'))) {
            return Redirect::back()->withInput()->withErrors('Item already exists in the system. Please type a different Item.');
        }

        $mit = new Item_MasterModel();
        $mit->IcatID = request('ddlcat');
        $mit->ItemCode = request('itemcode');
        $mit->ItemName = request('name');
        $mit->UnitID = request('ddlunit');
        $mit->UnitName = request('ddlunit');
        $mit->Descriptions = request('description');
        $mit->Rol = request('rol');
        $mit->InsertedBy = $_SESSION['user_master']->id;
        $mit->save();
        return redirect('/Item')->with('message', 'Item has been added...!');
    }

    public
    function destroy($id)
    {
        $Cate = Item_MasterModel::find($id);
        $Cate->Isdeleted = 1;
        $Cate->DeletedBy = $_SESSION['user_master']->id;
        $Cate->save();
        return redirect('/Item')->with('message', 'Item has been deleted...!');
    }

    public function edit($id)
    {
        $Icate = Item_MasterModel::getCategoryDropdown();
        $unt = Item_MasterModel::getUnitDropdown();
        $Item = Item_MasterModel::find($id);
        return view('Item.edit_itemDetails')->with(['Item' => $Item, 'Icate' => $Icate, 'unt' => $unt]);
    }

    public function update($id, Request $request)
    {
        $itm = Item_MasterModel::find($id);
        $itm->IcatID = request('ddlcat');
        $itm->ItemCode = request('itemcode');
        $itm->ItemName = request('name');
        $itm->UnitID = request('ddlunit');
        $itm->UnitName = request('ddlunit');
        $itm->Descriptions = request('description');
        $itm->Rol = request('rol');
        $itm->UpdatedBy = $_SESSION['user_master']->id;
        $itm->save();
        return redirect('/Item')->with('message', 'Item has been updated...!');
    }
}
