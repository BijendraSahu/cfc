<?php

namespace App\Http\Controllers;

use App\Bill;
use App\BillDetails;
use App\MenuCategory;
use App\MenuItemModel;
use App\MenuSubCategory;
use App\Order;
use App\Tbl_OrderModel;
use App\Tbl_Table;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

session_start();

class TableBookingController extends Controller
{
    public function showtables($id)
    {
        $tbl = Tbl_Table::find($id);
        $cart = Cart::content();
        $categories = MenuCategory::where(['Isdeleted' => 0])->get();
        return view('waiter.waiter_home')->with(['tbl' => $tbl, 'cart' => $cart, 'categories' => $categories]);
    }

    public function getFilteredIndex($id)
    {
//        session_start();
//        $role_master_id = $_SESSION['user_master']->role_master_id;
//        $filtered_values = LeadMaster::filterLead($id);

        if ($id == 0)
            $menusubs = MenuSubCategory::where(['Isdeleted' => 0])->get();
        else
            $menusubs = MenuSubCategory::where(['category_id' => $id, 'Isdeleted' => 0])->get();
        $menus = MenuItemModel::where('Isdeleted', '==', 0)->get();
        $cart = Cart::content();
        return view('waiter.menu_list')->with(['menus' => $menus, 'menusubs' => $menusubs, 'cart' => $cart]);
    }

    public function cart($id, $qty)
    {
        $menu = MenuItemModel::find(request('data'));
        if (isset($qty) > 0 && $qty != 0) {
            Cart::add($id, $menu->M_Name, $qty, $menu->Sale_Price);
        } else {
            Cart::add($id, $menu->M_Name, 1, $menu->Sale_Price);
        }
//        Cart::update($id, $qty);
        $tid = request('tid');
        $cart = Cart::content();
//        if (isset($cart) == 0) {
//            Session::forget('coupon_value');
//            Session::flash('success-msg', 'Cart Is Empty');
//        }
//        $cart_total = Cart::total();
//
//        Session::flash('success-msg', 'Successfully Added to Cart');
        return view('waiter.cart_list')->with(['cart' => $cart, 'tid' => $tid]);
    }

    public function cartupdate($id, $qty)
    {
        $menu = MenuItemModel::find(request('data'));
//        if (isset($qty) > 0 && $qty != 0) {
//            Cart::add($id, $menu->M_Name, $qty-1, $menu->Sale_Price);
//        } else {
        Cart::update($id, $qty);
//        }
//        Cart::update($id, $menu->M_Name, $qty, $menu->Sale_Price);
        $tid = request('tid');
        $cart = Cart::content();
//        if (isset($cart) == 0) {
//            Session::forget('coupon_value');
//            Session::flash('success-msg', 'Cart Is Empty');
//        }
//        $cart_total = Cart::total();
//
//        Session::flash('success-msg', 'Successfully Added to Cart');
//        return view('waiter.cart_list')->with(['cart' => $cart, 'tid' => $tid]);
    }

    public function cartload()
    {
        $cart = Cart::content();
        $tid = request('tid');
        return view('waiter.cart_list')->with(['cart' => $cart, 'tid' => $tid]);
    }

    public function delete($id)
    {
//        $rowId = $id;
//        $quantity = 0;
//        Cart::update($id, $quantity);
//        return redirect()->back();
        $rowId = $id;
        Cart::remove($id);
        return redirect()->back();
    }

    public function update($id)
    {
        $rowId = $id;
        $quantity = 0;
        Cart::update($rowId, $quantity);
        return redirect()->back();
    }

    public function confirm_order($id)
    {
        $cart = Cart::content();
        if (count($cart) == 0) {
            return Redirect::back()->withInput()->withErrors('Your cart is empty');
        }

        $table = Tbl_Table::find($id);
        $table->is_booked = 1;
        $table->save();

        $odr = new Tbl_OrderModel();
        $odr->Tbl_Id = $id;
        $odr->KOTNO = rand(100000, 999999);
        $odr->order_no = rand(100000, 999999);
        $odr->OrderDate = Carbon::now();
        $odr->InsertBy = $_SESSION['user_master']->id;
        $odr->Waiter_Name = $_SESSION['user_master']->name;
        $odr->save();

        foreach ($cart as $row) {
            $menu = MenuItemModel::find($row->id);
            $submenu = MenuSubCategory::find($menu->MCID);
            $order = new Order();
            $order->OID = $odr->OID;
            $order->category_id = $submenu->category_id;
            $order->mid = $row->id;
            $order->qty = $row->qty;
            $order->m_name = $row->name;
            $order->price = $row->price;
            $order->total = $row->price * $row->qty;
            $order->save();
        }
        Cart::destroy();

        $tbl = Tbl_Table::find($id);
        $orderdes = Order::where(['OID' => $odr->OID])->get();
//        return view('PrintKOT.printkot')->with(['orderdes' => $orderdes, 'odr' => $odr, 'tbl' => $tbl]);
        return redirect('http://192.168.1.3:93/testing.aspx?id=' . $odr->OID);

    }

    public function get_bill()
    {
        $booked_table = Tbl_Table::getTableDropdown();
        return view('bill.generate_bill')->with(['booked_tables' => $booked_table]);
    }

    public function getBillingItem($id)
    {
//        $table_order = Tbl_OrderModel::where(['Tbl_Id' => $id, 'is_bill' => 0])->get();
//        foreach ($table_order as $order) {
//            $arr = Order::where(['OID' => $order->OID, 'is_cancelled' => 0])->get();
        $sql = 'select * from order_descriptions where OID in (select oid from tbl_order where tbl_id="' . $id . '" and is_cancelled=0 and IsBill=0)';
        $bills = DB::select($sql);
        return view('bill.partial_bill_item')->with(['bills' => $bills]);
    }

    public function print_bill()
    {
        $table_order = Tbl_OrderModel::where(['Tbl_Id' => request('table_id'), 'is_bill' => 0])->first();
        $sql = 'select * from order_descriptions where OID in (select oid from tbl_order where tbl_id="' . request('table_id') . '" and is_cancelled=0 and IsBill=0)';
        $order_desc = DB::select($sql);
        // $order_desc = Order::where(['OID' => $table_order->OID, 'is_cancelled' => 0, 'IsBill' => 0])->get();

//        echo json_encode($order_desc);
//        $table = Tbl_Table::find(request('table_id'));
//        $table->is_booked = 0;
//        $table->save();
//
//        $table_des = Tbl_OrderModel::find($table_order->OID);
//        $table_des->is_bill = 1;
//        $table_des->save();

//        $otp = rand(100000, 999999);
//        $bill = new Bill();
//        $bill->order_id = $table_order->OID;
//        $bill->bill_no = $otp;
//        $bill->stevard = $table_order->user->name;
//        $bill->table_no = $table->TblNo;
//        $bill->InsertedBy = $_SESSION['user_master']->id;
//        $bill->save();
//
//        $totalamt = 0;
//        $totaltax = 0;
//        $gtotal = 0;
//        foreach ($order_desc as $order) {
//            $menu = MenuItemModel::find($order->mid);
//            $bill_desc = new BillDetails();
//            $bill_desc->bill_id = $bill->id;
////            $bill_desc->MID = $order->mid;
//            $bill_desc->m_name = $order->m_name;
//            $bill_desc->qty = $order->qty;
//            $bill_desc->price = $order->price;
//            $bill_desc->total = $order->total;
//            $bill_desc->total_tax = $order->total * $menu->tax->percent / 100;
//            $bill_desc->grand_total = $order->total + $order->total * $menu->tax->percent / 100;
//            $bill_desc->save();
//            $totalamt += $order->total;
//            $totaltax += $bill_desc->total_tax;
//            $gtotal += $bill_desc->grand_total;
//        }
//        $bill->total_amt = $totalamt;
//        $bill->total_tax = $totaltax;
//        $bill->grand_total = $gtotal;
//        $bill->save();
        //http://localhost:64913/AnantaraPrint/testing.aspx?id=1
        return view('bill.partial_print')->with(['items' => $order_desc, 'table_order' => $table_order]);
    }


    public function final_bill()
    {
        $booked_table = Tbl_Table::getTableDropdown();
        return view('bill.generate_final_bill')->with(['booked_tables' => $booked_table]);
    }

    public function finalBillingItem($id)
    {
        $sql = 'select * from order_descriptions where OID in (select oid from tbl_order where tbl_id="' . $id . '" and is_cancelled=0 and IsBill=0)';
        $bills = DB::select($sql);
        return view('bill.billing_item_list')->with(['bills' => $bills]);
    }

    public function final_print_bill()
    {
        $table_order = Tbl_OrderModel::where(['Tbl_Id' => request('table_id'), 'is_bill' => 0])->first();
        $sql = 'select * from order_descriptions where OID in (select oid from tbl_order where tbl_id="' . request('table_id') . '" and is_cancelled=0 and IsBill=0)';
        $order_desc = DB::select($sql);
//        $order_desc = Order::where(['OID' => $table_order->OID, 'is_cancelled' => 0, 'IsBill' => 0])->get();

//        echo json_encode($order_desc);
        $table = Tbl_Table::find(request('table_id'));
        $table->is_booked = 0;
        $table->save();

        $PayableAmt = request('PayableAmt');
        $distype = request('distype');
        $discount = request('discount');
        $dis_reason = request('dis_reason');
        $paymentmode = request('paymentmode');
        $chequeno = request('chequeno');
        $bank = request('bank');
        $covers = request('covers');

        $table_des = Tbl_OrderModel::find($table_order->OID);
        $table_des->is_bill = 1;
        $table_des->save();

        $otp = rand(100000, 999999);
        $bill = new Bill();
        $bill->order_id = $table_order->OID;
        $bill->bill_no = $otp;
        $bill->stevard = $table_order->user->name;
        $bill->table_no = $table->TblNo;
        $bill->InsertedBy = $_SESSION['user_master']->id;
        $bill->save();

        $totalamt = 0;
        $totaltax = 0;
        $gtotal = 0;
        foreach ($order_desc as $order) {
            $menu = MenuItemModel::find($order->mid);
            $bill_desc = new BillDetails();
            $bill_desc->bill_id = $bill->id;
            $bill_desc->MID = $order->mid;
            $bill_desc->m_name = $order->m_name;
            $bill_desc->qty = $order->qty;
            $bill_desc->price = $order->price;
            $bill_desc->total = $order->total;
            $bill_desc->total_tax = $order->total * $menu->tax->percent / 100;
            $bill_desc->grand_total = $order->total + $order->total * $menu->tax->percent / 100;
            $bill_desc->save();
            $totalamt += $order->total;
            $totaltax += $bill_desc->total_tax;
            $gtotal += $bill_desc->grand_total;

            $orderdes = Order::find($order->id);
            $orderdes->IsBill = 1;
            $orderdes->save();
        }
        $bill->total_amt = $totalamt;
        $bill->total_tax = $totaltax;
        $bill->grand_total = $gtotal;

        $bill->payable_amt = $PayableAmt;
        $bill->discount_type = $distype;
        $bill->discount_amt = $discount;
        $bill->discount_reason = $dis_reason;
        $bill->payment_mode = $paymentmode;
        $bill->bank_name = $bank;
        $bill->cheque_no = $chequeno;
        $bill->covers = $covers;
        $bill->save();
        //http://localhost:64913/AnantaraPrint/testing.aspx?id=1
        return view('bill.print_bill')->with(['items' => $order_desc, 'bill' => $bill]);
    }


    /***********Ordered Item*****************/
    public function ordered_item($id)
    {
        $sql = 'select * from order_descriptions where OID in (select oid from tbl_order where tbl_id="'.$id.'" and is_cancelled=0 and IsBill=0)';
        $bills = DB::select($sql);
        return view('waiter.order_item_list')->with(['bills' => $bills]);
    }
    /***********Ordered Item*****************/
}
