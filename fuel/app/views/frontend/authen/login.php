<?php
if (!empty(\Arr::get($errors, 'error')) && !empty(\Arr::get($errors, 'l_data'))) {
    $l_error_all = \Arr::get($errors, 'error');
    $l_data_all = \Arr::get($errors, 'l_data');

}
?>

<!-- Titlebar
================================================== -->
<div id="titlebar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h2>Đăng Nhập</h2>

                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>Đăng nhập</li>
                    </ul>
                </nav>

            </div>
        </div>
    </div>
</div>


<!-- Container -->
<div class="container">

    <div class="row">
        <div class="col-md-4 col-md-offset-4">

            <button class="button social-login via-facebook"><i class="fa fa-facebook"></i> Log In With
                Facebook
            </button>

            <!--Tab -->
            <div class="my-account style-1 margin-top-5 margin-bottom-40">

                <div class="tabs-container alt">

                    <!-- Login -->
                    <div class="tab-content" id="tab1" style="display: none;">

                        <form method="post" class="login" action="/authen/login" name="form_login" id="form_login">

                            <?php if (!empty(Session::get_flash('error'))): ?>
                                <div class="notification error closeable" id="error_notification">
                                    <p><span>Lỗi!</span> <?php echo Session::get_flash('error') ?>.</p>
                                    <a class="close" href="#"></a>
                                </div>
                            <?php endif; ?>
                            <p class="form-row form-row-wide">
                                <label for="username">Tài Khoản hoặc Email:
                                    <i class="im im-icon-Male"></i>
                                    <input type="text" class="input-text" name="username" id="username"
                                           value="<?php if (!empty($l_data_all['username'])) {
                                               echo $l_data_all['username'];
                                           }
                                           ?>"/>
                                </label>
                            <div id="e_username">
                                <?php
                                if (!empty($l_error_all['username'])) {
                                    echo "<p style='color:red;'><small>" . $l_error_all['username'] . "</small></p>";
                                    ?>
                                    <?php
                                }
                                ?>
                            </div>
                            </p>

                            <p class="form-row form-row-wide">
                                <label for="password">Mật Khẩu:
                                    <i class="im im-icon-Lock-2"></i>
                                    <input class="input-text" type="password" name="password"
                                           id="password" value="<?php if (!empty($l_data_all['password'])) {
                                        echo $l_data_all['password'];
                                    }
                                    ?>"/>
                                </label>
                            <div id="e_password">
                                <?php
                                if (!empty($l_error_all['password'])) {
                                    echo "<p style='color:red;'><small>" . $l_error_all['password'] . "</small></p>";
                                    ?>
                                    <?php
                                }
                                ?>
                            </div>
                            </p>

                            <p class="form-row">
                                <input type="submit" class="button border margin-top-10" name="submit_login"
                                       id="submit_login" value="Đăng Nhập"/>

                                <label for="rememberme" class="rememberme">
                                    <input name="remember" type="checkbox" id="remember" value="forever"/> Ghi Nhớ
                                    Tôi</label>
                            </p>

                            <p class="lost_password">
                                <a href="#">Quên Mật Khẩu?</a>
                            </p>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
<!-- Container / End -->
