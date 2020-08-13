<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/run', function () {
    //echo 'test';
    $exitCode = Artisan::call('migrate');
    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user', 'UserController@index')->name('user');
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/agent', 'AgentController@index')->name('agent');

Route::get('/admin/show_user', 'AdminController@show_user')->name('show_user');

//Route::get('/status/{id}', 'HomeController@status')->name('status');

Route::get('/status/{id}', 'AdminController@status')->name('status');

Route::get('/company_detail/{id}', 'AdminController@company_detail')->name('company_detail');



// Route::patch('/order_picked/{id}', 'AdminController@order_picked')->name('order_picked');
 Route::patch('/order/pick/assign/{id}', 'AdminController@order_picked_assign')->name('order_picked_assign');

// Route::patch('/delivered/{id}', 'AdminController@order_delivered')->name('order_delivered');

Route::patch('/delivery-agent/assign/{id}', 'AdminController@order_delivery_assign')->name('order_delivery_assign');

// Route::get('/returned/{id}', 'AdminController@order_returned')->name('order_returned');

Route::get('/returned_orders', 'AdminController@returned')->name('order_returned_admin');

Route::get('/order/placed', 'UserController@placed')->name('placed');

Route::get('/user/company', 'UserController@company')->name('my_company');


Route::patch('user/company/update/{id}', 'UserController@company_update')->name('company.update');

Route::get('/order/placed/edit/{id}', 'UserController@edit')->name('order.edit');

Route::patch('/order/placed/edit/{id}', 'UserController@update')->name('order.update');

Route::get('/order/running', 'UserController@running')->name('running');
Route::get('/order/returned', 'UserController@returned')->name('returned');

Route::get('/order/user_delivered', 'UserController@user_delivered')->name('user_delivered');
Route::get('/order/user_completed', 'UserController@user_completed')->name('user_completed');



Route::get('/order/create', 'UserController@create')->name('create');

Route::get('/order/create/bulk', 'UserController@create_bulk')->name('create.bulk');

Route::post('/order/store', 'UserController@store')->name('store');

Route::post('/order/store-bulk', 'UserController@store_bulk')->name('store-bulk');

Route::get('/order/options', function () {
    return view('user.order-option');
})->name('choose-create')->middleware('auth');


Route::get('/order/all', 'AdminController@all_orders')->name('all_orders');

Route::get('/order/picked', 'AdminController@picked')->name('picked');

Route::get('/order/running/all', 'AdminController@order_running')->name('order_running');

Route::get('/order/all/accepted', 'AdminController@all_accepted')->name('parcel.accepted');

Route::get('/order/all/picked', 'AdminController@all_picked')->name('parcel.picked');

Route::get('/order/accepted', 'AdminController@accepted')->name('accepted');

Route::get('/order/order_accepted/{id}', 'AdminController@order_accepted')->name('order_accepted');

Route::get('/order/order_rejected/{id}', 'AdminController@order_rejected')->name('order_rejected');

Route::get('/order/delivered', 'AdminController@delivered')->name('delivered');

Route::get('/order/payment_due', 'AdminController@payment_due')->name('payment_due');

Route::get('/order/pay_bill/{id}', 'AdminController@pay_bill')->name('pay_bill');

Route::post('/order/cash_memo', 'AdminController@cash_memo')->name('cash_memo');

Route::get('/all-delivery-agents', 'DeliveryController@index')->name('all_agents');

Route::get('/create-delivery-agents', 'DeliveryController@create')->name('create_all_agents');

Route::post('/delivery-agents/store', 'DeliveryController@store')->name('agents.store');

Route::get('/delivery-agents/edit/{id}', 'DeliveryController@edit')->name('agents.edit');

Route::patch('/delivery-agents/update/{id}', 'DeliveryController@update')->name('agents.update');


Route::post('/order/invoice', 'InvoiceController@store')->name('invoice');

Route::get('/order/paid', 'InvoiceController@paid_orders')->name('paid_orders');

Route::get('/order/view/invoice/{memo}', 'InvoiceController@view_invoice')->name('view.invoice');

Route::get('user/order/view/invoice/{memo}', 'UserController@view_invoice')->name('show.invoice');


Route::get('/agent/orders-to-pick', 'AgentController@order_to_pick')->name('order_to_pick');

Route::get('/agent/order-to-deliver', 'AgentController@order_to_deliver')->name('order_to_deliver');

Route::get('/agent/all-picked-orders', 'AgentController@all_picked_orders')->name('all_picked_orders');

Route::get('/agent/all-delivered-orders', 'AgentController@all_delivered_orders')->name('all_delivered_orders');

Route::get('/agent/all-returned-orders', 'AgentController@all_returned_orders')->name('all_returned_orders');

Route::get('/agent/profile', 'AgentController@agent_profile')->name('agent_profile');


Route::patch('/delivery-agents/profile/update/{id}', 'AgentController@update')->name('agents_update');
Route::patch('/delivered/{id}', 'AgentController@order_delivered')->name('order_delivered');
Route::patch('/order_picked/{id}', 'AgentController@order_picked')->name('order_picked');

