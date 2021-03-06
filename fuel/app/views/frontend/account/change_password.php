<!-- Titlebar
================================================== -->
<div id="titlebar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h2>Thay Đổi Mật Khẩu</h2>

                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>Change Password</li>
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
                        <li class="sub-nav-title">Quản Lý Tài Khoản </li>
                        <li><a href="/account/my-profile/"><i class="sl sl-icon-user"></i> Thông Tin</a></li>
                        <li><a href="/account/my-bookmarks.html"><i class="sl sl-icon-star"></i> Yêu Thích</a></li>
                    </ul>

                    <ul class="my-account-nav">
                        <li class="sub-nav-title">Quản Lý Tin</li>
                        <li><a href="/account/my-properties.html"><i class="sl sl-icon-docs"></i> Tin Đăng Của Tôi</a>
                        </li>
                        <li><a href="/submit-property.html"><i class="sl sl-icon-action-redo"></i> Đăng Tin</a></li>
                    </ul>

                    <ul class="my-account-nav">
                        <li><a href="/account/change-password.html" class="current"><i class="sl sl-icon-lock"></i> Đổi
                                Mật Khẩu</a></li>
                        <li><a href="/authen/logout"><i class="sl sl-icon-power"></i> Đăng Xuất</a></li>
                    </ul>

                </div>

            </div>
        </div>

        <div class="col-md-8">
            <div class="row">
                <form action="/authen/change-password" method="POST" id="form_change_password">
                    <div class="col-md-6  my-profile">
                        <h4 class="margin-top-0 margin-bottom-30">Thay Đổi Mật Khẩu</h4>
                        <label>Mật Khẩu Cũ</label>
                        <input type="password" name="old_password" id="old_password" required />

                        <label>Mật Khẩu Mới</label>
                        <input type="password" name="new_password" id="new_password" required />

                        <label>Xác Nhận Mật Khẩu Mới</label>
                        <input type="password" name="confirm_password" required />
                        <a href="#" id="s_button" class="margin-top-20 button">Lưu thay đổi</a>
                    </div>
                </form>

                <div class="col-md-6">
                    <div class="notification notice">
                        <p>Mật khẩu nên có chữ hoa, chữ thường, ký tự đặc biệt và ít nhất 6 ký tự.</p>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>