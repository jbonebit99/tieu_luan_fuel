<!DOCTYPE html>

<head>

    <!-- Basic Page Needs
================================================== -->
    <title><?php echo $title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
================================================== -->
    <?php echo Asset::css('style.css'); ?>
    <?php echo Asset::css('color.css'); ?>
    <?php echo Asset::css('image-uploader.min.css'); ?>
    <?php echo Asset::css('leaflet/leaflet.css',array('integrity'=>'sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==','crossorigin'=>''));?>
    <?php echo Asset::js('ckeditor/ckeditor.js'); ?>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />

    <!-- Scripts
================================================== -->
    <?php echo Asset::js('jquery-3.4.1.min.js'); ?>
    <?php echo Asset::js('jquery-migrate-3.1.0.min.js'); ?>
    <?php echo Asset::js('image-uploader.min.js'); ?>
    <?php echo Asset::js('leaflet/leaflet.js',array('integrity'=>'sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==','crossorigin'=>''));?>
    <?php echo Asset::js('chosen.min.js'); ?>
    <?php echo Asset::js('magnific-popup.min.js'); ?>
    <?php echo Asset::js('owl.carousel.min.js'); ?>
    <?php echo Asset::js('rangeSlider.js'); ?>
    <?php echo Asset::js('sticky-kit.min.js'); ?>
    <?php echo Asset::js('slick.min.js'); ?>
    <?php echo Asset::js('masonry.min.js'); ?>
    <?php echo Asset::js('mmenu.min.js'); ?>
    <?php echo Asset::js('tooltips.min.js'); ?>
    <?php echo Asset::js('custom.js'); ?>
    <?php echo Asset::js('compare.js'); ?>
    <script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>
    <?php echo Asset::js('geoip/leaflet-geoip.js'); ?>


</head>

<body>
    <!-- Wrapper -->
    <div id="wrapper">


        <!-- Compare Properties Widget
================================================== -->
        <div class="compare-slide-menu" id="compare">

            <div class="csm-trigger"></div>

            <div class="csm-content">
                <h4>So S??nh B???t ?????ng S???n
                    <div class="csm-mobile-trigger"></div>
                </h4>

                <div class="csm-properties">

                    <!-- Property -->
                    <div class="listing-item compact">
                        <a href="single-property-page-2.html" class="listing-img-container">
                            <div class="remove-from-compare"><i class="fa fa-close"></i></div>
                            <div class="listing-badges">
                                <span>For Sale</span>
                            </div>
                            <div class="listing-img-content">
                                <span class="listing-compact-title">Eagle Apartments <i>$420,000</i></span>
                            </div>
                            <!-- <img src="images/listing-01.jpg" alt=""> -->
                            <?php echo Asset::img('listing-01.jpg') ?>
                        </a>
                    </div>

                    <!-- Property -->
                    <div class="listing-item compact">
                        <a href="single-property-page-2.html" class="listing-img-container">
                            <div class="remove-from-compare"><i class="fa fa-close"></i></div>
                            <div class="listing-badges">
                                <span>For Sale</span>
                            </div>
                            <div class="listing-img-content">
                                <span class="listing-compact-title">Selway Apartments <i>$420,000</i></span>
                            </div>
                            <!-- <img src="images/listing-03.jpg" alt=""> -->
                            <?php echo Asset::img('listing-03.jpg') ?>
                        </a>
                    </div>

                    <!-- Property -->
                    <div class="listing-item compact" id="12">
                        <a href="single-property-page-2.html" class="listing-img-container">
                            <div class="remove-from-compare"><i class="fa fa-close"></i></div>
                            <div class="listing-badges">
                                <span>For Sale</span>
                            </div>
                            <div class="listing-img-content">
                                <span class="listing-compact-title">Oak Tree Villas <i>$535,000</i></span>
                            </div>
                            <!-- <img src="images/listing-05.jpg" alt=""> -->
                            <?php echo Asset::img('listing-05.jpg') ?>
                        </a>
                    </div>

                </div>

                <div class="csm-buttons">
                    <a href="compare-properties.html" class="button">Compare</a>
                    <a href="#" class="button reset">Reset</a>
                </div>
            </div>

        </div>
        <!-- Compare Properties Widget / End -->


        <!-- Header Container
================================================== -->
        <header id="header-container">

            <!-- Topbar -->
            <div id="top-bar">
                <div class="container">

                    <!-- Left Side Content -->
                    <div class="left-side">

                        <!-- Top bar -->
                        <ul class="top-bar-menu">
                            <li><i class="fa fa-phone"></i> (0868) 977-654</li>
                            <li><i class="fa fa-envelope"></i> <a href="#">office@example.com</a></li>
                            <li>
                                <div class="top-bar-dropdown">
                                    <span>Ng??n Ng???</span>
                                    <ul class="options">
                                        <li>
                                            <div class="arrow"></div>
                                        </li>
                                        <li><a href="#">Nice First Link</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>

                    </div>
                    <!-- Left Side Content / End -->


                    <!-- Left Side Content -->
                    <div class="right-side">

                        <!-- Social Icons -->
                        <ul class="social-icons">
                            <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
                            <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
                            <li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
                            <li><a class="pinterest" href="#"><i class="icon-pinterest"></i></a></li>
                        </ul>

                    </div>
                    <!-- Left Side Content / End -->

                </div>
            </div>
            <div class="clearfix"></div>
            <!-- Topbar / End -->


            <!-- Header -->
            <div id="header">
                <div class="container">

                    <!-- Left Side Content -->
                    <div class="left-side">

                        <!-- Logo -->
                        <div id="logo">
                            <a href="/"><?php echo Asset::img('logo.png'); ?></a>
                        </div>


                        <!-- Mobile Navigation -->
                        <div class="mmenu-trigger">
                            <button class="hamburger hamburger--collapse" type="button">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>


                        <!-- Main Navigation -->
                        <nav id="navigation" class="style-1">
                            <ul id="responsive">

                                <li><a href="/" <?php if ($subnav == 'home'): ?> class="current"
                                        <?php endif; ?>>Home</a>
                                </li>

                                <li>
                                    <a href="/sale" <?php if ($subnav == 'sale'): ?> class="current"
                                        <?php endif; ?>>B??n</a>
                                    <ul>
                                        <li><a href="#">C??n H??? Chung C??</a>
                                            <ul>
                                                <li><a href="#">Chung C?? Mini</a></li>
                                                <li><a href="#">Chung C?? Cao C???p</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="/sale/houses">Nh?? Ri??ng</a></li>
                                        <li><a href="/sale/lands">?????t</a></li>
                                </li>
                                </li>
                            </ul>


                            <li><a href="/rent" <?php if ($subnav == 'rent'): ?> class="current"
                                    <?php endif; ?>>Thu??</a>
                                <ul>
                                    <li><a href="#">C??n H???</a>
                                        <ul>
                                            <li><a href="#">Chung C?? Mini</a></li>
                                            <li><a href="#">Chung C?? Cao C???p</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="/rent/ware-housing">Kho B??i</a></li>
                                    <li><a href="/rent/office">V??n Ph??ng</a></li>
                                </ul>
                            </li>

                            <li><a href="#" <?php if ($subnav == 'blog' || $subnav == 'compare-properties' ): ?>
                                    class="current" <?php endif; ?>>Ti???n ??ch</a>
                                <ul>
                                    <li><a href="/blog">B??i Vi???t</a></li>
                                    <li><a href="/compare-properties">So S??nh</a></li>
                                    <li><a href="/submit-property">????ng Tin</a></li>
                                </ul>
                            </li>
                            <li><a href="/contact" <?php if ($subnav == 'contact'): ?> class="current"
                                    <?php endif; ?>>Li??n H???</a></li>

                            </ul>
                        </nav>
                        <div class="clearfix"></div>
                        <!-- Main Navigation / End -->

                    </div>
                    <!-- Left Side Content / End -->

                    <!-- Right Side Content / End -->
                    <div class="right-side">
                        <!-- Header Widget -->
                        <div class="header-widget">
                            <?php
                        if (\Auth\Auth::check()) {
                            ?>
                            <div class="user-menu">
                                <div class="user-name">
                                    <span><?php echo Asset::img('user2-160x160.jpg'); ?></span>Hi,
                                    <?php echo \Auth\Auth::get_screen_name(); ?>
                                    !
                                </div>
                                <ul>
                                    <li><a href="/account/my-profile.html"><i class="sl sl-icon-user"></i> My
                                            Profile</a></li>
                                    <li><a href="/account/my-bookmarks.html"><i class="sl sl-icon-star"></i>
                                            Bookmarks</a></li>
                                    <li><a href="/account/my-properties.html"><i class="sl sl-icon-docs"></i> My
                                            Properties</a></li>
                                    <li><a href="/authen/logout"><i class="sl sl-icon-power"></i> Log Out</a></li>
                                </ul>
                            </div>
                            <?php
                        } else {
                            ?>
                            <a href="/authen/login" class="sign-in"><i class="fa fa-user"></i> ????ng Nh???p</a>
                            <a href="/authen/register" class="sign-in"><i class="fa fa-pencil-square-o"></i> ????ng K??</a>
                            <?php
                        }
                        ?>
                            <a href="/submit-property" class="button border">????ng Tin</a>
                        </div>


                        <!-- Header Widget / End -->
                    </div>
                    <!-- Right Side Content / End -->

                </div>
            </div>
            <!-- Header / End -->

        </header>
        <div class="clearfix"></div>
        <!-- Header Container / End -->


        <?php echo $content; ?>


        <!-- Flip banner -->
        <a href="#" class="flip-banner parallax"
            data-background="<?php echo \Fuel\Core\Asset::get_file('flip-banner-bg.jpg', 'img') ?>" data-color="#274abb"
            data-color-opacity="0.9" data-img-width="2500" data-img-height="1600">
            <div class="flip-banner-content">
                <h2 class="flip-visible">Gi???i Ph??p Cho Kinh Doanh B???t ?????ng S???n</h2>
                <h2 class="flip-hidden"> Xem Ngay<i class="sl sl-icon-arrow-right"></i></h2>
            </div>
        </a>
        <!-- Flip banner / End -->


        <!-- Footer
================================================== -->
        <div id="footer" class="sticky-footer">
            <!-- Main -->
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-6">
                        <?php echo Asset::img('logo.png'); ?>
                        <!-- <img class="footer-logo" src="images/logo.png" alt=""> -->
                        <br><br>
                        <p>????y l?? ti???u lu???n ph??t tri???n b???i sinh vi??n<br> <strong
                                style="color: red; font-size: 20px">??inh
                                Xu??n Tr?????ng</strong>.<br>Cung c???p cho ng?????i d??ng h??? th???ng ????ng tin mua b??n b???t ?????ng s???n
                            s???
                            d???ng Framework Fuel PHP v?? Template <a
                                href="https://themeforest.net/item/findeo-real-estate-html-template/18936684">Findeo</a>.
                        </p>
                    </div>

                    <div class="col-md-4 col-sm-6 ">
                        <h4>Li??n K???t</h4>
                        <ul class="footer-links">
                            <li><a href="/authen/login">????ng Nh???p</a></li>
                            <li><a href="/submit-properties">????ng Tin</a></li>
                            <li><a href="#">Ch??nh S??ch B???o M???t</a></li>
                        </ul>

                        <ul class="footer-links">
                            <li><a href="#">FAQ</a></li>
                            <li><a href="/blog">B??i Vi???t</a></li>
                            <li><a href="/contact">Li??n H???</a></li>
                            <li><a href="/pricing-tables">B???ng Gi??</a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="col-md-3  col-sm-12">
                        <h4>Li??n H???</h4>
                        <div class="text-widget">
                            <span>??H K??? Thu??t - C??ng Ngh??? C???n Th??</span> <br>
                            ??i???n Tho???i: <span>0939693505 </span><br>
                            E-Mail:<span> <a href="#">office@example.com</a> </span><br>
                        </div>

                        <ul class="social-icons margin-top-20">
                            <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
                            <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
                            <li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
                            <li><a class="vimeo" href="#"><i class="icon-vimeo"></i></a></li>
                        </ul>

                    </div>

                </div>

                <!-- Copyright -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyrights">?? 2021 Findeo. All Rights Reserved.</div>
                    </div>
                </div>

            </div>

        </div>
        <!-- Footer / End -->


        <!-- Back To Top Button -->
        <div id="backtotop"><a href="#"></a></div>


        <!-- Google Autocomplete -->
        <!--    <script>-->
        <!--        function initAutocomplete() {-->
        <!--            var input = document.getElementById('autocomplete-input');-->
        <!--            var autocomplete = new google.maps.places.Autocomplete(input);-->
        <!---->
        <!--            autocomplete.addListener('place_changed', function () {-->
        <!--                var place = autocomplete.getPlace();-->
        <!--                if (!place.geometry) {-->
        <!--                    window.alert("No details available for input: '" + place.name + "'");-->
        <!--                    return;-->
        <!--                }-->
        <!--            });-->
        <!--        }-->
        <!--    </script>-->
        <!--    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initAutocomplete"></script>-->


    </div>
    <!-- Wrapper / End -->


</body>

</html>