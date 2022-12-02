
@extends('layouts.admin_dashboard')
@section('dashboard-left-title','Manage-User')
@section('dashboard-right-buttion')
<a href="{{route('user.create')}}"><button>Add User</button> </a>
@endsection
@section('content')

<div class="table" >
		<table class="dasboradtable" id="myTable">
		@if(Session::has('success'))
      <div class="success"><i class="fa fa-check"></i> {{Session::get('success')}}</div>
      @endif
	  @if(Session::has('error'))
      <div class="error"><i class="fa fa-solid fa-trash"></i>{{Session::get('error')}}</div>
      @endif
		<thead>
		<tr>
			<th>id</th>
			<th>Name</th>
			<th>Email</th>
			<th>Type</th>
			<th>Role</th>
			<th>action</th>
		</tr>
		</thead>
        @foreach($userData as $_user)
		<tr>
			<td>{{$_user->id}}</td>
			<td>{{$_user->name}}</td>
			<td>{{$_user->email}}</td>
			<td>{{$_user->type}}</td>
			<td>
				@if($_user->role_id>0)
					{{$_user->role->name}}
				@endif
			</td>
			<td class="action"> 
				@can('user_edit')<a href="{{route('user.edit',$_user->id)}}"><button>edit</button></a>@endcan
				
                <form action="{{route('user.destroy',$_user->id)}}" method="POST">
                 @csrf
                 @method('DELETE')
                 <button type="submit" id="dddddddd" class="delete">delete</button>
                 <!-- <input type="submit" name="" id="dddddddd" class="delete" value="Delete"> -->


                </form>
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
		$(document).ready( function () {
		$('#myTable').DataTable();
		} );
	</script>
@endsection