<!-- Content
================================================== -->

<!-- Map Container -->
<div class="contact-map margin-bottom-55">

    <!-- Google Maps -->
    <div class="google-map-container">
        <div id="propertyMap" data-latitude="40.7427837" data-longitude="-73.11445617675781"></div>
        <a href="#" id="streetView">Street View</a>
    </div>
    <!-- Google Maps / End -->

    <!-- Office -->
    <div class="address-box-container">
        <div class="address-container"
             data-background-image="<?php echo \Fuel\Core\Asset::get_file('our-office.jpg', 'img') ?>">
            <div class="office-address">
                <h3>Our Office</h3>
                <ul>
                    <li>45 Park Avenue, Apt. 303</li>
                    <li>New York, NY 10016</li>
                    <li>Phone (123) 123-456</li>
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
                    Framework Fuel PHP và Template <a
                            href="https://themeforest.net/item/findeo-real-estate-html-template/18936684">Findeo</a>.
                </p>

                <ul class="contact-details">
                    <li><i class="im im-icon-Phone-2"></i> <strong>Điện thoại:</strong> <span>(0939) 693-505 </span>
                    </li>
                    <li><i class="im im-icon-Globe"></i> <strong>Web:</strong> <span><a
                                    href="#">www.dxt.com.vn</a></span></li>
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
                                <input name="name" type="text" id="name" placeholder="Tên Của Bạn"  />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div>
                                <input name="email" type="email" id="email" placeholder="Địa Chỉ Email"
                                       pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$"
                                      />
                            </div>
                        </div>
                    </div>

                    <div>
                        <input name="subject" type="text" id="subject" placeholder="Tiêu Đề" required="required"/>
                    </div>

                    <div>
                        <textarea name="comments" cols="40" rows="3" id="comments" placeholder="Nội Dung"
                                  spellcheck="true" required="required"></textarea>
                    </div>

                    <input type="submit" class="submit button" id="submit_contact" name="submit_contact"
                           value="Gửi Cho Chúng Tôi"/>

                </form>
            </section>
        </div>
        <!-- Contact Form / End -->

    </div>

</div>
