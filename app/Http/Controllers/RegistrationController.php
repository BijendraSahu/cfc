<?php

namespace App\Http\Controllers;

use App\CashRegistration;
use App\RegistrationDetails;
use App\RegistrationMaster;
use Faker\Provider\cs_CZ\DateTime;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

session_start();

class RegistrationController extends Controller
{
    public function index()
    {
        return view('registration.view_reg')->with('registrations', RegistrationMaster::getActiveRegMaster());
    }

    public function create()
    {
        $reg_no = RegistrationMaster::GenerateRegNumber();
        return view('registration.create_reg')->with(['reg_no' => $reg_no]);
    }

    public function store(Request $request)
    {
//        $dt = Carbon::now();
//        $new_str = str_replace('-', '', Carbon::parse($dt)->format('d-m-Y'));

//        echo $dt . "<br>" . $new_str;
        $user = $_SESSION['user_master'];
        $reg = new RegistrationMaster();
        $reg->Name = request('name');
        $reg->Contact_No = request('contact');
        $reg->EmailId = request('email');
        $reg->Addr = request('address');
        $reg->Gender = request('gender');
        $reg->reg_full = request('full_reg_no');
        $reg->type = request('Type');
        $reg->total_amount = request('amount');
        $reg->Paymode = request('mode_of_payment');
        $reg->InsertedBy = $user->id;
        $reg->save();

        $dt = Carbon::now();
        $new_str = str_replace('-', '', Carbon::parse($dt)->format('d-m-Y'));

        $reg_det = new RegistrationDetails();
        $reg_det->Regid = $reg->Regid;
        $reg_det->Barcode = "aura" . $reg->Regid . $new_str;
        $reg_det->Fees = request('amount');
        $reg_det->InsertedBy = $user->id;
//        $reg_det->RegDate = request('reg_date');
//        $reg_det->C_Status =0;
        $reg_det->save();

        $cashreg = new CashRegistration();
        $cashreg->RecieptNo = $reg->Regid;
        $cashreg->Amount = request('amount');
        $cashreg->Paymode = request('mode_of_payment');
        if ($cashreg->Paymode == "Cheque") {
            $cashreg->CHNO = request('cheque_no');
            $cashreg->CHDate = Carbon::parse(request('payment_date'))->format('Y-m-d');
            $cashreg->Bank = request('bank_name');
        }
        $cashreg->PaymentDate = Carbon::parse(request('payment_date'))->format('Y-m-d');
        $cashreg->InsertedBy = $user->id;
        $cashreg->save();

        return redirect('registration')->with('message', 'Registration has been successful...!');
    }

    public function print_barcode($id)
    {
        $reg = RegistrationDetails::where(['RegId' => $id])->first();
        if ($reg->C_Status == 0)
            return view('registration.print_barcode')->with(['reg' => $reg->Barcode]);
        else
            return view('registration.print_barcode')->with(['reg' => null]);
    }

    public function edit($id)
    {
        $reg = RegistrationMaster::find($id);
        return view('registration.edit_reg')->with(['reg' => $reg]);
    }

    public function update($id, Request $request)
    {
        $reg = RegistrationMaster::find($id);
        $reg->Name = request('name');
        $reg->Contact_No = request('contact');
        $reg->EmailId = request('email');
        $reg->Addr = request('address');
        $reg->Gender = request('gender');
        $reg->save();
        return redirect('registration')->with('message', 'Registration has been updated...!');
    }

    public function destroy($id)
    {
        $user = $_SESSION['user_master'];
        $user_master = RegistrationMaster::find($id);
        $user_master->Isdeleted = 1;
        $user_master->DeletedBy = $user->id;
        $user_master->save();
        return redirect('registration')->with('message', 'Registration has been deleted...!');
    }

    public function scan($id)
    {
        $reg = RegistrationDetails::where(['RegId' => $id])->first();
        $reg->C_Status = 1;
        $reg->save();
        return redirect('registration')->with('message', 'Registration has been scanned...!');
    }

    public function barcode()
    {
        return view('registration.barcode');
    }
//
}
