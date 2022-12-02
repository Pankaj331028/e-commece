@extends('layouts.admin_dashboard')
@section('dashboard-left-title',' Update the Product here')
@section('dashboard-right-buttion')
Product
@endsection
@section('content')
    <form action="{{route('product.update',$product->id)}}"  method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <table>
            <tr>
                <td>Status</td>
                <td>
                    <select name="status" id="">
                        <option value="">---selecte---</option>
                        <option value="1"{{$product->status==1?'selected':''}} >Yes</option>
                        <option value="0" {{$product->status==0?'selected':''}} >No</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" id="" value="{{$product->name}}"></td>
            </tr>
            <tr>
                <td>sku</td>
                <td><input type="text" name="sku" id="" value="{{$product->sku}}"></td>
            </tr>
            <tr>
                <td>Image</td>
                <td><input type="file" name="image" id="">
                 <img src="{{$product->getFirstMediaUrl('image', 'thumb')}}" / width="120px">
                </td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type="text" name="price" id="" value="{{$product->price}}"></td>
            </tr>
            <tr>
                <td>Special Price</td>
                <td><input type="text" name="special_price" id="" value="{{$product->special_price}}"></td>
            </tr>
            <tr>
                <td>Special Price from</td>
                <td><input type="date" name="special_price_from" id="" value="{{$product->special_price_from}}"></td>
            </tr>
            <tr>
                <td>Special Price to</td>
                <td><input type="date" name="special_price_to" id="" value="{{$product->special_price_to}}"></td>

            </tr>
            <tr>
                <td>Category</td>
                <td>
                    
                    <!-- <select name="category[]" id="" multiple>
                        <option value="">--select--</option>
                        @foreach($categoryData as $_category)
                        <option value="{{$_category->id}}"{{$product->category==$_category->id?'selected':''}}>{{$_category->category_name}}</option>
                        @endforeach
                    </select> -->
                    <h2>--Category--</h2>
                    <?php
                        $cIds = $product->categories->pluck('id')->toArray();
                        // print_r($cIds);
                        // die;
                    ?>
                    @foreach($categoryData as $_category)
                    <div class="checkbox">
                        <input type="checkbox" name="category[]" id="" class="check" value="{{$_category->id}}" {{in_array($_category->id, $cIds)?'checked':''}}>
                        <label for="text" name="category[]" value="{{$_category->category_name}}">{{$_category->category_name}}</label>
                        </div>  
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>Short description</td>
                <td><input type="text" name="short_description" id="" value="{{$product->short_description}}"></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><textarea name="description" id="" cols="30" rows="10" value="">{{$product->description}}</textarea></td>
            </tr>
            <tr>
                <td>Url Key</td>
                <td><input type="text" name="url_key" id="" value="{{$product->url_key}}"></td>
            </tr>
            <tr>
                <td colspan="2" class="formsubmittd">
                    <button type="submit" class="formsubmit">Update</button>
                </td>
            </tr>
        </table>
    </form>
    <script>
     CKEDITOR.replace('description');
    </script>
@endsection