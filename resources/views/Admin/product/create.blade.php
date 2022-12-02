@extends('layouts.admin_dashboard')
@section('dashboard-left-title','Add New Product here')
@section('dashboard-right-buttion')
Product
@endsection
@section('content')
    <form action="{{route('product.store')}}"  method="post" enctype="multipart/form-data">
        @csrf
        <table>
            <tr>
                <td>Status</td>
                <td>
                    <select name="status" id="">
                        <option value="">---selecte---</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" id=""></td>
            </tr>
            <tr>
                <td>sku</td>
                <td><input type="text" name="sku" id=""></td>
            </tr>
            <tr>
                <td>Image</td>
                <td><input type="file" name="image" id=""></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type="text" name="price" id=""></td>
            </tr>
            <tr>
                <td>Special Price</td>
                <td><input type="text" name="special_price" id=""></td>
            </tr>
            <tr>
                <td>Special Price from</td>
                <td><input type="date" name="special_price_from" id=""></td>
            </tr>
            <tr>
                <td>Special Price to</td>
                <td><input type="date" name="special_price_to" id=""></td>

            </tr>
            <tr>
                <td></td>
                <td>
                    <!-- <select name="category[]" id="" multiple>
                        <option value="">--select--</option>
                        @foreach($categoryData as $_category)
                        <option value="{{$_category->id}}">{{$_category->category_name}}</option>
                        @endforeach
                    </select> -->
                    <h2>--Category--</h2>
                    
                    @foreach($categoryData as $_category)
                    <div class="checkbox">
                        <input type="checkbox" name="category[]" id="" class="check" value="{{$_category->id}}">
                        <label for="text" name="category[]" value="{{$_category->category_name}}">{{$_category->category_name}}</label>
                        </div>  
                    @endforeach

               
                </td>
            </tr>
            <tr>
                <td>Short description</td>
                <td><textarea type="text" name="short_description" id="" ></textarea></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><textarea name="description" id="" cols="30" rows="10"></textarea></td>
            </tr>
            <tr>
                <td>Url Key</td>
                <td><input type="text" name="url_key" id=""></td>
            </tr>
            <tr>
                <td colspan="2" class="formsubmittd">
                    <button type="submit" class="formsubmit">Submit</button>
                </td>
            </tr>
        </table>
    </form>
    <script>
     CKEDITOR.replace('description');
    </script>
@endsection