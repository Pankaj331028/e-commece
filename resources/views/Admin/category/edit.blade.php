<!DOCTYPE html>
<html>
<head>
@include('includes/admin.head')
<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>

</head>

<body>
    @include('includes/admin.header')
    @include('includes/admin.navigation')
    <div class="right_board">
    @include('includes/admin.right-header') 
    <div class="dashboard_name">
		<div>Update the Category details</div>
		<div>Category</div>
		
	</div>
        <form action="{{route('category.update',$category->id)}}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <table>
                <tr>
                    <td>Parent Category</td>
                    <td>
                        <!-- <input type="text" name="parent_category" id="" value="{{$category->parent_category}}"> -->
                        <select name="parent_category" id="">
                            <option value="0">Parent Category</option>
                            @foreach($categoryData as $_category)
                            <option value="{{$_category->id}}" {{$category->parent_category==$_category->id?'selected':''}}>{{$_category->category_name}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Category Name</td>
                    <td><input type="text" name="category_name" id="" value="{{$category->category_name}}"></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status" id="">
                            <option value="">---Select Status---</option>
                            <option value="1" {{$category->status===1?'selected':''}}>Active</option>
                            <option value="0" {{$category->status===0?'selected':''}}>Deactive</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Include In Menu</td>
                    <td>
                        <!-- <input type="text" name="include_in_menu" id="" value="{{$category->include_in_menu}}"> -->
                        <!-- <select name="include_in_menu" id="">
                            <option value="1"{{$category->include_in_menu===1?'selected':''}}>Yes</option>
                            <option value="0" {{$category->include_in_menu===0?'selected':''}}>NO</option>
                        </select> -->
                        <div class="slideThree">  
                            <input type="checkbox" id="slideThree" name="include_in_menu" value="1" {{$category->include_in_menu==1?'checked':''}} />
                            <label for="slideThree"></label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Thumbnail Image</td>
                    <td><input type="file" name="thumbnail_image" id="" >
                    <img src="{{$category->getFirstMediaUrl('thumbnail_image', 'thumb')}}" / width="120px">
                </td>
                </tr>
                <tr>
                    <td>description</td>
                    <!-- <td><input type="textarea" name="description" id="" value="{{$category->description}}"></td> -->
                    <td>
                    <textarea name="description" id="" cols="30" rows="10">{{$category->description}}</textarea>
                   </td>
                </tr>
                <tr>
                    <td>Url key</td>
                    <td><input type="text" name="url_key" id="" value="{{$category->url_key}}"></td>
                </tr>
                <tr>
                    <td>Meta Title</td>
                    <td><input type="text" name="meta_title" id="" value="{{$category->meta_title}}"></td>
                </tr>
                <tr>
                    <td>Meta keyword</td>
                    <td><input type="text" name="meta_keyword" id="" value="{{$category->meta_keyword}}"></td>
                </tr>
                <tr>
                    <td>Meta Desc</td>
                    <td><input type="text" name="meta_desc" id="" value="{{$category->meta_desc}}"></td>
                </tr>
                <tr>
                    <td colspan="2" class="formsubmittd">
                        <button type="Submit" class="formsubmit" >Update</button>
                    </td>
                </tr>
            </table>
        </form>

    </div>
    @include('includes/admin.script')
</body>

<script>
     CKEDITOR.replace( 'description' );
</script>
</html>