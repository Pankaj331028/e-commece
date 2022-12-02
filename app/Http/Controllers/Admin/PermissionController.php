<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
     {
        if(auth()->user()->hasPermissionTo('permission_index')){
            $permissionData=Permission::all();
            return  view('Admin/permission/index',compact('permissionData'));
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
        if(auth()->user()->hasPermissionTo('permission_create')){
            return view('Admin/permission/create');
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
        // p($request->all());
        // die();
        $data=$request->all();
        $insert= Permission::create($data);
        return redirect()->route('permission.index');
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
    public function edit(Permission $permission)
    {
        if(auth()->user()->hasPermissionTo('permission_edit')){
            return view('Admin/permission/edit',compact('permission'));
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
    public function update(Request $request,Permission $permission)
    {

        $data=$request->all();
        $permission->update($data);
        return redirect()->route('permission.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {   
        if(auth()->user()->hasPermissionTo('permission_destroy')){
            $permission->delete();
            return redirect()->back();
        }else{
            return redirect('admin/dashboard');
        }
       
       
    }
}
