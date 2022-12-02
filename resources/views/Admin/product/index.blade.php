@extends('layouts.admin_dashboard')
@section('dashboard-left-title','Product')
@section('dashboard-right-buttion')
 @can('product_create')<a href="{{route('product.create')}}"><button>Add New Product</button> </a>@endcan
@endsection
@section('content')
 <form action="{{route('product.index')}}" method="get">
    
       <div class="search">
            <input type="search" name="search" value="{{isset($_GET['search'])?$_GET['search']:''}}">
            <button type="submit" > Search</button>
            </div>
    </form>
<div class="table" >
		<table class="dasboradtable" id="myTable">
        <thead>
		<tr>
			<th>id</th>
			<th>Name</th>
			<th>Price</th>
			<th>special_price_from</th>
			<th>category</th>
            <th>Image</th>
			<th>action</th>
		</tr>
		</thead>
        @foreach($ProductData as $_product)
        <tr>
            <td>{{$_product->id}}</td>
            <td>{{$_product->name}}</td>
            <td>{{$_product->price}}</td>
            <td>{{$_product->special_price_from}}</td>
            <td>
                @foreach($_product->categories as $_cat)
                    <span>{{ $_cat->category_name }} | </span>
                @endforeach
            </td>
            <td>
            <img src="{{$_product->getFirstMediaUrl('image', 'thumb')}}" / width="120px">
            </td>
            <td class="action"> 
				@can('product_edit')<a href="{{route('product.edit',$_product->id)}}"><button>edit</button></a>@endcan
			
                @can('product_destroy')<form action="{{route('product.destroy',$_product->id)}}" method="post">
                    @csrf
                    @method('DELETE')
					<button type="submit" class="delete">Delete</button>
                </form>@endcan
			</td>
        </tr>
        @endforeach
        </table>
        <div class="page">
    {{$ProductData->links()}}

 </div>
</div>
<script>
    $(document).ready(function(){
        $('.delete').click(function(){
            var confermation=confirm("Are You Want to Delete this Record..");
            if(!confermation){
                e.preventDefault();
            }
        });
    });
   

</script>
@endsection
