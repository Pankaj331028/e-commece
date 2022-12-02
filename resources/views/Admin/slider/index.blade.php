@extends('layouts.admin_dashboard')
@section('dashboard-left-title','Slider')
@section('dashboard-right-buttion')
@can('slider_create')<a href="{{route('slider.create')}}"><button>Add New Slider</button></a>@endcan
@endsection
@section('content')
        <div class="table">
            <table class="dasboradtable">
                <thead>
                    <th>Id</th>
                    <th>Status</th>
                    <th>title</th>
                    <th>image</th>
                    <th>Action</th>
                </thead>
                @foreach($SliderData as $_slider)
                <tr>
                    <td>{{$_slider->id}}</td>
                    <td>{{$_slider->status==1?'Enable':'Disable'}}</td>
                    <td>{{$_slider->title}}</td>
                    <td>
                    <img src="{{asset('public/images/'. $_slider->image) }}" width="100px">
                    </td>
                <td class="action"> 
				    @can('slider_edit')<a href="{{route('slider.edit',$_slider->id)}}"><button>edit</button></a>@endcan
			
                    @can('slider_destroy')
                     <form action="{{route('slider.destroy',$_slider->id)}}" method="post">
                    @csrf
                    @method('DELETE')
					<button type="submit" class="delete">Delete</button>
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