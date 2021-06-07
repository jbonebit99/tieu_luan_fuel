

<section class="content-header">
    <h1>
        Quản Lý Thành Viên
        <small>preview of simple tables</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Administrator</a></li>
        <li><a href="#">Quản lý liên hệ</a></li>
        <li class="active">Danh sách liên hệ</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Danh Sách Liên Hệ</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 10px">ID</th>
                            <th>Tên</th>
                            <th>Ngày Gửi</th>
                            <th>Email</th>
                            <th>Tiêu đề</th>
                            <th>Nội dung</th>
                            <th style="width: 200px">Hành Động</th>
                        </tr>
                        <?php
                        foreach ($results as $result):
                        ?>
                        <tr>
                            <td><?php echo $result['id']; ?></td>
                            <td><p class="text-red"><?php echo $result['name']; ?></p></td>
                            <td>
                            <?php echo Date::forge($result['created_at'])->format("%d/%m/%Y");?>
                            </td>
                            <td><?php echo $result['email']; ?></td>
                            <td><?php echo $result['subject']; ?></td>
                            <td><?php echo $result['comments']; ?></span></td>
                            <td>
                                <div class="text-center">
                                    <a href="<?php echo '/admin/contacts/delete/'.$result['id']; ?>" class="btn btn-xs btn-danger" title="Xoá"><i class="fa fa-trash"></i></a>
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
