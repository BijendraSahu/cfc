<?php

namespace App\Http\Controllers;

use App\MenuCategory;
use App\MenuSubCategory;
use App\Tbl_Table;
use App\UserMaster;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

session_start();

class LoginMasterController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function store()
    {
        $username = request('username');
        $password = request('password');
        $user = UserMaster::where(['is_active' => 1, 'username' => $username, 'password' => md5($password)])->first();
        if ($user != null) {
            $_SESSION['user_master'] = $user;
            $temp_user = UserMaster::find($user->id);
            $temp_user->last_login = Carbon::now();
//            if ($temp_user->opening_date == null)
//                $temp_user->opening_date = Carbon::now();
            $temp_user->save();
            return redirect('dashboard');
        } else
            return Redirect::back()->withInput()->withErrors(array('message' => 'UserName or password Invalid'));

    }

    public function login_user()
    {
        if (isset($_SESSION['user_master'])) {
            $user = $_SESSION['user_master'];
            $tbls = Tbl_Table::where(['Isdeleted' => 0])->get();
            $menucat = MenuCategory::where(['Isdeleted' => 0])->get();
            $menusub = MenuSubCategory::where(['Isdeleted' => 0])->get();
            if ($user->role_master_id === 1) { //Admin
                return view('dashboard.admin')->with('user_master', $user);
            } else if ($user->role_master_id === 2) { //Accounts
                return view('dashboard.manager')->with('user_master', $user);
            } else if ($user->role_master_id === 3) { //Store
                return view('dashboard.store')->with(['user_master' => $user]);
            } else if ($user->role_master_id === 4) { //Kitchen
                return view('dashboard.kitchen')->with(['user_master' => $user]);
            } else if ($user->role_master_id === 5) {  //Bar
                return view('dashboard.bar')->with(['user_master' => $user, 'tbls' => $tbls]);
            } else if ($user->role_master_id === 6) {  //Receptionist
                return view('waiter.waiter_table_list')->with(['user_master' => $user, 'tbls' => $tbls]);
            }
        }
        return redirect('/');
    }

    public function tablelist()
    {
        if (isset($_SESSION['user_master'])) {
            $user = $_SESSION['user_master'];
            $tbls = Tbl_Table::where(['Isdeleted' => 0])->get();
            return view('waiter.waiter_table_list')->with(['user_master' => $user, 'tbls' => $tbls]);
        }
        return redirect('/');
    }

    public function change_password()
    {
        $curr_pass = $_SESSION['user_master']->password;
        if (md5(request('current_password')) == $curr_pass) {
            if (request('new_password') == request('confirm_password')) {
                $user = UserMaster::find($_SESSION['user_master']->id);
                $user->password = md5(request('new_password'));
                $user->save();
                $_SESSION['user_master'] = $user;
                return redirect('change_password')->withErrors(array('message' => 'Password changed successfully.'));
            } else
                return redirect('change_password')->withInput()->withErrors(array('message' => 'Passwords mismatch'));
        } else
            return redirect('change_password')->withInput()->withErrors(array('message' => 'Incorrect current password'));
    }

    public function reports()
    {
        $user = $_SESSION['user_master'];
        return view('report.report_list')->with(['user_master' => $user]);
    }

    public function reset($id)
    {
        return view('user.reset_password')->with(['user_master_id' => $id]);
    }

    public function reset_password()
    {
        if (request('new_password') == request('confirm_password')) {
            $user = UserMaster::find(request('user_id'));
            $user->password = md5(request('new_password'));
            $user->save();
//            $_SESSION['user_master'] = $user;
            return redirect()->back()->with('message', 'Password has been reset successfully...!');
        } else
            return redirect('user_master')->withInput()->withErrors(array('message' => 'Passwords mismatch'));
    }

    public function waiter()
    {
        $users = UserMaster::where(['is_active' => 1, 'role_master_id' => 6])->get();
        return view('waiter.waiter_login')->with(['users' => $users]);
    }

    public function showlogin($id)
    {
        $user = UserMaster::find($id);
        return view('waiter.waiter_modal')->with(['user' => $user]);
    }

    public function logout()
    {
//        $user = UserMaster::find($_SESSION['user_master']->id);
//        $user->opening_date = null;
//        $user->save();
        $_SESSION['user_master'] = null;
        return redirect('/');
    }
}
