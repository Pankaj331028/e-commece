@extends('layouts.admin_dashboard')
@section('dashboard-left-title','Update the Slider here')
@section('dashboard-right-buttion')
Slider
@endsection
@section('content')
   <form action="{{route('slider.update',$slider->id)}}" method="post" enctype="multipart/form-data">
   @method('PUT')
   @csrf
    <table>
      <tr>
        <td>Status</td>
        <td>
            <select name="status" id="">
                <option value="">---Select---</option>
                <option value="1"{{$slider->status==1?'selected':''}}>Enable</option>
                <option value="0" {{$slider->status==0?'selected':''}}>Desable</option>
            </select>
        </td>
      </tr>
      <tr>
        <td>Title</td>
        <td><input type="text" name="title" id="" value="{{$slider->title}}"></td>
      </tr>
      <tr>
        <td>Image</td>
        <td><input type="file" name="image" id="" value="">
        <img src="http://127.0.0.1:8000/public/images/{{ $slider->image }}" width="100px">
      </td>
      </tr>
      <tr>
        <td>Description</td>
        <td><textarea type="textarea" name="description" id="" value="{{$slider->description}}"></textarea></td>
      </tr>
      <tr>
        <td>Alt tag</td>
        <td><input type="text" name="alt_tag" id="" value="{{$slider->alt_tag}}"></td>
      </tr>
      <tr>
        <td>Meta Titale</td>
        <td><input type="text" name="meta_title" id="" value="{{$slider->meta_title}}"></td>
      </tr>
      <tr>
        <td>Meta Tag</td>
        <td><input type="text" name="meta_tag" id="" value="{{$slider->meta_tag}}"></td>
      </tr>
      <tr>
        <td>Meta Description</td>
        <td><input type="text" name="meta_description" id="" value="{{$slider->meta_description}}"></td>
      </tr>
      <tr>
                <td colspan="2" class="formsubmittd">
                    <button type="submit" class="formsubmit">Update</button>
                </td>
            </tr>
    </table>
   </form>
@endsection