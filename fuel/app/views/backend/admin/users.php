

<section class="content-header">
    <h1>
        Quản Lý Thành Viên
        <small>preview of simple tables</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Administrator</a></li>
        <li><a href="#">Người dùng</a></li>
        <li class="active">Danh sách người dùng</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Danh Sách Thành Viên</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 10px">ID</th>
                            <th>Tên Đăng Nhập</th>
                            <th>Ngày Tham gia</th>
                            <th>Last Login</th>
                            <th>Loại tài khoản</th>
                            <th style="width: 100px">Vai Trò</th>
                            <th style="width: 200px">Hành Động</th>
                        </tr>
                        <?php
                        foreach ($results as $result):
                        ?>
                        <tr>
                            <td><?php echo $result['id']; ?></td>
                            <td><p class="text-red"><?php echo $result['username']; ?></p></td>
                            <td>
                            <?php echo Date::forge($result['created_at'])->format("%d/%m/%Y"); ?>
                            </td>
                            <td><?php echo Date::forge($result['last_login'])->format("%d/%m/%Y"); ?></td>
                            <td><?php echo $result['account_type']; ?></td>
                            <td><span class="label label-warning"><?php echo $result['group']; ?></span></td>
                            <td>
                                <div class="text-center">
                                    <a href="" class="btn btn-xs btn-success" title="Duyệt"><i class="fa fa-check"></i></a>
                                    <a href="" class="btn btn-xs btn-danger" title="Xoá"><i class="fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <?php
                        endforeach;
                        ?>

                    </table>
                </div>

            </div>
        </div>
        <!-- /.col -->
    </div>
</section>
