<!DOCTYPE html>
<html>
<head>
@include('includes/admin.head')

</head>

<body>
    @include('includes/admin.header')
	<div section="sectionone">
		@include('includes/admin.navigation')
		<div class="right_board">
		@include('includes/admin.right-header') 
		<div class="dashboard_name">
			<div>@yield('dashboard-left-title')</div>
			<div class="right_button">@yield('dashboard-right-buttion')</div>
			
		</div>
		@yield('content')
		<!-- <div class="tables">
			<table class="dasboradtable">
			<tr>
				<th>id</th>
				<th>first_name</th>
				<th>last_name</th>
				<th>action</th>
			</tr>
			<tr>
				<td>1</td>
				<td>pankaj</td>
				<td>dhuwa</td>
				<td> 
					<a href=""><button>edit</button></a>
					<a href=""><button>delete</button></a>
				</td>
			</tr>
			<tr>
				<td>1</td>
				<td>pankaj</td>
				<td>dhuwa</td>
				<td> 
					<a href=""><button>edit</button></a>
					<a href=""><button>delete</button></a>
				</td>
			</tr>
			<tr>
				<td>1</td>
				<td>pankaj</td>
				<td>dhuwa</td>
				<td> 
					<a href=""><button>edit</button></a>
					<a href=""><button>delete</button></a>
				</td>
			</tr>
			<tr>
				<td>1</td>
				<td>pankaj</td>
				<td>dhuwa</td>
				<td> 
					<a href=""><button>edit</button></a>
					<a href=""><button>delete</button></a>
				</td>
			</tr>
		</table>
		</div> -->

		</div>
	</div>
	@include('includes/admin.script')
</body>
</html>