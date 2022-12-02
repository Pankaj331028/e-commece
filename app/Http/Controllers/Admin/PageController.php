<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->hasPermissionTo('page_index')){
            $PageData=Page::all();
            return view('Admin/page/index',compact('PageData'));
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
        if(auth()->user()->hasPermissionTo('page_create')){
            return view('Admin/page/create');
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
        Page::create($data);
        return redirect()->route('page.index');
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
    public function edit(Page $page)
    {
        if(auth()->user()->hasPermissionTo('page_edit')){
       
            return view('Admin/page/edit',compact('page'));
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
    public function update(Request $request,Page $page)
    {
        $data=$request->all();
       
        if(!isset($data['show_in_navigation'])){
            $data['show_in_navigation']=0;
        }
        $page->update($data);
        return redirect()->route('page.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        if(auth()->user()->hasPermissionTo('page_destroy')){
            $page->delete();
             return redirect()->back(); 
        }else{
            return redirect('admin/dashboard');
        }
       
    }
}
