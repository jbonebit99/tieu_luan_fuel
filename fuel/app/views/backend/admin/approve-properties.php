

<section class="content-header">
    <h1>
        Duyệt Tin Bất Động Sản
        <small>preview of simple tables</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Administrator</a></li>
        <li><a href="#">Quản Lý Tin Đăng</a></li>
        <li class="active">Duyệt Tin</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Danh Sách Tin Chờ Duyệt</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 10px">ID</th>
                            <th>Tiêu Đề</th>
                            <th>Người Đăng</th>
                            <th>Ngày Đăng</th>
                            <th style="width: 100px">Trạng Thái</th>
                            <th style="width: 200px">Hành Động</th>
                        </tr>
                        <?php
                        foreach ($results as $result):
                        ?>
                        <tr>
                            <td><?php echo $result['id']; ?></td>
                            <td><p class="text-red"><?php echo $result['title']; ?></p></td>
                            <td>
                                <?php echo $result['username']; ?>
                            </td>
                            <td><?php echo Date::forge($result['created_at'])->format("%d/%m/%Y"); ?></td>
                            <td><span class="label label-warning">Chờ Duyệt</span></td>
                            <td>
                                <div class="text-center">
                                    <a class="btn btn-xs btn-bitbucket" title="Xem" ><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-xs btn-success" title="Duyệt"><i class="fa fa-check"></i></a>
                                    <a class="btn btn-xs btn-danger" title="Xoá"><i class="fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <?php
                        endforeach;
                        ?>

                    </table>
                </div>
                <!-- /.box-body -->
                <!--                <div class="box-footer clearfix">-->
                <!--                    <ul class="pagination pagination-sm no-margin pull-right">-->
                <!--                        <li><a href="#">&laquo;</a></li>-->
                <!--                        <li><a href="#">1</a></li>-->
                <!--                        <li><a href="#">2</a></li>-->
                <!--                        <li><a href="#">3</a></li>-->
                <!--                        <li><a href="#">&raquo;</a></li>-->
                <!--                    </ul>-->
                <!--                </div>-->
            </div>
        </div>
        <!-- /.col -->
    </div>
</section>
