<?php

namespace App\Http\Controllers;

use App\Item_MasterModel;
use App\DepartmentModel;
use App\IssueDetailsModel;
use App\IssueModel;
use App\ItemMaster;
use Carbon\Carbon;
use Illuminate\Http\Request;

session_start();

class IssueController extends Controller
{
    public function index()
    {
        if ($_SESSION['user_master']->role_master_id == 3 || $_SESSION['user_master']->role_master_id == 1)
            return view('issue.view_issueitem')->with('issues', IssueModel::getActiveIssues());
        else
            return view('issue.view_issueitem')->with('issues', IssueModel::getActiveIssuesByUser());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $issue_no = rand(100000, 999999);
//        $suppliers = SupplierMaster::get();
        $depts = DepartmentModel::getDeptDropdown();
        return view('issue.issue_item')->with(['issue_no' => $issue_no, 'department' => $depts]);
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
                $issue = new IssueModel();
                $issue->issue_no = request('issue_no');
                $issue->description = request('material_description');
                $issue->issue_dept_id = request('department_id');
                $issue->issue_date = Carbon::parse(request('issue_date'))->format('Y-m-d');
                $issue->issue_by = $_SESSION['user_master']->id;
                $issue->save();
                $this->addNewRows($issue->id, $count);
//                \Session::flash('success-msg', 'Successfully Added');
                return redirect('/issue')->with('message', 'Item has been issue...!');
            } catch (\Exception $e) {
                echo $e;
            }
        }
    }

    public function addNewRows($id, $count)
    {
        for ($i = 0; $i < $count; $i++) {
            if (trim($_POST["itemId"][$i]) != "") {
                $issue_info = new IssueDetailsModel();
                $issue_info->issue_id = $id;
                $issue_info->item_id = $_POST["itemId"][$i];
                $issue_info->qty = $_POST["quantity"][$i];
                $issue_info->save();

                $item = Item_MasterModel::find($issue_info->item_id);
                $item->issue_qty += $issue_info->qty;
                $item->available_qty -= $issue_info->qty;
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
        $issues = IssueDetailsModel::where(['issue_id' => $id])->get();
        return view('issue.issue_item_list')->with(['issues' => $issues]);
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
