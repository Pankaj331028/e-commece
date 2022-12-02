@extends('layouts.admin_dashboard')
@section('dashboard-left-title','Update the Page here')
@section('dashboard-right-buttion')
Page
@endsection
@section('content')
<form action="{{route('page.update',$page->id)}}" method="post">
          @method('put')
            @csrf
            <table>
                <tr>
                   <td>Status</td>
                   <td>
                    <select name="status" id="">
                        <option value="">---Select---</option>
                        <option value="1"{{$page->status==1?'selected':''}}>Enable</option>
                        <option value="0"{{$page->status==0?'selected':''}}>Desable</option>
                    </select>
                   </td>
                </tr>
                <tr>
                    <td>title</td>
                    <td><input type="text" name="title" id="" value="{{$page->title}}"></td>
                </tr>
                <tr>
                    <td>Menu title</td>
                    <td><input type="text" name="menu_title" id="" value="{{$page->menu_title}}"></td>
                </tr>
                <tr>
                    <td>show in navigation</td>
                    <td>
                       
                       
                                <div class="slideThree">  
                                <input type="checkbox" id="slideThree" name="show_in_navigation" value="1" {{$page->show_in_navigation==1?'checked':''}} />
                                <label for="slideThree"></label>
                                </div>
                    </td>
                </tr>
                <tr>
                    <td>show in footer</td>
                    <td>
                        <select name="show_in_footer" id="" >
                            <option value="1"{{$page->show_in_footer==1?'selected':''}}>Yes</option>
                            <option value="0"{{$page->show_in_footer==0?'selected':''}}>No</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>description</td>
                    <td><textarea name="description" id="" cols="30" rows="10" value="">{{$page->description}}</textarea></td>
                </tr>
                <tr>
                    <td>Url Key</td>
                    <td><input type="text" name="url_key" id="" value="{{$page->url_key}}"></td>
                </tr>
                <tr>
                    <td>Meta title</td>
                    <td><input type="text" name="meta_title" id="" value="{{$page->meta_title}}"></td>
                </tr>
                <tr>
                    <td>Meta tag</td>
                    <td><input type="text" name="meta_tag" id="" value="{{$page->meta_tag}}"></td>
                </tr>
                <tr>
                    <td>Meta Description</td>
                    <td><input type="textarea" name="meta_description" id="" value="{{$page->meta_description}}"></td>
                </tr>
                <tr >
                    <td colspan="2" class="formsubmittd">
                        <button type="Submit" class="formsubmit">Submit</button>
                    </td>
                </tr>
            </table>
        </form>  
        <script>
                $( document ).ready(function(){
            //   Hide the border by commenting out the variable below
                var $on = 'section';
                $($on).css({
                'background':'none',
                'border':'none',
                'box-shadow':'none'
                });
            }); 
        </script>
        <script>
            CKEDITOR.replace( 'description' );
        </script>
@endsection