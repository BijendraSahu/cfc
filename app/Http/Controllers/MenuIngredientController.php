<?php

namespace App\Http\Controllers;

use App\Memu_IngredientModal;
use App\MenuIngredient;
use App\MenuItemModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MenuIngredientController extends Controller
{
    //
    public function index()
    {
        return view('MenuFiles.view_MenuIngredient')->with('Ingredients', MenuItemModel::GetActiveMenuItem());
    }

    public function create()
    {
//        echo "hi";
        $menu = MenuIngredient::GetMenuNameDropdown();
        $unt = MenuIngredient::GetUnitNameDropdown();
        $item = MenuIngredient::GetItemNameDropdown();

        return view('MenuFiles.create_menu_ing')->with(['unt' => $unt, 'item' => $item, 'menu' => $menu]);
    }

    public function store(Request $request)
    {
        if ((request('ddlmenu') == 0)) {
            return Redirect::back()->withInput()->withErrors('Please select any menu');
        }
        session_start();
        $count = count($_POST["itemName"]);
        if ($count > 0) {
            try {
//                $ingdnt = new MenuIngredient();
//                $ingdnt->MID = request('ddlmenu');
//                $ingdnt->ItemID = request('ddlitem');
////        $ingdnt->Item_Name = request('ddlitem');
////                $ingdnt->UnitId = request('ddlunit');
//                $ingdnt->UnitName = request('unit');
//                $ingdnt->Qty = request('qty');
//                $ingdnt->rate = request('rate');
//                $ingdnt->yield_rate = request('yield_rate');
//                $ingdnt->amount = request('amount');
//                $ingdnt->InsertedBy = $_SESSION['user_master']->id;
//                $ingdnt->save();
//                return Redirect::back();

                $menu = MenuItemModel::find(request('ddlmenu'));
                $menu->total_amt = (request('quotAmt'));
                $menu->save();

                for ($i = 0; $i < $count; $i++) {
                    if (trim($_POST["itemRate"][$i]) != "") {
                        $ingdnt = new MenuIngredient();
                        $ingdnt->MID = $menu->MID;
                        $ingdnt->ItemID = $_POST["itemId"][$i];
                        $ingdnt->rate = $_POST["itemRate"][$i];
                        $ingdnt->yield_rate = $_POST["itemYRate"][$i];
                        $ingdnt->Qty = $_POST["quantity"][$i];
                        $ingdnt->amount = $_POST["itemAmount"][$i];
                        $ingdnt->purchase_amount = $_POST["itemPurchase"][$i];
                        $ingdnt->InsertedBy = $_SESSION['user_master']->id;
                        $ingdnt->save();
                    }
                }
                return Redirect::back();
            } catch (\Exception $e) {
                echo $e;
            }
        }
    }

    public function destroy($id)
    {
        session_start();
        $ingdnt = MenuIngredient::find($id);
        $ingdnt->Isdeleted = 1;
        $ingdnt->DeletedBy = $_SESSION['user_master']->id;
        $ingdnt->save();
        return Redirect::back();
    }

    public
    function show($id)
    {
//        echo $id
        $menuings = MenuIngredient::where(['MID' => $id])->get();
//        echo json_encode($menuings);
        return view('MenuFiles.menu_ing_list')->with(['menuings' => $menuings]);
    }


    public function edit($id, Redirect $redirect)
    {
        $menu = MenuIngredient::GetMenuNameDropdown();
        $unt = MenuIngredient::GetUnitNameDropdown();
        $item = MenuIngredient::GetItemNameDropdown();
        $descp = Memu_IngredientModal::find($id);
        return view('MenuFiles.edit_menuIngredient')->with(['menu' => $menu, 'unt' => $unt, 'item' => $item, 'descp' => $descp]);
    }

    public function update($id)
    {
        session_start();
        $ingdnt = Memu_IngredientModal::find($id);
        $ingdnt->MID = request('ddlmenu');
        $ingdnt->ItemID = request('ddlitem');
        $ingdnt->UnitId = request('ddlunit');
        $ingdnt->Qty = request('qty');
        $ingdnt->rate = request('rate');
        $ingdnt->yield_rate = request('yield_rate');
        $ingdnt->amount = request('amount');
        $ingdnt->UpdatedBy = $_SESSION['user_master']->id;
        $ingdnt->save();
        return Redirect::back();
    }
}
