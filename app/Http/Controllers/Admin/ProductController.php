<?php

namespace App\Http\Controllers\Admin;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductCategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->hasPermissionTo('product_index')){
            if(isset($_GET['search'])){
            
                $ProductData=Product::where('category','LIKE','%'.$_GET["search"].'%')->paginate(5);
                
          
                
            }else{
                $ProductData=Product::latest()->paginate(5);
            }
            // $ProductData=Product::all();
        
            return view('Admin/product/index',compact('ProductData'));
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
        if(auth()->user()->hasPermissionTo('product_create')){
          
            $categoryData=Category::all();

            return view('Admin/product/create',compact('categoryData'));
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
        // p($data['id']);
        $categoryId=$data['category'];
        $data['category']=implode(",",$data['category']);
       
       

        $insert=Product::create($data);

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $insert->addMediaFromRequest('image')->toMediaCollection('image');
        }

        $ProductId=$insert->id;
        foreach($categoryId as $_catId ){
            ProductCategory::insert(['product_id'=> $ProductId, 'category_id'=> $_catId]);
        }
       
        return redirect()->route('product.index');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        if(auth()->user()->hasPermissionTo('product_edit')){
            $categoryData=Category::all();
            return view('Admin/product/edit',compact('product','categoryData'));
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
    public function update(Request $request,Product $product)
    {
        
        $ProductId=$product->id;
        $data=$request->all();
        $categoryId=$data['category'];
        $data['category']=implode(",",$data['category']);

        $insert=$request['image'];
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $product->media()->delete();
            $product->addMedia($insert)->toMediaCollection('image');
        }
        $product->update($data);
        ProductCategory::where('product_id',$ProductId)->delete();
        foreach($categoryId as $_catId ){
            ProductCategory::insert(['product_id'=> $ProductId, 'category_id'=> $_catId]);
        }
       
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if(auth()->user()->hasPermissionTo('product_destroy')){
            $id=$product['id'];
        
            ProductCategory::where('product_id',$id)->delete();
            $product->delete();
            return redirect()->back();
        }else{
            return redirect('admin/dashboard');
        }
       
    }
}
