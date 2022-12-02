<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(auth()->user()->hasPermissionTo('role_index')){
            $roleData=Role::all();
            return view('Admin/role/index',compact('roleData'));
        }else{
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
        if(auth()->user()->hasPermissionTo('role_create')){
            $permission=Permission::all();

            return view('Admin/role/create',compact('permission'));
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
        // echo"<pre>";
        // print_r($data);
        // die();
     
        $role = Role::create(['name'=> $data['name'], 'guard_name'=> 'web']);
        foreach($data['permission'] as $_permissionId){
            $permission=Permission::find($_permissionId);
             $role->givePermissionTo($permission);
             $permission->assignRole($role);
        }
        return redirect()->route('role.index');
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
    public function edit(Role $role)
    {
        // echo"<pre>";
        // print_r($role);
        // die();
        if(auth()->user()->hasPermissionTo('role_edit')){
            $permission=Permission::all();
            // echo"<pre>";
            // print_r($permission);
            // die();
            
        return view('Admin/role/edit',compact('role','permission')); 
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
    public function update(Request $request, Role $role)
    {
        // $data=$request->all();
      
        // $allPermission = $role->permissions();
        // foreach($allPermission as $_permission) {
        //     $role->revokePermissionTo($_permission->name);
        // }
        // $role->update($data);
        // die("asdf");
        $role->update($request->only('name'));
    
        $role->syncPermissions($request->get('permission'));
        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if(auth()->user()->hasPermissionTo('role_destroy')){
            $role->delete();
            return redirect()->back()->witherror(" User Delete Successfully...");
        }else{
            return redirect('admin/dashboard');
        }
       
    }
}
