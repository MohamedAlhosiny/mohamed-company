<?php

namespace App\Http\Controllers;

use App\Models\Boss;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BossController extends Controller
{

    public function loginPage() {
        return view('bosses.login');
    }


public function dashboard(){

    return view('bosses.dashboard');
}

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bosses.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
        'name' => 'string|required|min:6',
        'email' => 'email|required|unique:bosses',
        'password' => 'required|string|confirmed'
       ]);

       $boss = new Boss();
       $boss->name = $request->name;
       $boss->email = $request->email;
       $boss->password = Hash::make($request->password);

       $boss->save();

       return redirect()->route('boss.loginPage');

    }

    public function login(Request $request){
        if(Auth::guard('boss')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return to_route('boss.dashboard');
        }else {
            return redirect()->back();
        }

    }

    public function logout(){
        Auth::guard('boss')->logout();
        return redirect()->route('boss.loginPage');
    }

    public function show(Boss $boss)
    {

    }


    public function edit(Boss $boss)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Boss $boss)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Boss $boss)
    {
        //
    }
}
