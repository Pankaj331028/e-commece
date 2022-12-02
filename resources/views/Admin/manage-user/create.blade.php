@extends('layouts.admin_dashboard')
@section('dashboard-left-title','User/Subadmin add here')
@section('dashboard-right-buttion')
User
@endsection
@section('content')
<form action="{{route('user.store')}}" method="post">
        @csrf
        <table class="createtable">
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" id=""> </td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" id=""></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" id=""></td>
            </tr>
            <tr>
                <td>Type</td>
                <td>
                    <select name="type" id="">
                        <option value="">---select type---</option>
                        <option value="admin">admin</option>
                        <option value="subadmin">subadmin</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <!-- <select name="role" id="">
                        <option value="">---Select Role---</option> -->
                        <h2>------Role------</h2>
                        @foreach($role as $_role)
                            <!-- <option value="{{$_role->id}}">{{$_role->name}}</option> -->
                            <div class="checkbox">
                            <input type="checkbox" name="role[]" id="" class="check" value="{{$_role->id}}">
                            <label for="text"  name="role[]" value="{{$_role->name}}">{{$_role->name}}</label>
                            </div>
                        @endforeach
                    <!-- </select> -->
                </td>
            </tr>
           <tr>
            <td colspan="2" class="formsubmittd">
                <button type="submit" class="formsubmit"> Submit </button>
            </td>
           </tr>
        </table>
      </form>
	
@endsection