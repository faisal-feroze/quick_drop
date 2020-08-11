<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agent;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;

class DeliveryController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:superadministrator');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = User::whereHas('roles', function($q){$q->whereIn('display_name', ['agent']);})->get();

        return view('agent.all-agents',['agents'=>$agents,'count'=>1]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agent.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        // Agent::create($inputs);
        // session()->flash('post-created-message','New Post is Created');
        // return redirect()->route('all_agents');

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = User::create([
            'name' => $inputs['name'],
            'email' => $inputs['email'],
            'password' => Hash::make($inputs['password']),
            'status' => $inputs['status'],
            'phone' => $inputs['phone'],
            'address' => $inputs['address'],
        ]);
        $user->attachRole('agent');
        return redirect()->route('all_agents');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        //return view('blog-post', ['post'=> $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agent = User::find($id);
        return view('agent.edit-agents',['agent'=>$agent]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inputs = $request->all();
        $agent = User::find($id);
        $agent->update($inputs);
        session()->flash('message','Agent Profile is Updated');
        return redirect()->route('all_agents');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
