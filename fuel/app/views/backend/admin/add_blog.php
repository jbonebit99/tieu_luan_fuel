<section class="content-header">
    <h1>
        General Form Elements
        <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Thêm bài viết</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST",action ="/admin/create-blog" enctype="multipart/form-data" id="form_create_blog">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title">Tiều đề</label>
                            <input type="text" class="form-control" id="title" name="title"
                                placeholder="Tiêu đề cho bài viết">
                        </div>
                        <div class="form-group">
                            <label for="sub_description">Mô tả ngắn</label>
                            <input type="text" class="form-control" id="sub_description" name="sub_description"
                                placeholder="Đoạn văn bản tóm tắt nội dung">
                        </div>
                        <div class="form-group">
                            <label for="content">Nội dung</label>
                            <div class="box-body pad">
                                    <textarea class="textarea" placeholder="Nhập nội dung vào đây"
                                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="content" id="content"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category">Danh mục</label>
                            <input type="text" class="form-control" id="category" placeholder="Danh mục" name="category">
                        </div>
                        <div class="form-group">
                            <label for="tag">Thẻ</label>
                            <input type="text" class="form-control" id="tag" placeholder="tag" name ="tag" >
                        </div>

                        <div class="form-group">
                            <label for="image">Ảnh đại diện</label>
                            <input type="file" id="image" name ="image">
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Đăng</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->

        <!--/.col (right) -->
    </div>
    <!-- /.row -->
</section>