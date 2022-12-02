@extends('layouts.admin_dashboard')
@section('dashboard-left-title','Add the permission here')
@section('dashboard-right-buttion')
Permission
@endsection
@section('content')
<form action="{{route('permission.store')}}" method="post">
            @csrf
            <table>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name" id=""></td>
                </tr>
                <tr>
                    <td>Guard Name</td>
                    <td><input type="text" name="guard_name" id="" value="web"></td>
                </tr>
                <tr >
                    <td  colspan="2" class="formsubmittd"><button type="submit" class="formsubmit">Submit</button></td>
                </tr>
            </table>
        </form>  
@endsection