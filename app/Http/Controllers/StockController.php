<?php

namespace App\Http\Controllers;

use App\Item_MasterModel;
use App\ItemMaster;
use App\StockDetails;
use App\StockMaster;
use App\SupplierModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('stock.view_stock')->with('stocks', StockMaster::getActiveStock());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stock_no = rand(100000, 999999);
//        $suppliers = SupplierMaster::get();
        $suppliers = SupplierModel::getSupplierDropdown();
        return view('stock.create_stock')->with(['stock_no' => $stock_no, 'suppliers' => $suppliers]);
    }

    public function getAllProducts(Request $request, $id)
    {
//        print_r($request);
//        echo $request->term;
        $items = ItemMaster::getProducts($request->term, $id);
        return response()->json($items);
    }


    public function store(Request $request)
    {
//        $validator = Validator::make($request->all(), [
//            'date' => 'required',
//            'supplier' => 'required',
//
//        ]);
//
//        if ($validator->fails()) {
//            return redirect('/administrator/create_stock')
//                ->withErrors($validator)
//                ->withInput();
//        }

        $count = count($_POST["itemName"]);
        if ($count > 0) {
            try {
                $stock = new StockMaster();
                $stock->stock_no = request('stock_no');
                if (request('bill_no') != null) {
                    $stock->bill_no = request('bill_no');
                    $stock->bill_date = Carbon::parse(request('date'))->format('Y-m-d');
                } else {
                    $stock->challan_no = request('challan_no');
                    $stock->challan_date = Carbon::parse(request('date'))->format('Y-m-d');
                }
                $stock->supplier_id = request('supplier_id');
                $stock->description = request('material_description');
                $stock->total_amount = request('quotAmt');
                $stock->save();
                $this->addNewRows($stock->id, $count);
//                \Session::flash('success-msg', 'Successfully Added');
                return redirect('/stock')->with('message', 'Stock has been added...!');
            } catch (\Exception $e) {
                echo $e;
            }
        }
    }

    public function addNewRows($id, $count)
    {
        for ($i = 0; $i < $count; $i++) {
            if (trim($_POST["itemRate"][$i]) != "") {
                $stock_info = new StockDetails();
                $stock_info->stock_id = $id;
                $stock_info->item_id = $_POST["itemId"][$i];
                $stock_info->rate = $_POST["itemRate"][$i];
                $stock_info->qty = $_POST["quantity"][$i];
                $stock_info->gst_per = $_POST["itemGst"][$i];
                $stock_info->gst_amt = $_POST["itemGstAmt"][$i];
                $stock_info->amount = $_POST["itemAmount"][$i];
                $stock_info->purchase_amount = 0;
                $stock_info->save();

                $item = Item_MasterModel::find($stock_info->item_id);
                $item->available_qty += $stock_info->qty;
                $item->save();
            }
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
    {
        $stocks = StockDetails::where(['stock_id' => $id])->get();
        $stockmain = StockMaster::find($id);
        return view('stock.stock_list')->with(['stocks' => $stocks, 'qtns' => $stockmain->supplier->state_id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        //
    }
}
