<!-- Titlebar
================================================== -->
<div id="titlebar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h2>Tin Đăng Của Tôi</h2>

                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>Tin Đăng Của Tôi</li>
                    </ul>
                </nav>

            </div>
        </div>
    </div>
</div>


<!-- Content
================================================== -->
<div class="container">
    <div class="row">


        <!-- Widget -->
        <div class="col-md-4">
            <div class="sidebar left">

                <div class="my-account-nav-container">

                    <ul class="my-account-nav">
                        <li class="sub-nav-title">Quản Lý Tài Khoản</li>
                        <li><a href="/account/my-profile/"><i class="sl sl-icon-user"></i> Thông Tin</a></li>
                        <li><a href="/account/my-bookmarks.html"><i class="sl sl-icon-star"></i> Yêu Thích</a></li>
                    </ul>

                    <ul class="my-account-nav">
                        <li class="sub-nav-title">Quản Lý Tin</li>
                        <li><a href="/account/my-properties.html" class="current"><i class="sl sl-icon-docs"></i> Tin
                                Đăng Của Tôi</a></li>
                        <li><a href="/submit-property.html"><i class="sl sl-icon-action-redo"></i> Đăng Tin</a></li>
                    </ul>

                    <ul class="my-account-nav">
                        <li><a href="/account/change-password.html"><i class="sl sl-icon-lock"></i> Đổi Mật Khẩu</a>
                        </li>
                        <li><a href="/authen/logout"><i class="sl sl-icon-power"></i> Đăng Xuất</a></li>
                    </ul>

                </div>

            </div>
        </div>

        <div class="col-md-8">
            <table class="manage-table responsive-table">

                <tr>
                    <th><i class="fa fa-file-text"></i> Tin Bất Động Sản</th>
                    <th class="expire-date"><i class="fa fa-calendar"></i> Ngày Hết Hạn</th>
                    <th></th>
                </tr>
                <?php
                \Asset::add_path('uploads/img', 'img');
                foreach (\Arr::get($content, "properties") as $value):
                    ?>
                    <!-- Item #1 -->
                    <tr id="<?php echo $value['id'] ?>">
                        <td class="title-container">
                            <?php
                            foreach (explode('/', $value['src']) as $file):
                                ?>
                                <img src="<?php echo \Asset::get_file($file, 'img'); ?>" alt="">
                                <?php
                                break;
                            endforeach;
                            ?>
                            <div class="title">
                                <h4><a href="/<?php  echo $value['shape']; ?>/preview/<?php echo $value['id'];?>"><?php echo $value['title']; ?></a></h4>
                                <span><?php echo $value['address'] . ", " . $value['ward'] . ", " . $value['district'] . ", " . $value['province']; ?> </span>
                                <span class="table-property-price"><?php echo $value['price'] . " triệu"; ?></span>
                            </div>
                        </td>
                        <td class="expire-date"><?php echo date('d / m / Y' ,$value['expiration_date']); ?></td>
                        <td class="action">
                            <a href="#"><i class="fa fa-pencil"></i> Sửa</a>
                            <?php
                            if ($value['status'] == 1) {
                                ?>
                                <a href="/account/my-properties/hide/<?php echo $value['id']?>"><i class="fa  fa-eye-slash"></i> Ẩn</a>
                                <?php
                            } else {
                                ?>
                                <a href="/account/my-properties/show/<?php echo $value['id']?>"><i class="fa  fa-eye"></i> Hiện</a>
                                <?php
                            }
                            ?>

                            <a href="/account/my-properties/delete/<?php echo $value['id']?>" class="delete"><i class="fa fa-remove"></i> Xoá</a>
                        </td>
                    </tr>
                <?php
                endforeach;
                ?>


            </table>
            <!--            <a href="submit-property.html" class="margin-top-40 button">Submit New Property</a>-->
        </div>



    </div>
</div>
