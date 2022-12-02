@extends('layouts.admin_dashboard')
@section('dashboard-left-title','Add New Role here')
@section('dashboard-right-buttion')
Role
@endsection
@section('content')
    <form action="{{route('role.store')}}"  method="post">
        @csrf
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" id=""></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <!-- <select name="permission[]" multiple id=""> -->
                        <h2>--------Permission--------</h2>
                        @foreach($permission as $_permission)
                        <!-- <option value="{{$_permission->id}}">{{$_permission->name}}</option> -->
                        <div class="checkbox">
                        <input type="checkbox" name="permission[]" id="" class="check"value="{{$_permission->id}}"  >
                        <label for="text"  name="permission[]" value="{{$_permission->name}}">{{$_permission->name}}</label>
                  
                        </div>
                        @endforeach
                    <!-- </select> -->
                </td>
            </tr>
            <tr>
                <td colspan="2" class="formsubmittd">
                    <button type="submit" class="formsubmit">Submit</button>
                </td>
            </tr>
        </table>
    </form>
@endsection