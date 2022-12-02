@extends('layouts.admin_dashboard')
@section('dashboard-left-title','Block')
@section('dashboard-right-buttion')
@can('block_create')<a href="{{route('block.create')}}"><button>Add New Block</button> </a>@endcan
@endsection
@section('content')
<div class="table">
			<table class="dasboradtable">
                <thead>
                    <th>id</th>
                    <th>Status</th>
                    <th>title</th>
                    <th>Action</th>
                </thead>
                @foreach($BlockData as $_Block)
                <tr>
                    <td>{{$_Block->id}}</td>
                    <td>{{$_Block->status==1?'Enable':'Disable'}}</td>
                    <td>{{$_Block->title}}</td>
                    <td class="action"> 
                        @can('block_edit')<a href="{{route('block.edit',$_Block->id)}}"><button>edit</button></a>@endcan
                    
                       @can('block_destroy') <form action="{{route('block.destroy',$_Block->id)}}" method="post">
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
