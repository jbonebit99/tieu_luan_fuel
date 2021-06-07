<!-- Content
================================================== -->

<!-- Map Container -->
<div class="contact-map margin-bottom-55">

    <!-- Google Maps -->
    <div class="google-map-container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.638493710181!2d105.76562691461588!3d10.046660192819154!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0880f08006ffb%3A0x9a745510330faf4e!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBL4bu5IHRodeG6rXQgLSBDw7RuZyBuZ2jhu4cgQ-G6p24gVGjGoQ!5e0!3m2!1svi!2s!4v1622568640122!5m2!1svi!2s" width="1200" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
    <!-- Google Maps / End -->

    <!-- Office -->
    <div class="address-box-container">
        <div class="address-container" data-background-image="<?php echo \Fuel\Core\Asset::get_file('our-office.jpg', 'img') ?>">
            <div class="office-address">
                <h3>Findeo</h3>
                <ul>
                    <li>Đại học Kỹ thuật Công nghệ</li>
                    <li>CẦN THƠ</li>
                    <li>Điện thoại (0939) 693-505</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Office / End -->

</div>
<div class="clearfix"></div>
<!-- Map Container / End -->


<!-- Container / Start -->
<div class="container">

    <div class="row">

        <!-- Contact Details -->
        <div class="col-md-4">

            <h4 class="headline margin-bottom-30">Liên Hệ</h4>

            <!-- Contact Details -->
            <div class="sidebar-textbox">
                <p>Đây là tiểu luận phát triển bởi sinh viên<br> <strong style="color: red; font-size: 17px">Đinh Xuân
                        Trường</strong><br>Cung cấp cho người dùng hệ thống đăng tin mua bán bất động sản sử dụng
                    Framework Fuel PHP và Template <a href="https://themeforest.net/item/findeo-real-estate-html-template/18936684">Findeo</a>.
                </p>

                <ul class="contact-details">
                    <li><i class="im im-icon-Phone-2"></i> <strong>Điện thoại:</strong> <span>(0939) 693-505 </span>
                    </li>
                    <li><i class="im im-icon-Globe"></i> <strong>Web:</strong> <span><a href="#">www.dxt.com.vn</a></span></li>
                    <li><i class="im im-icon-Envelope"></i> <strong>E-Mail:</strong> <span><a href="mailto:">dxtruong.ktpm0217@student.ctuet.edu.vn</a></span>
                    </li>
                </ul>
            </div>

        </div>

        <!-- Contact Form -->
        <div class="col-md-8">

            <section id="contact">
                <h4 class="headline margin-bottom-35">Gửi Thắc Mắc Cho Chúng Tôi</h4>

                <div id="contact-message"></div>

                <form method="post" action="/contact/post" name="contactform" id="contactform" autocomplete="on">

                    <div class="row">
                        <div class="col-md-6">
                            <div>
                                <input name="name" type="text" id="name" placeholder="Tên Của Bạn" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div>
                                <input name="email" type="email" id="email" placeholder="Địa Chỉ Email" pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$" />
                            </div>
                        </div>
                    </div>

                    <div>
                        <input name="subject" type="text" id="subject" placeholder="Tiêu Đề" required="required" />
                    </div>

                    <div>
                        <textarea name="comments" cols="40" rows="3" id="comments" placeholder="Nội Dung" spellcheck="true" required="required"></textarea>
                    </div>

                    <input type="submit" class="submit button" id="submit_contact" name="submit_contact" value="Gửi Cho Chúng Tôi" />

                </form>
            </section>
        </div>
        <!-- Contact Form / End -->

    </div>

</div>