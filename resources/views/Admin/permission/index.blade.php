@extends('layouts.admin_dashboard')
@section('dashboard-left-title','Permission')
@section('dashboard-right-buttion')
@can('permission_create') <a href="{{route('permission.create')}}"><button>Add New Permission</button> </a>@endcan
@endsection
@section('content')
<div class="table">
			<table class="dasboradtable">
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Guard Name</th>
				<th>Action</th>
			</tr>
            @foreach($permissionData as $_permission)
			<tr >
				<td>{{$_permission->id}}</td>
				<td>{{$_permission->name}}</td>
				<td>{{$_permission->guard_name}}</td>
				<td class="action"> 
					@can('permission_edit')	
					<a href="{{route('permission.edit',$_permission->id)}}"><button>edit</button></a>
					@endcan
					<!-- <a href=""><button>delete</button></a> -->
                   	@can('permission_destroy') 
					<form action="{{route('permission.destroy',$_permission->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                       <button type="submit"  class="delete">Delete</button> 
                    </form>
					@endcan
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
