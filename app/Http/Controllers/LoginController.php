<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;

class LoginController extends Controller
{
    public function login(Request $req)
    {
        if( Auth::guard('admin')->attempt(['email' => $req->email, 'password' => $req->password])){
            return redirect()->route('adminHome');
        }
       else if( Auth::guard('web')->attempt(['email' => $req->email, 'password' => $req->password])){
           return redirect()->route('userHome');
       }
       else {
        return redirect()->back()->with('error', 'Invalid Credentials');
       }
    }

    public function userLogout()
    {
        Auth::guard('web')->logout();

        return redirect()->route('login');
    }

    public function adminLogout()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('login');
    }

    public function userList()
    {
        $data = User::all();
        return view ( 'adminHome' )->withData ( $data );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
