@extends('layouts.admin_dashboard')
@section('dashboard-left-title','Add the block here')
@section('dashboard-right-buttion')
Block
@endsection
@section('content')
<form action="{{route('block.store')}}" method="POST">
            @csrf
            <table>
               <tr>
                <td>Status</td>
                <td>
                    <select name="status" id="">
                        <option value="">---Select---</option>
                        <option value="1">Enable</option>
                        <option value="0">Disable</option>
                    </select>
                </td>
               </tr>
               <tr>
                <td>Title</td>
                <td><input type="text" name="title" id=""></td>
               </tr>
               <tr>
                <td>USE For</td>
                <td>
                    <select name="use_for" id="">
                        <option value="">---select---</option>
                        <option value="home">Home</option>
                        <option value="category">Category</option>
                        <option value="product">Product</option>
                    </select>
                </td>
               </tr>
               <tr>
                <td>Identifier</td>
                <td><input type="text" name="identifier" id=""></td>
               </tr>
               <tr>
                <td>Description</td>
                <td><textarea type="textarea" name="description" id=""></textarea></td>
               </tr>
               <tr>
                <td>Ordering</td>
                <td><input type="text" name="ordering" id=""></td>
               </tr>
               <tr>
                    <td>Meta title</td>
                    <td><input type="text" name="meta_title" id=""></td>
                </tr>
                <tr>
                    <td>Meta tag</td>
                    <td><input type="text" name="meta_tag" id=""></td>
                </tr>
                <tr>
                    <td>Meta Description</td>
                    <td><input type="textarea" name="meta_description" id=""></td>
                </tr>
                <tr >
                    <td colspan="2" class="formsubmittd">
                        <button type="Submit" class="formsubmit">Submit</button>
                    </td>
                </tr>
            </table>
        </form>  
         <script>
            CKEDITOR.replace( 'description' );
        </script>
     
@endsection