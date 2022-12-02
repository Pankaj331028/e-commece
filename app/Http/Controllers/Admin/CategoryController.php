<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->hasPermissionTo('category_index')){
            $categoryData=Category::all();
            return view('Admin/category/index',compact('categoryData'));
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
        if(auth()->user()->hasPermissionTo('category_create')){
            $categoryData=Category::all();

            return view('admin/category/create',compact('categoryData'));
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
        // p($request->file('thumbnail_image')->getClientOriginalName());// image original name get
        // p($request->file('thumbnail_image')->getExtension());//image extension get
        // p($request->file('thumbnail_image')->getRealPath());//image treal path get
    
        // $data=$data['thumbnail_image'];
       
        // $imagename=$data->file('thumbnail_image')->getClientOriginalName();
        // $imagename=$request->file('thumbnail_image')->getClientOriginalName();
        // p($imagename);
        // $imagename=implode(",",$imagename);
        // $data->storeAs('public/images',$imagename);

        $insert= Category::create($data);
        if($request->hasFile('thumbnail_image') && $request->file('thumbnail_image')->isValid()){
            $insert->addMediaFromRequest('thumbnail_image')->toMediaCollection('thumbnail_image');
        }
        
        return redirect()->route('category.index');
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
    public function edit(Category $category)
    {
        // p($category);
        if(auth()->user()->hasPermissionTo('category_edit')){
            $categoryData=Category::all();

            return view('admin/category/edit',compact('category','categoryData'));
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
    public function update(Request $request, Category $category)
    {
       $data=$request->all();
       if(!isset($data['include_in_menu'])){
        $data['include_in_menu']=0;
       }
    //    echo"<pre>";
    //    print_r($data);
    //    die();
       $insert=$request['thumbnail_image'];
       if($request->hasFile('thumbnail_image') && $request->file('thumbnail_image')->isValid()){
        $category->media()->delete();
        $category->addMedia($insert)->toMediaCollection('thumbnail_image');
    }
    $insert=$category->update($data);
  
       return redirect()->route('category.index');
        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {   
        if(auth()->user()->hasPermissionTo('category_destroy')){
            $category->delete();
            return redirect()->back();
        }else{
            return redirect('admin/dashboard');
        }
       
    }
}
