@extends('layouts.admin_dashboard')
@section('dashboard-left-title','Update the block here')
@section('dashboard-right-buttion')
Block
@endsection
@section('content')
<form action="{{route('block.update',$block->id)}}" method="POST">
            @method('PUT')
            @csrf
            <table>
               <tr>
                <td>Status</td>
                <td>
                    <select name="status" id="">
                        <option value="">---Select---</option>
                        <option value="1"{{$block->status==1?'selected':''}}>Enable</option>
                        <option value="0" {{$block->status==0?'selected':''}}>Disable</option>
                    </select>
                </td>
               </tr>
               <tr>
                <td>Title</td>
                <td><input type="text" name="title" id="" value="{{$block->title}}"></td>
               </tr>
               <tr>
                <td>USE For</td>
                <td>
                    <select name="use_for" id="">
                        <option value="">---select---</option>
                        <option value="home" {{$block->use_for=='home'?'selected':''}}>Home</option>
                        <option value="category" {{$block->use_for=='category'?'selected':''}}>Category</option>
                        <option value="product" {{$block->use_for=='product'?'selected':''}}>Product</option>
                    </select>
                </td>
               </tr>
               <tr>
                <td>Identifier</td>
                <td><input type="text" name="identifier" id="" value="{{$block->identifier}}"></td>
               </tr>
               <tr>
                <td>Description</td>
                <td><textarea type="textarea" name="description" id="" value="">{{$block->description}}</textarea></td>
               </tr>
               <tr>
                <td>Ordering</td>
                <td><input type="text" name="ordering" id="" value="{{$block->ordering}}"></td>
               </tr>
               <tr>
                    <td>Meta title</td>
                    <td><input type="text" name="meta_title" id="" value="{{$block->meta_title}}"></td>
                </tr>
                <tr>
                    <td>Meta tag</td>
                    <td><input type="text" name="meta_tag" id="" value="{{$block->meta_tag}}"></td>
                </tr>
                <tr>
                    <td>Meta Description</td>
                    <td><input type="textarea" name="meta_description" id="" value="{{$block->meta_description}}"></td>
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