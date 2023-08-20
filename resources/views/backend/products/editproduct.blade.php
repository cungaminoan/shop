@extends("backend/master/master")
@section("title", "Edit Product")
@section("main")
    <!--main-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa sản phẩm</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-xs-6 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Sửa sản phẩm</div>
                    @if($errors->any())

                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{$error }}
                            </div>
                        @endforeach
                    @endif
                    <div class="panel-body">
                        <div class="row" style="margin-bottom:40px">
                            <form action="/admin/product/update/{{$product['id']}}" method="post">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Danh mục</label>
                                            <select name="categories_id" class="form-control">
                                                {{showCategory($category, 0, "",$product['categories_id'])}}
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Mã sản phẩm</label>
                                            <input  type="text" name="code" class="form-control" value="{{$product["code"]}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Tên sản phẩm</label>
                                            <input  type="text" name="name" class="form-control" value="{{$product["name"]}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Giá sản phẩm (Giá chung)</label>
                                            <input  type="number" name="price" class="form-control" value="{{$product["price"]}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Sản phẩm có nổi bật</label>
                                            <select  name="featured" class="form-control">
                                                <option @if ($product['featured']==0) {{"selected"}} @endif value="0">Không</option>
                                                <option @if ($product['featured']==1) {{"selected"}} @endif value="1">Có</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Trạng thái</label>
                                            <select  name="state" class="form-control">
                                                <option @if ($product['state']==1) {{"selected"}} @endif value="1">Còn hàng</option>
                                                <option @if ($product['state']==0) {{"selected"}} @endif value="0">Hết hàng</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Ảnh sản phẩm</label>
                                            <input id="img" type="file" name="image" class="form-control hidden"
                                                onchange="changeImg(this)">
                                            <img id="avatar" class="thumbnail" width="100%" height="100%" src="../uploads/{{$product["image"]}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Thông tin</label>
                                            <textarea  id="info" name="info" style="width: 100%;height: 100px;">{{$product['info']}}</textarea>
                                            <script>CKEDITOR.replace("info")</script>
                                        </div>
                                    </div>
                        </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Miêu tả</label>
                                        <textarea id="describer" name="describer" style="width: 100%;height: 100px;">{{$product['describer']}}</textarea>
                                        <script>CKEDITOR.replace("describer")</script>
                                    </div>
                                    <button class="btn btn-success" name="add-product" type="submit">Sửa sản phẩm</button>
                                    <button class="btn btn-danger" type="reset">Huỷ bỏ</button>
                                </div>
                            </div>
                        @csrf
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>

            </div>
        </div>


        <!--/.row-->
    </div>

    <!--end main-->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>



    <script>
     function changeImg(input){
		    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
		    if(input.files && input.files[0]){
		        var reader = new FileReader();
		        //Sự kiện file đã được load vào website
		        reader.onload = function(e){
		            //Thay đổi đường dẫn ảnh
		            $('#avatar').attr('src',e.target.result);
		        }
		        reader.readAsDataURL(input.files[0]);
		    }
		}
		$(document).ready(function() {
		    $('#avatar').click(function(){
		        $('#img').click();
		    });
		});

    </script>
</body>

</html>
@stop