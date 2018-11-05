<?php

namespace App\Http\Controllers;

use App\Bill;
use App\BillDetails;
use App\UserMaster;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

session_start();

class BillController extends Controller
{
	public function index()
	{
		//$startdt = Carbon::parse(Carbon::now())->format('Y-m-d');
		$user = UserMaster::find($_SESSION['user_master']->id);
		$startdt = Carbon::parse($user->opening_date)->format('Y-m-d');
		$enddt = Carbon::parse(Carbon::now()->addDay(1))->format('Y-m-d');
		$bills = DB::select("select id, bill_no,bill_date,grand_total,total_amt,stevard,table_no,is_settle,InsertedDate, payment_mode,is_free from bill where opening_date BETWEEN '$startdt' and '$enddt' and Isdeleted=0 ORDER by bill_date DESC");
		return view('bill.view_bill')->with('bills', $bills);
	}

    public function print_bill($bill_id)
    {
        $bill = Bill::find($bill_id);
        $bill_desc = BillDetails::where(['bill_id' => $bill_id])->get();
//        $bill_desc = DB::select("select m_name,sum(qty) as qty,price,sum(total) as ttl FROM bill_details WHERE bill_id=$bill_id GROUP BY m_name");
        $bill_desc_dis = DB::table('bill_details')->selectRaw('m_name, sum(qty) as qty, price,sum(total) as total')->where('bill_id', $bill_id)->groupBy('m_name', 'price')->get();
//        $bill_desc_dis = DB::table('bill_details')->selectRaw('MID, m_name, sum(qty) as qty, price,sum(total) as total')->where('bill_id', $bill_id)->groupBy('m_name','MID', 'price')->get();
//        echo json_encode($bill_desc);

//        $data = DB::table("click")->select(DB::raw("SUM(numberofclick) as count"))->orderBy("created_at")->groupBy(DB::raw("year(created_at)"))->get();
//        print_r($data);
        return view('bill.print_bill_bill')->with(['items' => $bill_desc_dis, 'bill_desc' => $bill_desc, 'bill' => $bill]);
    }

    public function settle_bill($bill_id)
    {
        $bill = Bill::find($bill_id);
        $bill_desc = BillDetails::where(['bill_id' => $bill_id])->get();
        return view('bill.print_bill_bill')->with(['items' => $bill_desc, 'bill' => $bill]);
    }

    public function sattlebill()
    {
        //$fromdate = Carbon::parse($startdt)->format('Y-m-d');
       //$todate = Carbon::parse($enddt)->format('Y-m-d');
       // $bills = DB::select("select id,bill_no,bill_date,payable_amt,discount_type,discount_amt,discount_reason,payment_mode,cash_amount,card_amt from bill where opening_date BETWEEN '$fromdate' and '$todate' and is_settle=1 and Isdeleted=0 and is_free=0");
        return view('report.sattlebill');
    }
}
