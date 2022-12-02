<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->hasPermissionTo('slider_index')){
            $SliderData=Slider::all();
            return view('Admin/slider/index',compact('SliderData'));
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
        if(auth()->user()->hasPermissionTo('slider_create')){
            
            return view('Admin/slider/create');
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
        // $imageData=$data['image'];
        // foreach($request->file('image') as $_image){
         

        //             $destinationPath = 'public/images';
        
        //             $profileImage = date('YmdHis') . "." . $_image->getClientOriginalExtension();
        
        //             $_image->move($destinationPath, $profileImage);
        
        //             $data['image'] = "$profileImage";
        
                
        // }
        if ($image = $request->file('image')) {

            $destinationPath = 'public/images';

            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

            $image->move($destinationPath, $profileImage);

            $data['image'] = "$profileImage";

        }
        Slider::create($data);
        return redirect()->route('slider.index');
        
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
    public function edit(Slider $slider)
    {
        if(auth()->user()->hasPermissionTo('slider_edit')){
            return view('Admin/slider/edit',compact('slider'));
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
    public function update(Request $request, Slider $slider)
    {
        $data=$request->all();
        if ($image = $request->file('image')) {

            $destinationPath = 'public/images';

            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

            $image->move($destinationPath, $profileImage);

            $data['image'] = "$profileImage";

        }else{

            unset($data['image']);

        }
        $slider->update($data);
        return redirect()->route('slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        if(auth()->user()->hasPermissionTo('slider_destroy')){
            $slider->delete();
            return redirect()->back();
        }else{
            return redirect('admin/dashboard');

        }
       
    }
}
