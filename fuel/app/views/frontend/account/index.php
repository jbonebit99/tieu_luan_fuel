<?php
$arr_info_user = \Arr::get($info_user, 'info');
\Asset::add_path('uploads/avatar','img');
?>
<!-- Titlebar
================================================== -->
<div id="titlebar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h2>Tài Khoản Của Tôi</h2>

                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>My Profile</li>
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
                        <li><a href="/account/my-profile/" class="current"><i class="sl sl-icon-user"></i> Thông Tin</a>
                        </li>
                        <li><a href="/account/my-bookmarks.html"><i class="sl sl-icon-star"></i> Yêu Thích</a></li>
                    </ul>

                    <ul class="my-account-nav">
                        <li class="sub-nav-title">Manage Listings</li>
                        <li><a href="/account/my-properties.html"><i class="sl sl-icon-docs"></i> Tin Đăng Của Tôi</a>
                        </li>
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
            <div class="row">
                <form action="/account/my-profile" method="post" enctype="multipart/form-data">
                    <div class="col-md-8 my-profile">
                        <h4 class="margin-top-0 margin-bottom-30">Tài Khoản Của Tôi</h4>

                        <label>Tên Của Bạn</label>
                        <input value="<?php echo $arr_info_user['name'];?>" type="text" name="name">

                        <label>Tiêu Đề</label>
                        <input value="<?php echo $arr_info_user['title'];?>" type="text" name="title">

                        <label>Điện Thoại</label>
                        <input value="<?php echo $arr_info_user['phone'];?>" type="text" name="phone">

                        <label>Email</label>
                        <input value="<?php echo \Auth::get_email();?>" type="text" name="email" disabled>


                        <h4 class="margin-top-50 margin-bottom-25">Giới Thiệu</h4>
                        <textarea name="about_me" id="about_me" cols="30" rows="10"><?php echo $arr_info_user['about_me'];?></textarea>


                        <h4 class="margin-top-50 margin-bottom-0">Mạng Xã Hội</h4>

                        <label><i class="fa fa-twitter"></i> Twitter</label>
                        <input value="<?php echo $arr_info_user['twitter'];?>" type="text" name="twitter">

                        <label><i class="fa fa-facebook-square"></i> Facebook</label>
                        <input value="<?php echo $arr_info_user['facebook'];?>" type="text" name="facebook">

                        <label><i class="fa fa-google-plus"></i> Google+</label>
                        <input value="<?php echo $arr_info_user['google_plus'];?>" type="text" name="google_plus">

                        <input type="submit" class="submit button" id="submit-properties" name="submit-properties"
                               value="Lưu Thông Tin"/>
                    </div>
                    <div class="col-md-4">
                        <!-- Avatar -->
                        <div class="edit-profile-photo">
                             <img src="<?php echo \Asset::get_file($arr_info_user['avatar'],'img') ?>" alt="">
<!--                            --><?php //echo Asset::img('agent-02.jpg'); ?>
                            <div class="change-photo-btn">
                                <div class="photoUpload">
                                    <span><i class="fa fa-upload"></i> Upload Photo</span>
                                    <input type="file" class="upload" name="avatar"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
