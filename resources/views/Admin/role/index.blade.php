@extends('layouts.admin_dashboard')
@section('dashboard-left-title','Role')
@section('dashboard-right-buttion')
@can('role_create')<a href="{{route('role.create')}}"><button>Add New Role</button></a>@endcan
@endsection
@section('content')
        <div class="table">
            <table class="dasboradtable">
                <tr>
                    <th>Id</th>
                    <th>Role Name</th>
                    <th>Permission</th>
                    <th>Action</th>
                </tr>
                @foreach($roleData as $_role)
                    <tr>
                        <td>{{$_role->id}}</td>
                        <td>{{$_role->name}}</td>
                        <td>
                            @foreach($_role->permissions as $_perm)
                                {{$_perm->name}}, 
                            @endforeach
                        </td>
                    <td class="action"> 
					@can('role_edit')<a href="{{route('role.edit',$_role->id)}}"><button>edit</button></a>@endcan
					
                    @can('role_destroy')<form action="{{route('role.destroy',$_role->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                       <button type="submit"  class="delete">Delete</button> 
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