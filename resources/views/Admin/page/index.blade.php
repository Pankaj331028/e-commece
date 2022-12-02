@extends('layouts.admin_dashboard')
@section('dashboard-left-title','Page')
@section('dashboard-right-buttion')
@can('page_create')<a href="{{route('page.create')}}"><button>Add New Page</button> </a>@endcan
@endsection
@section('content')
<div class="table">
			<table class="dasboradtable">
                <thead>
                    <tr>
                    <th>id</th>
                    <th>Status</th>
                    <th>Show in navigation</th>
                    <th>Show in footer</th>
                    <th>Action</th>
                    </tr>
                </thead>
                @foreach($PageData as $_page)
                <tr>
                    <td>{{$_page->id}}</td>
                    <td>{{$_page->status==1?'Enable':'Disable'}}</td>
                    <td>{{$_page->show_in_navigation==1?'yes':'No'}}</td>
                    <td>{{$_page->show_in_footer==1?'Yes':'No'}}</td>
                    <td class="action"> 
				@can('page_edit')<a href="{{route('page.edit',$_page->id)}}"><button>edit</button></a>@endcan
			
               @can('page_destroy') <form action="{{route('page.destroy',$_page->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    
					<button type="submit" class="delete">Delete</button>
                </form>@endcan
			</td>

                </tr>
                @endforeach

			
		</table>
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
		
@endsection
