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
		<div>Add the Category here</div>
		<div>Category</div>
		
	</div>
        <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <table>
                <tr>
                    <td>Parent Category</td>
                    <td>
                        <!-- <input type="text" name="parent_category" id=""> -->
                        <select name="parent_category" id="">
                            <option value="0">Parent Category</option>
                            @foreach($categoryData as $_category)
                            <option value="{{$_category->id}}">{{$_category->category_name}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Category Name</td>
                    <td><input type="text" name="category_name" id=""></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status" id="">
                            <option value="">---Select Status---</option>
                            <option value="1">Active</option>
                            <option value="0">Deactive</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Include In Menu</td>
                    <td>
                        <!-- <input type="text" name="include_in_menu" id=""> -->
                       
                                <div class="slideThree">  
                                <input type="checkbox" id="slideThree" name="include_in_menu" value="1" />
                                <label for="slideThree"></label>
                                </div>
                    </td>
                </tr>
                <tr>
                    <td>Thumbnail Image</td>
                    <td><input type="file" name="thumbnail_image" id=""></td>
                </tr>
                <tr>
                    <td>description</td>
                    <!-- <td><input type="textarea" name="description" id=""></td> -->
                    <td>
                    <textarea name="description" id="" cols="30" rows="10"></textarea>
                   </td>
                </tr>
                <tr>
                    <td>Url key</td>
                    <td><input type="text" name="url_key" id=""></td>
                </tr>
                <tr>
                    <td>meta_title</td>
                    <td><input type="text" name="meta_title" id=""></td>
                </tr>
                <tr>
                    <td>Meta keyword</td>
                    <td><input type="text" name="meta_keyword" id=""></td>
                </tr>
                <tr>
                    <td>Meta Desc</td>
                    <td><input type="text" name="meta_desc" id=""></td>
                </tr>
                <tr >
                    <td colspan="2" class="formsubmittd">
                        <button type="Submit" class="formsubmit">Submit</button>
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
</html>