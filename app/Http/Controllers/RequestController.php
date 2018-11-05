<?php

namespace App\Http\Controllers;

use App\ItemMaster;
use App\RequestDetails;
use App\RequestMaster;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index()
    {
        session_start();
        if ($_SESSION['user_master']->role_master_id == 3 || $_SESSION['user_master']->role_master_id == 1)
            return view('request.view_request_item')->with('requests', RequestMaster::getActiverequest());
        else
            return view('request.view_request_item')->with('requests', RequestMaster::getActiverequestByUser());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('request.create_request_item');
    }

    public function getAllProducts(Request $request, $id)
    {
        $items = ItemMaster::getProducts($request->term, $id);
        return response()->json($items);
    }


    public function store(Request $request)
    {
        session_start();
        $count = count($_POST["itemName"]);
        if ($count > 0) {
            try {
                $req = new RequestMaster();
                $req->description = request('material_description');
                $req->dept_request_by = $_SESSION['user_master']->role_master_id;
                $req->request_by = $_SESSION['user_master']->id;
                $req->save();
                $this->addNewRows($req->id, $count);
//                \Session::flash('success-msg', 'Successfully Added');
                return redirect('/request_item')->with('message', 'Request has been send...!');
            } catch (\Exception $e) {
                echo $e;
            }
        }
    }

    public function addNewRows($id, $count)
    {
        for ($i = 0; $i < $count; $i++) {
            if (trim($_POST["itemId"][$i]) != "") {
                $req_info = new RequestDetails();
                $req_info->request_master_id = $id;
                $req_info->item_id = $_POST["itemId"][$i];
                $req_info->qty = $_POST["quantity"][$i];
                $req_info->save();
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
        $requests = RequestDetails::where(['request_master_id' => $id])->get();
        return view('request.request_item_list')->with(['requests' => $requests]);
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

    public
    function accept($id)
    {
        $request = RequestMaster::find($id);
        return view('request.accept_request')->with(['request' => $request]);
    }

    public
    function acceptConfirm($id)
    {
        session_start();
        $reque = RequestMaster::find($id);
        $reque->status_id = 2;
        $reque->accept_by =  $_SESSION['user_master']->id;
        $reque->reason .= "<br/><b>Accepted By " . $_SESSION['user_master']->name . ": " . Carbon::now()->format('d-m-Y h:m:s') . "</b><br/>" . request('reason');
        $reque->save();
        return redirect('/request_item')->with('message', 'Request has been accepted...!');
    }

    public
    function reject($id)
    {
        $request = RequestMaster::find($id);
        return view('request.accept_request')->with(['request' => $request]);
    }

    public
    function rejectConfirm($id)
    {
        session_start();
        $reque = RequestMaster::find($id);
        $reque->status_id = 3;
        $reque->reject_by =  $_SESSION['user_master']->id;
        $reque->reason .= "<br/><b>Rejected By " . $_SESSION['user_master']->name . ": " . Carbon::now()->format('d-m-Y h:m:s') . "</b><br/>" . request('reason');
        $reque->save();
        return redirect('/request_item')->with('message', 'Request has been accepted...!');
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
