<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Session;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // $data=User::create([
        //     'name'=>'test',
        //     'email'=>'test@gmail.com',
        //     'password'=>Hash::make('test')
        // ]);
        // echo($data);
        // die();
        if(Auth::check()){
            return redirect('admin/dashboard');
        }
        return view('includes/login/adminlogin');
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
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $data =$request->all();
        // $data=implode("",$data);
        // echo $data;
        // die();
        $credentials=$request->only('email','password');
        // $credentials=implode("",$credentials);
        // echo $credentials;
        // die();
        if(Auth::attempt($credentials)){
            return redirect('admin/dashboard')->withSuccess("Logged In Successfully...");
        }else{
            return redirect('admin/login')->withError("Login invalid...");
        }
           
        
    }
    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('admin/login')->withSuccess("Logout Successfully...");
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
