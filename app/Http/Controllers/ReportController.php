<?php

namespace App\Http\Controllers;

use App\Item_MasterModel;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ReportController extends Controller
{
    public function stocklist()
    {
        $stocks = Item_MasterModel::GetActiveItemMaster();
//        echo json_encode($stocks);
        return view('report.stock_report')->with(['stocks' => $stocks]);
    }

    public function sale_report()
    {
        $orders = Order::GetActiveSale();
//        echo json_encode($stocks);
        return view('report.today_sale')->with(['orders' => $orders]);
    }

    public function all_sale_report()
    {
//        $orders = Order::GetActiveSale();
//        echo json_encode($stocks);
        return view('report.all_sale');
    }

    public function search_sale()
    {
        $start = Carbon::parse(request('start'))->format('Y-m-d');
        $end = Carbon::parse(request('end'))->format('Y-m-d');
        $sql = 'SELECT * FROM order_descriptions WHERE Isdeleted=0 and IsBill=1 and  order_date >=  "'.$start.'" and order_date <= "'.$end.'"';
        $orders = DB::select($sql);
        return view('report.sale_list')->with(['orders' => $orders]);
    }

    public function search_SattledBill()
    {
        $start = Carbon::parse(request('start'))->format('Y-m-d');
        $end = Carbon::parse(request('end'))->format('Y-m-d');

        $orders = $bills = DB::select("select id,bill_no,bill_date,payable_amt,discount_type,discount_amt,discount_reason,payment_mode,cash_amount,card_amt from bill where opening_date BETWEEN '$start' and '$end' and is_settle=1 and Isdeleted=0 and is_free=0");
        return view('report.sattlebill_list')->with(['orders' => $orders]);
    }

}
