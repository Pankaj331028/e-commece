<!DOCTYPE html>
<html>
<head>
@include('includes/admin.head')

</head>

<body>
    @include('includes/admin.header')
    @include('includes/admin.navigation')
    <div class="right_board">
    @include('includes/admin.right-header') 
    <div class="dashboard_name">
		<div>Category</div>
		<div class="right_button">
      @can('category_create')<a href="{{route('category.create')}}"><button>Add Category</button> </a>@endcan
        </div>
		
	</div>
	<div class="table">
		<table class="dasboradtable">
		<tr>
			<th>id</th>
			<th>Parent Category</th>
			<th>Category Name</th>
			<th>include_in_menu</th>
            <th>Status</th>
			<th>Image</th>
			<th>action</th>
		</tr>
		<?php $i=1; ?>
        @foreach($categoryData as $_category)
		<tr>
			<td>{{$i++}}</td>
			<td>
				{{App\Models\Category::getCategoryName($_category->parent_category)}}
				
			</td>
			<td>{{$_category->category_name}}</td>
			<td>{{$_category->include_in_menu===1?'Yes':'No'}}</td>
            <td class="{{$_category->status===1?'active':'deactive'}}">{{$_category->status===1?'Active':'Deactive'}}</td>
			<td><img src="{{$_category->getFirstMediaUrl('thumbnail_image', 'thumb')}}" / width="120px"></td>
			
			<td class="action"> 
				@can('category_edit')<a href="{{route('category.edit',$_category->id)}}"><button>edit</button></a>@endcan
			
                @can('category_destroy')<form action="{{route('category.destroy',$_category->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <!-- <input type="submit" class="delete"value="Delete"> -->
					<button type="submit" class="delete">Delete</button>
                </form>@endcan
			</td>
		</tr>
        @endforeach
		
	</table>
	</div>

    </div>
	
	<script>
		$(document).ready(function(){
			$('.delete').click(function(e){
				var confirmation=confirm("Are You Want to Delete this Record...");
				if(!confirmation){
					e.preventDefault();
				}
			});
		});
		
	</script>
</body>
	
</html>