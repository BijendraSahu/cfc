<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/***********************Custom Route********************************/
Route::get('/', function () {
    return view('login');
});

//Route::GET('logout', function () {
//    session_start();
//
//    $_SESSION['user_master'] = null;
//    return redirect('/');
//});
Route::GET('logout', 'LoginMasterController@logout');
Route::GET('logout', 'LoginMasterController@logout');

Route::GET('wlogout', function () {
    session_start();
    $_SESSION['user_master'] = null;
    return redirect('/waiter');
});

Route::GET('change_password', function () {
    return view('change_password');
});
Route::POST('reset_password', 'LoginMasterController@reset_password');
Route::GET('user_master/{id}/resetPassword', 'LoginMasterController@reset');
Route::POST('change_password', 'LoginMasterController@change_password');
Route::post('login_user', 'LoginMasterController@store');
Route::GET('dashboard', 'LoginMasterController@login_user');

/***********************Custom Route********************************/

/****************************Crud Route******************************/
Route::resource('home', 'LoginMasterController');
Route::resource('user_master', 'UserMasterController');
Route::resource('Unit', 'unitcontroller');
Route::resource('ItemCat', 'ItemCategoryController');
Route::resource('Tbl', 'Tbl_TableController');
Route::resource('EMPTYPE', 'EmployeeTypeController');
Route::resource('MCATE', 'Menu_CategoryController');
Route::resource('subcategory', 'MenuSubCategoryController');
Route::resource('Menu', 'Menu_ItemComtroller');
Route::resource('Item', 'ItemMasterController');
Route::resource('Ingredient', 'MenuIngredientController');
Route::resource('Employee', 'Employeecontroller');
Route::resource('Supplier', 'SupplierController');
Route::resource('registration', 'RegistrationController');
Route::resource('stock', 'StockController');
Route::resource('issue', 'IssueController');
Route::resource('request_item', 'RequestController');

Route::get('getSubCategory', 'Menu_ItemComtroller@getSubCategory');

/****************************Crud Route******************************/

/****************************Request Accept/Reject********************************/
Route::get('request/{id}/accept', 'RequestController@accept');
Route::post('request/{id}/accept', 'RequestController@acceptConfirm');
Route::get('request/{id}/reject', 'RequestController@reject');
Route::post('request/{id}/reject', 'RequestController@rejectConfirm');
/****************************Request Accept/Reject********************************/

/*****************Barcode Entry*************/
Route::get('barcode/{id}', 'RegistrationController@print_barcode');
Route::get('gpdetail/{id}', 'StockController@getAllProducts');
/*****************Barcode Entry*************/

Route::get('waiter', 'LoginMasterController@waiter');
Route::get('waiter/{id}/login', 'LoginMasterController@showlogin');
Route::get('table/{slud}/{id}', 'TableBookingController@showtables');
Route::get('menu/{filter}/filter', 'TableBookingController@getFilteredIndex');
Route::get('menu/{id}/qty/{qty}', 'TableBookingController@cart');
Route::GET('menuupdate/{id}/qty/{qty}', 'TableBookingController@cartupdate');
Route::get('booked_item', 'TableBookingController@cartload');
Route::get('cart_delete/{id}', 'TableBookingController@delete');
Route::post('cart_update/{id}', 'TableBookingController@update');

Route::get('cartempty', 'TableBookingController@cartempty');


/********delete Route***********/
Route::get('user_master/{id}/delete', 'UserMasterController@destroy');
Route::get('user_master/{id}/activate', 'UserMasterController@activate');
Route::get('Unit/{id}/delete', 'unitcontroller@destroy');
Route::get('ItemCat/{id}/delete', 'ItemCategoryController@destroy');
Route::get('Tbl/{id}/delete', 'Tbl_TableController@destroy');
Route::get('EMPTYPE/{id}/delete', 'EmployeeTypeController@destroy');
Route::get('MCATE/{id}/delete', 'Menu_CategoryController@destroy');
Route::get('subcategory/{id}/delete', 'MenuSubCategoryController@destroy');
Route::get('Menu/{id}/delete', 'Menu_ItemComtroller@destroy');
Route::get('Item/{id}/delete', 'ItemMasterController@destroy');
Route::get('Ingredient/{id}/delete', 'MenuIngredientController@destroy');
Route::get('Supplier/{id}/delete', 'SupplierController@destroy');
Route::get('Employee/{id}/delete', 'Employeecontroller@destroy');
Route::get('registration/{id}/delete', 'RegistrationController@destroy');
Route::get('registration/{id}/scan', 'RegistrationController@scan');
/********delete Route***********/

/********Order***********/
Route::get('order', 'OrderController@order_list');
Route::get('orders', 'OrderController@orders');
Route::get('order/{id}/complete', 'OrderController@complete');


Route::get('getorder', 'OrderController@get_order');
Route::POST('kot/{filter}/filter', 'OrderController@getKotItem');
Route::get('order_item/{id}/edit', 'OrderController@editKotItem');
Route::POST('order_item/{id}/update', 'OrderController@update_order_item');


Route::get('order_item/{id}/cancel', 'OrderController@cancel_order_item_get');
Route::post('order_item/{id}/cancel', 'OrderController@cancel_order_item');
Route::get('order_item/{id}/complementary', 'OrderController@get_order_complementary');
Route::post('order_item/{id}/complementary', 'OrderController@order_complementary');


/********Order***********/


/********Report***********/
Route::get('stocklist', 'ReportController@stocklist');
//Route::get('sale_report', 'ReportController@sale_report');
Route::get('sale_report', 'ReportController@all_sale_report');
Route::post('search_sale', 'ReportController@search_sale');
Route::get('reports', 'LoginMasterController@reports');
/********Report***********/

Route::post('confirm_order/{id}', 'TableBookingController@confirm_order');
Route::get('getbill', 'TableBookingController@get_bill');
Route::POST('bill/{filter}/filter', 'TableBookingController@getBillingItem');
Route::post('print_bill', 'TableBookingController@print_bill');
Route::get('bill/{id}/print', 'BillController@print_bill');
Route::resource('bill_list', 'BillController');

Route::get('finalbill', 'TableBookingController@final_bill');
Route::post('finalprint_bill', 'TableBookingController@final_print_bill');
Route::POST('finalbill/{filter}/filter', 'TableBookingController@finalBillingItem');

Route::get('settle_bill/{id}', 'BillController@settle_bill');


Route::get('tablelist', 'LoginMasterController@tablelist');

Route::GET('kot', function () {
    return view('PrintKOT.printkot');
});


Route::get('userorder/{id}/item', 'TableBookingController@ordered_item');

//*************17_03 Bijendra

/********Table Settlement******/
Route::get('table_settle', 'TableBookingController@table_settle');
Route::post('table_settle', 'TableBookingController@submit_table_settle');
/********Table Settlement******/


/********Bill Settlement******/
Route::get('settle_bill/{id}', 'TableBookingController@settle_bill');
Route::post('settle_bill/{id}', 'TableBookingController@submit_settle_bill');
/********Bill Settlement******/

/********shift Settlement******/
Route::get('shift', 'TableBookingController@shift');
Route::post('shift', 'TableBookingController@shiftpost');
/********shift Settlement******/

/**********Sattled Bill****************/
Route::get('billst', 'BillController@sattlebill');
Route::post('search_sattledbill', 'ReportController@search_SattledBill');
/**********Sattled Bill****************/
