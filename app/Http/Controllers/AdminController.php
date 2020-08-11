<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Role;
use App\Agent;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:superadministrator');
    }


    public function index(){
        $users = User::all();
        return view('admin.index',['users'=>$users]);
    }

    public function show_user(){
        $users = User::whereHas('roles', function($q){$q->whereIn('display_name', ['user']);})->get();
        //$users = User::all();
        return view('admin.show-users',['users'=>$users,'count'=>1]);
    } 

    public function all_orders(){
        $orders = Order::all()->where('status','order placed');
        $agents = Agent::all()->where('status','active');
        return view('admin.all-orders',['orders'=>$orders,'agents'=>$agents,'count'=>1]);
    } 

    public function picked(){
        //$orders = Order::all()->where('status','picked');
        $orders = Order::where('status','picked')->whereNull('delivery_agent_id')->orderBy('delivery_date','ASC')->get();
        $agents = User::all();
        return view('admin.picked-orders',['orders'=>$orders,'agents'=>$agents,'count'=>1]);
    } 

    public function accepted(){
        $orders = Order::where('status','accepted')->whereNull('pickup_agent_id')->orderBy('pick_up_date','ASC')->get();
        $agents = User::all();

        return view('admin.accepted-orders',['orders'=>$orders,'agents'=>$agents,'count'=>1]);
    } 


    public function all_accepted(){
        $orders = Order::where('status','accepted')->orderBy('pick_up_date','ASC')->get();
        return view('admin.all-accepted-orders',['orders'=>$orders,'count'=>1]);
    }

    public function all_picked(){
        $orders = Order::where('status','picked')->orderBy('pick_up_date','ASC')->get();
        return view('admin.all-picked-orders',['orders'=>$orders,'count'=>1]);
    }

    public function delivered(){
        //$orders = Order::where('status','delivered')->where('bill_status','Due')->get();
        $orders = Order::all()->where('status','delivered');
        $agents = Agent::all();
        return view('admin.delivered-orders',['orders'=>$orders,'agents'=>$agents,'count'=>1]);
    } 


    public function returned(){
        //$orders = Order::where('status','returned')->where('bill_status','Due')->get();
        //$orders = Order::all()->where('status','returned');
        $orders = Order::all()->whereIn('status',['returned','rejected']);
        $agents = Agent::all();
        return view('admin.returned-orders',['orders'=>$orders,'agents'=>$agents,'count'=>1]);
    } 


    public function order_picked_assign(Request $request, $id){

        $inputs = $request->all();
        $agent = $inputs['agent_id'];
        $order = Order::find($id);
        $order->pickup_agent_id = $agent;
        $order->save();
        return redirect()->route('accepted')->with('message',$order->order_code.' has been successfully picked');
    } 

    public function order_accepted($id){
        $order = Order::find($id);
        $order->status = 'accepted';
        $order->save();
        return redirect()->route('all_orders')->with('message',$order->order_code.' has been successfully accepted');
    }

    public function order_rejected($id){
        $order = Order::find($id);
        $order->status = 'rejected';
        $order->save();
        return redirect()->route('all_orders')->with('message',$order->order_code.' has been successfully rejected');
    }

    public function order_delivery_assign(Request $request, $id){

        $inputs = $request->all();
        $agent = $inputs['agent_id'];
        $order = Order::find($id);
        $order->delivery_agent_id = $agent;
        $order->save();
        return redirect()->route('picked')->with('message',$order->order_code.' has been successfully Assigned');
        
    }   


    // public function order_returned(Request $request, $id){
    //     $order = Order::find($id);
    //     $order->status = 'returned';
    //     $order->save();
    //     return redirect()->route('order_returned_admin')->with('message',$order->order_code.' has been returned');
    // }


    public function payment_due(){
        //$orders = Order::all()->where('status','delivered');

        //$users = User::all();
        //$users = User::with('roles')->where('roles.name','=','user')->get();

        $users = User::whereHas(
            'roles', function($q){
                $q->where('name', 'user');
            }
        )->get();

        return view('admin.payment-due',['users'=>$users,'count'=>1]);
    }  


    public function pay_bill(Request $request, $id){
        $user = User::find($id);
        $orders = $user->orders()->whereIn('status',['delivered','returned'])->where('bill_status','Due')->get();
        //dd($orders);
        return view('admin.pay-bill',['orders'=>$orders,'user'=>$user,'count'=>1]);

    }


    public function status(Request $request, $id)
    {
        $data = User::find($id);

        if($data->status==0){ $data->status=1; }

        else{ $data->status=0; }
        
        $data->save();

        return redirect()->route('show_user')->with('message',$data->name.' Status has been changed successfully');
    }

    public function cash_memo(Request $request){

        $company_id = request('user_id');
        $user = User::find($company_id);
        $orders_seleted = request('choose');
        $delivery_charge = request('delivery_charge');
        $max = sizeof($orders_seleted);
        $all_orders = Order::find($orders_seleted);

        //dd($delivery_charge[0]);

        return view('admin.cash-memo',['orders'=>$all_orders,'user'=>$user,'count'=>0,'charges'=>$delivery_charge]);

    }
    
    
}
