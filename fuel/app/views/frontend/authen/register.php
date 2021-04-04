<?php
if (!empty(Arr::get($errors, 'error')) && !empty(\Fuel\Core\Arr::get($errors, 'r_data'))) {
    $r_error_all = \Fuel\Core\Arr::get($errors, 'error');
    $r_data_all = \Fuel\Core\Arr::get($errors, 'r_data');
}

?>


<!-- Titlebar
================================================== -->
<div id="titlebar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h2> Đăng Ký</h2>

                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>Đăng Ký</li>
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
                    <!-- Register -->
                    <div class="tab-content" id="tab2" style="display: none;">
                        <form method="post" class="register" action="/authen/register" id="form_register"
                              name="form_register">

                            <p class="form-row form-row-wide">
                                <label for="username_register">Tên Đăng Nhập:
                                    <i class="im im-icon-Male"></i>
                                    <input type="text" class="input-text" name="username_register"
                                           id="username_register"
                                           value="<?php if (!empty($r_data_all['username_register'])) {
                                               echo $r_data_all['username_register'];
                                           }
                                           ?>" required/>
                                </label>
                            <div id="e_register_username">
                                <?php
                                if (!empty($r_error_all['username_register'])) {
                                    echo "<p style='color:red;'><small>" . $r_error_all['username_register'] . "</small></p>";
                                    ?>
                                    <?php
                                }
                                ?>
                            </div>
                            </p>
                            <p class="form-row form-row-wide">
                                <label for="email_register">Email:
                                    <i class="im im-icon-Mail"></i>
                                    <input type="email" class="input-text" name="email_register" id="email_register"
                                           value="<?php if (!empty($r_data_all['email_register'])) {
                                               echo $r_data_all['email_register'];
                                           } ?>" required/>
                                </label>
                            <div id="e_register_email">
                                <?php
                                if (!empty($r_error_all['email_register'])) {
                                    echo "<p style='color:red;'><small>" . $r_error_all['email_register'] . "</small></p>";
                                    ?>
                                    <?php
                                }
                                ?>
                            </div>
                            </p>

                            <p class="form-row form-row-wide">
                                <label for="password_register">Mật Khẩu:
                                    <i class="im im-icon-Lock-2"></i>
                                    <input class="input-text" type="password" name="password_register"
                                           id="password_register"
                                           value="<?php if (!empty($r_data_all['password_register'])) {
                                               echo $r_data_all['password_register'];
                                           } ?>" required/>
                                </label>
                            <div id="e_register_password"></div>
                            </p>
                            <p class="form-row form-row-wide">
                                <label for="password_register_2">Nhập Lại Mật Khẩu:
                                    <i class="im im-icon-Lock-2"></i>
                                    <input class="input-text" type="password" name="password_confirm"
                                           id="password_confirm" required/>
                                </label>
                            <div id="e_register_password_confirm">
                                <?php
                                if (!empty($r_error_all['password_confirm'])) {
                                    echo "<p style='color:red;'><small>" . $r_error_all['password_confirm'] . "</small></p>";
                                    ?>
                                    <?php
                                }
                                ?>
                            </div>
                            </p>
                            <p class="form-row">
                                <input type="submit" class="button border fw margin-top-10" name="submit_register"
                                       id="submit_register" value="Đăng Ký"/>
                            </p>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
<!-- Container / End -->
