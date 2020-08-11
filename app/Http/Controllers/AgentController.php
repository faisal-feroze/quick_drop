<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Role;
use App\Agent;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:agent');
    }

    public function index(){
        // $users = User::all();
        return view('delivery_agent.index');
    }

    public function order_to_pick(){
        $agent_id = Auth::user()->id;
        $orders = Order::where('status','accepted')->where('pickup_agent_id',$agent_id)->orderBy('pick_up_date','ASC')->get();
        //$agents = Agent::all();
        //return view('admin.accepted-orders',['orders'=>$orders,'agents'=>$agents,'count'=>1]);
        return view('delivery_agent.order-to-pick',['orders'=>$orders,'count'=>1]);
    }

    public function all_picked_orders(){
        $agent_id = Auth::user()->id;
        $orders = Order::where('status','picked')->where('pickup_agent_id',$agent_id)->orderBy('pick_up_date','ASC')->get();
        //$agents = Agent::all();
        //return view('admin.accepted-orders',['orders'=>$orders,'agents'=>$agents,'count'=>1]);
        return view('delivery_agent.all-picked-orders',['orders'=>$orders,'count'=>1]);
    }

    public function all_delivered_orders(){
        $agent_id = Auth::user()->id;
        $orders = Order::where('status','delivered')->where('pickup_agent_id',$agent_id)->orderBy('delivery_date','ASC')->get();
        //$agents = Agent::all();
        //return view('admin.accepted-orders',['orders'=>$orders,'agents'=>$agents,'count'=>1]);
        return view('delivery_agent.all-delivered-orders',['orders'=>$orders,'count'=>1]);
    }

    public function all_returned_orders(){
        $agent_id = Auth::user()->id;
        $orders = Order::where('status','returned')->where('pickup_agent_id',$agent_id)->orderBy('delivery_date','ASC')->get();
        //$agents = Agent::all();
        //return view('admin.accepted-orders',['orders'=>$orders,'agents'=>$agents,'count'=>1]);
        return view('delivery_agent.all-returned-orders',['orders'=>$orders,'count'=>1]);
    }


    public function order_picked(Request $request, $id){

        $inputs = $request->all();
        // $agent = $inputs['agent_id'];
        $order = Order::find($id);
        $order->status = 'picked';
        // $order->pickup_agent_id = $agent;
        $order->save();
        return redirect()->route('order_to_pick')->with('message',$order->order_code.' has been successfully picked');
    } 


    public function order_to_deliver(){
        $agent_id = Auth::user()->id;
        $orders = Order::where('status','picked')->where('delivery_agent_id',$agent_id)->orderBy('delivery_date','ASC')->get();
        //$agents = Agent::all();
        //return view('admin.accepted-orders',['orders'=>$orders,'agents'=>$agents,'count'=>1]);
        return view('delivery_agent.order-to-deliver',['orders'=>$orders,'count'=>1]);
    }

    public function order_delivered(Request $request, $id){

        $inputs = $request->all();
        // $agent = $inputs['agent_id'];
        $after_picked = $inputs['after_picked'];
        $order = Order::find($id);
        $order->status = $after_picked;
        // $order->delivery_agent_id = $agent;
        $order->save();
        
        return redirect()->route('order_to_deliver')->with('message',$order->order_code.' has been successfully delivered');
        
        
    }   

    public function agent_profile(){
        $agent_id = Auth::user()->id;
        $agent = User::find($agent_id);
        return view('delivery_agent.agent-profile',['agent'=>$agent]);
    }

    public function update(Request $request, $id){
        $inputs = $request->all();
        $agent = User::find($id);
        $agent->update($inputs);
        session()->flash('message','Profile is Updated');
        return redirect()->route('agent_profile');
    }



    

    


    


    


}
