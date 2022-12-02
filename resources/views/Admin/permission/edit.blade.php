@extends('layouts.admin_dashboard')
@section('dashboard-left-title','Update the permission here')
@section('dashboard-right-buttion')
Permission
@endsection
@section('content')
<form action="{{route('permission.update',$permission->id)}}" method="post">
            @method('Put')
            @csrf
            <table>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name" id="" value="{{$permission->name}}"></td>
                </tr>
                <tr>
                    <td>Guard Name</td>
                    <td><input type="text" name="guard_name" id="" value="{{$permission->guard_name}}"></td>
                </tr>
                <tr >
                    <td colspan="2" class="formsubmittd"><button type="submit" class="formsubmit">Update</button></td>
                </tr>
            </table>
        </form> 
@endsection