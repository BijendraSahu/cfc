<?php

namespace App\Http\Controllers;

use App\MenuCategory;
use App\MenuItemModel;
use App\MenuSubCategory;
use App\PercentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

session_start();

class Menu_ItemComtroller extends Controller
{
    //
    public function index()
    {
        return view('MenuFiles.view_menuitem')->with('Menus', MenuItemModel::GetActiveMenuItem());
    }

    public function create()
    {
        $mainecate = MenuCategory::where('Isdeleted', '0')->get(['McatID', 'CategoryName']);
        $cate = MenuSubCategory::getsubMenuDropdown();
        $percent = PercentModel::getPercentDropdown();
        return view('MenuFiles.create_MenuItem')->with(['cate' => $cate, 'percent' => $percent, 'mainecate' => $mainecate]);
    }

    public function store(Request $request)
    {
        if (request('ddlcat') == 0) {
            return Redirect::back()->withInput()->withErrors('Please select any subcategory for menu.');
        }

        if (request('percent_id') == 0) {
            return Redirect::back()->withInput()->withErrors('Please select any tax percent for menu.');
        }

        $etype = new MenuItemModel();
        if (!$etype->checkItm(request('name'))) {
            return Redirect::back()->withInput()->withErrors('Menu Item already exists in the system. Please type a different Item.');
        }

        $mit = new MenuItemModel();
        $mit->MCID = request('ddlcat');
        $mit->percent_id = request('percent_id');
        $mit->M_Name = request('name');
        $mit->Act_Price = request('actprice');
        $mit->Sale_Price = request('saleprice');
        $mit->Descriptions = request('description');
        $file = $request->file('menu_img');
        if ($request->file('menu_img') != null) {
            $destination_path = 'menuimg/';
            $filename = str_random(6) . '_' . $file->getClientOriginalName();
            $file->move($destination_path, $filename);
            $mit->menu_img = $destination_path . $filename;
        }
        $mit->InsertedBy = $_SESSION['user_master']->id;
        $mit->save();
        return redirect('/Menu')->with('message', 'Menu Item has been added...!');
    }

    public
    function destroy($id)
    {
        $Cate = MenuItemModel::find($id);
        $Cate->Isdeleted = 1;
        $Cate->save();
        return redirect('/Menu')->with('message', 'Menu Item has been deleted...!');
    }

    public function edit($id)
    {
        $mainecate = MenuCategory::where('Isdeleted', '0')->get(['McatID', 'CategoryName']);
        $cate = MenuSubCategory::getsubMenuDropdown();
        $percent = PercentModel::getPercentDropdown();
        $Menus = MenuItemModel::find($id);
        return view('MenuFiles.edit_MenuItem')->with(['Menus' => $Menus, 'cate' => $cate, 'percent' => $percent, 'mainecate' => $mainecate]);
    }

    public function getSubCategory()
    {
        $menu_category_id = request('menu_category');
        $Mcats = MenuSubCategory::where(['Isdeleted' => '0', 'category_id' => $menu_category_id])->get(['McatID', 'CategoryName']);
        $arr[0] = "SELECT";
        foreach ($Mcats as $Mcat) {
            $arr[$Mcat->McatID] = $Mcat->CategoryName;
        }
        return view('MenuFiles.sub_category_list')->with(['arr' => $arr]);
    }


    public function update($id, Request $request)
    {
        if (request('ddlcat') == 0) {
            return Redirect::back()->withInput()->withErrors('Please select any subcategory for menu.');
        }
        if (request('percent_id') == 0) {
            return Redirect::back()->withInput()->withErrors('Please select any tax percent for menu.');
        }

        $mit = MenuItemModel::find($id);
        $mit->MCID = request('ddlcat') != '0' ? request('ddlcat') : $mit->MCID;
        $mit->percent_id = request('percent_id');
        $mit->M_Name = request('name');
        $mit->Act_Price = request('actprice');
        $mit->Sale_Price = request('saleprice');
        $mit->Descriptions = request('description');
        $file = $request->file('menu_img');
        if ($request->file('menu_img') != null) {
            $destination_path = 'menuimg/';
            $filename = str_random(6) . '_' . $file->getClientOriginalName();
            $file->move($destination_path, $filename);
            $mit->menu_img = $destination_path . $filename;
        }
        $mit->InsertedBy = $_SESSION['user_master']->id;
        $mit->save();
        return redirect('/Menu')->with('message', 'Menu Item has been updated...!');
    }
}
