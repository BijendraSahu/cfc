<?php

namespace App\Http\Controllers;

use App\Order;
use App\Tbl_Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function order_list()
    {
        return view('order.view_order')->with('orders', Order::GetActiveOrder()); //order - is order description
    }

    public function get_order()
    {
        $booked_table = Tbl_Table::getTableDropdown();
        return view('order.order_list')->with(['booked_tables' => $booked_table]);
    }

    public function getKotItem($id)
    {
        $sql = 'select * from order_descriptions where OID in (select oid from tbl_order where tbl_id="' . $id . '" and IsBill=0 and is_cancelled = 0)';
        $order_items = DB::select($sql);
        return view('order.order_item_list')->with(['order_items' => $order_items]);
    }

    public function editKotItem($id)
    {
        $order_item = Order::find($id);
        return view('order.edit_order_item')->with(['order_item' => $order_item]);
    }

    public function update_order_item($id)
    {
        $order_item = Order::find($id);
        $order_item->qty = request('qty');
        $order_item->total = $order_item->price * request('qty');
        $order_item->save();
        return redirect('getorder')->with('message', 'Quantity has been changed...!');
    }

    public function cancel_order_item_get($id)
    {
        $order_item = Order::find($id);
        return view('order.cancel_order')->with(['order_item' => $order_item]);
    }

    public function cancel_order_item($id)
    {
//        echo  request('rmk');
        $Cate = Order::find($id);
        $Cate->is_cancelled = 1;
        $Cate->kot_remark = request('rmk');
        $Cate->save();
        return redirect('http://192.168.1.3:93/CancelKOT.aspx?id=' . $id);
    }

    public function get_order_complementary($id)
    {
        $order_item = Order::find($id);
        return view('order.complementary')->with(['order_item' => $order_item]);
    }

    public function order_complementary($id)
    {
        $Cate = Order::find($id);
        $Cate->is_complementary = 1;
        $Cate->complementary_reason = request('c_reason');
        $Cate->total = 0;
        $Cate->price = 0;
        $Cate->save();
        return redirect('getorder')->with('message', 'Order has been mark as Complementary...!');
    }

    public function complete($id)
    {
        $Cate = Order::find($id);
        $Cate->is_ready = 1;
        $Cate->save();
        return redirect('order')->with('message', 'Menu has been mark as Completed...!');
    }
}
