<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        if(auth()->user()->hasPermissionTo('user_index')){
            $userData=User::all();
            // $userData = User::with('roles')->get();
            // $userData=User::with('role')->get();
            return view('Admin/manage-user/index',compact('userData'));
        }else
        {
            return redirect('admin/dashboard');
        }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->hasPermissionTo('user_create')){
            $role=Role::all();
            return view('Admin/manage-user/create',compact('role'));
        }else{
            return redirect('admin/dashboard');
        }
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();
        // p($data);
       
        // $role=Role::find($data['role']);
         $data['role_id']=implode(",",$data['role']);
        $user= User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'type'=>$data['type'],
            'role_id'=>$data['role_id']
          ]);

          foreach($data['role'] as $_roleId){
            $role=Role::find($_roleId);
            $user->assignRole($role);
          }
        
         
        

        //$data['password'] = Hash::make($data['password']);
        // $user=new User();
        // $user->name=$request->name;
        // $user->email=$request->email;
        // $user->password=$request->Hash::make($request->password);
        // $res=$user->save();

        //$insert= User::create($data);
        // echo "<pre>";
        // print_r($insert);
        // die();
        return redirect()->route('user.index')->withSuccess(" User Add Successfully...");
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
    public function edit(User $user)
    {
        if(auth()->user()->hasPermissionTo('user_edit')){
            
            $role=Role::all();
            // echo"<pre>";
            // print_r($user);
            // die();
             return view('Admin/manage-user/edit',compact('user','role'));

        }else{
            return redirect('admin/dashboard');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
       $data=$request->all();
        // p($data);
        $roles= Role::find($data['role']);
        $data['role_id'] = implode(",", $data['role']);
        if($data['password']){
            $data['password'] = Hash::make($data['password']);
        }else{
            unset( $data['password'] );
        }
        
        $user->update($data);
        $user->removeRole($user->roles->first());
        
      
       
        $user->assignRole($roles);
        //p($user->roles);
       return redirect()->route('user.index')->withsuccess(" User Update Successfully...");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
      if(auth()->user()->hasPermissionTo('user_destroy')){
        $user->delete();
        return redirect()->back()->witherror(" User Delete Successfully..."); 
      }else{
        return redirect('admin/dashboard');
      }
      
    }
}
