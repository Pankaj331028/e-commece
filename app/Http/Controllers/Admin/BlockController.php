<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Block;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->hasPermissionTO('block_index')){
            $BlockData=Block::all();
            return view('Admin/block/index',compact('BlockData'));
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
        if(auth()->user()->haspermissionTo('block_create')){
            return view('Admin/block/create');
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
        Block::create($data);
        return redirect()->route('block.index');
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
    public function edit(Block $block)
    {
        if(auth()->user()->hasPermissionTo('block_edit')){
            return view('Admin/block/edit',compact('block'));
        }else{
            return redirect()->route('block.index');
        }
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Block $block)
    {
        $data=$request->all();
        $block->update($data);
        return redirect()->route('block.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Block $block)
    {
        if(auth()->user()->hasPermission('block_destroy')){
            $block->delete();
            return redirect()->back();
        }else{
            return redirect('admin/dashboard');
        }
       
    }
    public function getname(){
        // return ["name"=>"Pankaj Dhunwa"];
        return Block::all();
    }
}
