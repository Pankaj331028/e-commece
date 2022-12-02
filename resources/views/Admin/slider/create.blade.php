@extends('layouts.admin_dashboard')
@section('dashboard-left-title','Add New Slider here')
@section('dashboard-right-buttion')
Slider
@endsection
@section('content')
   <form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <table>
      <tr>
        <td>Status</td>
        <td>
            <select name="status" id="">
                <option value="">---Select---</option>
                <option value="1">Enable</option>
                <option value="0">Desable</option>
            </select>
        </td>
      </tr>
      <tr>
        <td>Title</td>
        <td><input type="text" name="title" id=""></td>
      </tr>
      <tr>
        <td>Image</td>
       
        <td><input type="file" name="image" id=""  multiple></td>
      </tr>
      <tr>
        <td>Description</td>
        <td> <textarea type="textarea" name="description" id=""></textarea></td>
      </tr>
      <tr>
        <td>Alt tag</td>
        <td><input type="text" name="alt_tag" id=""></td>
      </tr>
      <tr>
        <td>Meta Titale</td>
        <td><input type="text" name="meta_title" id=""></td>
      </tr>
      <tr>
        <td>Meta Tag</td>
        <td><input type="text" name="meta_tag" id=""></td>
      </tr>
      <tr>
        <td>Meta Description</td>
        <td><input type="text" name="meta_description" id=""></td>
      </tr>
      <tr>
                <td colspan="2" class="formsubmittd">
                    <button type="submit" class="formsubmit">Submit</button>
                </td>
            </tr>
    </table>
   </form>
@endsection