 <!-- Content Header (Page header) -->
 <section class="content-header">
     <h1>
         Data Tables
         <small>advanced tables</small>
     </h1>
     <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="#">Tables</a></li>
         <li class="active">Data tables</li>
     </ol>
 </section>

 <!-- Main content -->
 <section class="content">
     <div class="row">
         <div class="col-xs-12">
             <div class="box">
                 <div class="box-header">
                     <h3 class="box-title">Hover Data Table</h3>
                 </div>
                 <!-- /.box-body -->
             </div>
             <!-- /.box -->

             <div class="box">
                 <div class="box-header">
                     <h3 class="box-title">Data Table With Full Features</h3>
                 </div>
                 <!-- /.box-header -->
                 <div class="box-body">
                     <table id="example1" class="table table-bordered table-striped">
                         <thead>
                             <tr>
                                 <th style="width: 40px">ID</th>
                                 <th>Ảnh đại diện</th>
                                 <th>Tiêu đề</th>
                                 <th>Ngày đăng</th>
                                 <th>Trạng thái</th>
                                 <th style="width: 130px">Hành động</th>
                             </tr>
                         </thead>
                         <tbody>
                         <?php 
                         foreach (Arr::get($content,"blogs") as $key => $value):
                         ?>
                             <tr>
                                 <td><?php echo $value['id'];?></td>
                                 <td><?php echo Asset::img($value['image'],array('width'=>'50px'));?>
                                 </td>
                                 <td><?php echo $value['title'];?></td>
                                 <td> <?php echo Date::forge($value['created_at'])->format("%m/%d/%Y");?></td>
                                 <td><?php echo $value['status']?></td>
                                 <td>
                                     <div class="btn-group">
                                         <button type="button" class="btn btn-default btn-sm">Hành động</button>
                                         <button type="button" class="btn btn-default btn-sm dropdown-toggle"
                                             data-toggle="dropdown">
                                             <span class="caret"></span>
                                             <span class="sr-only">Toggle Dropdown</span>
                                         </button>
                                         <ul class="dropdown-menu" role="menu">
                                             <li><a href="/admin/hide-blog/<?php echo $value['id'];?>">Ẩn</a></li>
                                             <li><a href="/admin/edit-blog/<?php echo $value['id'];?>">Sửa</a></li>
                                             <li class="divider"></li>
                                             <li><a href="/admin/delete-blog/<?php echo $value['id'];?>">Xóa</a></li>
                                         </ul>
                                     </div>
                                 </td>
                             </tr>
                                <?php 
                                  endforeach;
                                ?>
                         </tbody>
                         <tfoot>
                             <tr>
                                 <th>Rendering engine</th>
                                 <th>Browser</th>
                                 <th>Platform(s)</th>
                                 <th>Engine version</th>
                                 <th>CSS grade</th>
                             </tr>
                         </tfoot>
                     </table>
                 </div>
                 <!-- /.box-body -->
             </div>
             <!-- /.box -->
         </div>
         <!-- /.col -->
     </div>
     <!-- /.row -->
 </section>
 <!-- /.content -->
 </div>