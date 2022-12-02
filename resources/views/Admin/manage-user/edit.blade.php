
@extends('layouts.admin_dashboard')
@section('dashboard-left-title','Update User/Subadmin Details here')
@section('dashboard-right-buttion')
User
@endsection
@section('content')
<form action="{{route('user.update',$user->id)}}" method="post">
        @csrf
        @method('put')
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" id="" value={{$user->name}}> </td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" id="" value={{$user->email}}></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" id="" value=""></td>
            </tr>
            <tr>
                <td>Type</td>
                <td>
                    <select name="type" id="">
                        <option value="">---select type---</option>
                        <option value="admin" {{$user->type==='admin'?'selected':''}}>admin</option>
                        <option value="subadmin" {{$user->type==='subadmin'?'selected':''}}>subadmin</option>
                    </select>
                    
                </td>
            </tr>
            <td></td>
                <td>
                    <!-- <select name="role" id="">
                        <option value="">---Select Role---</option>
                        @foreach($role as $_role)
                            <option value="{{$_role->id}}">{{$_role->name}}</option>
                        @endforeach
                    </select> -->
                    <h2>------Role------</h2>
                        @foreach($role as $_role)
                            <!-- <option value="{{$_role->id}}">{{$_role->name}}</option> -->
                            <div class="checkbox">
                            <input type="checkbox" name="role[]" id="" class="check" value="{{$_role->id}}" {{($user->hasRole($_role->name))?'checked':''}}>
                            <label for="text"  name="role[]" value="{{$_role->name}}">{{$_role->name}}</label>
                            </div>
                        @endforeach
                    
                </td>
           <tr>
            <td colspan="2" class="formsubmittd">
                <button type="submit" class="formsubmit"> Update </button>
            </td>
           </tr>
        </table>
      </form>
	
@endsection
