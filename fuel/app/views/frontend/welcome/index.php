<?php
    \Lang::load('lang');
?>

<!-- Banner
================================================== -->
<div class="parallax" data-background=" <?php echo \Asset::get_file('home-parallax.jpg','img');?>" data-color="#36383e"
    data-color-opacity="0.45" data-img-width="2500" data-img-height="1600">
    <div class="parallax-content">

        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <!-- Main Search Container -->
                    <div class="main-search-container">
                        <h2>Tìm Kiếm Tin Bất Động Sản</h2>

                        <!-- Main Search -->
                        <form class="main-search-form" method="post" action="/search">

                            <!-- Type -->
                            <div class="search-type">
                                <label class="active"><input class="first-tab" value='all' name="tab" checked="checked"
                                        type="radio">Tất Cả</label>
                                <label><input name="tab" value="sale" type="radio" id="sale">Mua Bán</label>
                                <label><input name="tab" value="rent" type="radio" id="rent">Cho Thuê</label>
                                <div class="search-type-arrow"></div>
                            </div>


                            <!-- Box -->
                            <div class="main-search-box">

                                <!-- Main Search Input -->
                                <div class="main-search-input larger-input">
                                    <input type="text" name="key" class="ico-01" id="autocomplete-input"
                                        placeholder="Nhập tên hoặc quận/huyện ..." value="" required />
                                    <button class="button">Tìm</button>
                                </div>

                                <!-- Row -->
                                <div class="row with-forms">

                                    <!-- Property Type -->
                                    <div class="col-md-4">
                                        <select data-placeholder="Loại" class="chosen-select-no-single" name="type">
                                            <option value="all">Tất cả</option>
                                            <option vlue="lands">Đất</option>
                                            <option value="houses">Nhà riêng</option>
                                            <option value="ware-housing">Kho bãi</option>
                                            <option value="offices">Văn phòng</option>
                                        </select>
                                    </div>


                                    <!-- Min Price -->
                                    <div class="col-md-4">

                                        <!-- Select Input -->
                                        <!-- <div class="select-input">
                                            <input type="text" placeholder="Thấp nhất" data-unit="VND" disabled>
                                        </div> -->
                                        <!-- Select Input / End -->

                                    </div>


                                    <!-- Max Price -->
                                    <div class="col-md-4">

                                        <!-- Select Input -->
                                        <!-- <div class="select-input">
                                            <input type="text" placeholder="Cao nhất" data-unit="VND" disabled>
                                        </div> -->
                                        <!-- Select Input / End -->

                                    </div>

                                </div>
                                <!-- Row / End -->


                                <!-- More Search Options -->
                                <!-- <a href="#" class="more-search-options-trigger" data-open-title="More Options"
                                   data-close-title="Less Options"></a> -->


                                <!-- More Search Options / End -->


                            </div>
                            <!-- Box / End -->

                        </form>
                        <!-- Main Search -->

                    </div>
                    <!-- Main Search Container / End -->

                </div>
            </div>
        </div>

    </div>
</div>


<!-- Content
================================================== -->
<div class="container">
    <div class="row">

        <div class="col-md-12">
            <h3 class="headline margin-bottom-25 margin-top-65"><?php echo \Lang::get('newly_added');?></h3>
        </div>

        <!-- Carousel -->
        <div class="col-md-12">
            <div class="carousel">
                <?php
                foreach (Arr::get($content, "properties") as $value):
                    ?>
                <!-- Listing Item -->
                <div class="carousel-item">
                    <div class="listing-item">

                        <a href="/<?php echo $value['shape'];?>/details/<?php echo $value['id'];?>"
                            class="listing-img-container">
                            <div class="listing-badges">
                                <?php
								if($value['featured']):
								?>
                                <span class="featured">Featured</span>
                                <?php
									endif;
								?>
                                <span><?php echo $value['shape'] == 'sale' ? \Lang::get('sale') : \Lang::get('rent'); ?></span>
                            </div>

                            <div class="listing-img-content">
                                <span class="listing-price"><?php echo $value['price'] . " triệu"; ?> <i>$520 / sq
                                        ft</i></span>
                                <span class="like-icon with-tip"
                                    data-tip-content="<?php echo \Lang::get('add_to_bookmarks');?>"></span>
                                <span class="compare-button with-tip"
                                    data-tip-content="<?php echo \Lang::get('add_to_compare');?>"></span>
                            </div>

                            <div class="listing-carousel">
                                <?php
                                    \Asset::add_path('uploads/img', 'img');

                                    foreach (explode('/', $value['src']) as $file):
                                        ?>
                                <div><img src="<?php echo \Asset::get_file($file, 'img'); ?> " alt=""></div>
                                <?php
                                    endforeach;
                                    ?>
                            </div>

                        </a>

                        <div class="listing-content">

                            <div class="listing-title">
                                <h4><a
                                        href="/<?php echo $value['shape'] . '/details/' . $value['id']; ?>"><?php echo $value['title']; ?></a>
                                </h4>
                                <a href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&hl=en&t=v&hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom"
                                    class="listing-address popup-gmaps">
                                    <i class="fa fa-map-marker"></i>
                                    <?php echo ( $value['ward'] . ", " . $value['district']) . ", " . $value['province']; ?>
                                </a>
                            </div>

                            <ul class="listing-details">
                                <li><?php echo $value['bedrooms']; ?> <?php echo \Lang::get('bedrooms'); ?></li>
                                <li><?php echo $value['rooms']; ?> <?php echo \Lang::get('rooms'); ?></li>
                                <li><?php echo $value['toilets']; ?> <?php echo \Lang::get('toilets'); ?></li>
                            </ul>

                            <div class="listing-footer">
                                <a href="#"><i class="fa fa-user"></i> <?php echo ucwords($value['name']); ?></a>
                                <span><i class="fa fa-calendar-o"></i>
                                    <?php echo \Date::time_ago($value['created_at'], '', "day"); ?></span>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- Listing Item / End -->

                <?php
                endforeach;
                ?>
            </div>
        </div>
        <!-- Carousel / End -->

    </div>
</div>


<!-- Fullwidth Section -->
<section class="fullwidth margin-top-105" data-background-color="#f7f7f7">

    <!-- Box Headline -->
    <h3 class="headline-box">Bạn đang tìm kiếm cái gì?</h3>

    <!-- Content -->
    <div class="container">
        <div class="row">

            <div class="col-md-3 col-sm-6">
                <!-- Icon Box -->
                <div class="icon-box-1">

                    <div class="icon-container">
                        <i class="im im-icon-Office"></i>
                        <div class="icon-links">
                            <a href="/rent/office">Cho Thuê</a>
                        </div>
                    </div>

                    <h3>Văn Phòng</h3>
                    <p>Aliquam dictum elit vitae mauris facilisis, at dictum urna dignissim donec vel lectus vel
                        felis.</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <!-- Icon Box -->
                <div class="icon-box-1">

                    <div class="icon-container">
                        <i class="im im-icon-Home-2"></i>
                        <div class="icon-links">
                            <a href="/sale/houses">Mua Bán</a>
                        </div>
                    </div>

                    <h3>Nhà Riêng</h3>
                    <p>Aliquam dictum elit vitae mauris facilisis, at dictum urna dignissim donec vel lectus vel
                        felis.</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <!-- Icon Box -->
                <div class="icon-box-1">

                    <div class="icon-container">
                        <i class="im im-icon-Landscape"></i>
                        <div class="icon-links">
                            <a href="/sale/lands">Mua Bán</a>
                        </div>
                    </div>

                    <h3>Đất Nền</h3>
                    <p>Aliquam dictum elit vitae mauris facilisis, at dictum urna dignissim donec vel lectus vel
                        felis.</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <!-- Icon Box -->
                <div class="icon-box-1">

                    <div class="icon-container">
                        <i class="im im-icon-Clothing-Store"></i>
                        <div class="icon-links">
                            <a href="/rent/ware-housing">Cho Thuê</a>
                        </div>
                    </div>

                    <h3>Kho Bãi</h3>
                    <p>Aliquam dictum elit vitae mauris facilisis, at dictum urna dignissim donec vel lectus vel
                        felis.</p>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Fullwidth Section / End -->


<!-- Container -->
<div class="container">
    <div class="row">

        <div class="col-md-12">
            <h3 class="headline centered margin-bottom-35 margin-top-10">Most Popular Places <span>Properties In Most
                    Popular Places</span>
            </h3>
        </div>

        <div class="col-md-4">

            <!-- Image Box -->
            <a href="listings-list-with-sidebar.html" class="img-box"
                data-background-image=" <?php echo \Asset::get_file('can-tho.jpg','img');?>">

                <!-- Badge -->
                <div class="listing-badges">
                    <span class="featured">Featured</span>
                </div>

                <div class="img-box-content visible">
                    <h4>New York </h4>
                    <span>14 Properties</span>
                </div>
            </a>

        </div>

        <div class="col-md-8">

            <!-- Image Box -->
            <a href="listings-list-with-sidebar.html" class="img-box"
                data-background-image=" <?php echo \Asset::get_file('can-tho.jpg','img');?>">
                <div class="img-box-content visible">
                    <h4>Los Angeles</h4>
                    <span>24 Properties</span>
                </div>
            </a>

        </div>

        <div class="col-md-8">

            <!-- Image Box -->
            <a href="listings-list-with-sidebar.html" class="img-box"
                data-background-image=" <?php echo \Asset::get_file('can-tho.jpg','img');?>">
                <div class="img-box-content visible">
                    <h4>San Francisco </h4>
                    <span>12 Properties</span>
                </div>
            </a>

        </div>

        <div class="col-md-4">

            <!-- Image Box -->
            <a href="listings-list-with-sidebar.html" class="img-box"
                data-background-image=" <?php echo \Asset::get_file('can-tho.jpg','img');?>">
                <div class="img-box-content visible">
                    <h4>Miami</h4>
                    <span>9 Properties</span>
                </div>
            </a>

        </div>

    </div>
</div>
<!-- Container / End -->


<!-- Fullwidth Section -->
<section class="fullwidth margin-top-95 margin-bottom-0">

    <!-- Box Headline -->
    <h3 class="headline-box">Articles & Tips</h3>

    <div class="container">
        <div class="row">

            <div class="col-md-4">

                <!-- Blog Post -->
                <div class="blog-post">

                    <!-- Img -->
                    <a href="blog-post.html" class="post-img">
                        <?php echo \Asset::img('blog-post-01.jpg');?>
                        <!--                        <img src="images/blog-post-01.jpg" alt="">-->
                    </a>

                    <!-- Content -->
                    <div class="post-content">
                        <h3><a href="#">8 Tips to Help You Finding New Home</a></h3>
                        <p>Nam nisl lacus, dignissim ac tristique ut, scelerisque eu massa. Vestibulum ligula nunc,
                            rutrum in malesuada vitae. </p>

                        <a href="blog-post.html" class="read-more">Read More <i class="fa fa-angle-right"></i></a>
                    </div>

                </div>
                <!-- Blog Post / End -->

            </div>

            <div class="col-md-4">

                <!-- Blog Post -->
                <div class="blog-post">

                    <!-- Img -->
                    <a href="blog-post.html" class="post-img">
                        <!--                        <img src="images/blog-post-02.jpg" alt="">-->
                        <?php echo \Asset::img('blog-post-02.jpg');?>
                    </a>

                    <!-- Content -->
                    <div class="post-content">
                        <h3><a href="#">Bedroom Colors You'll Never Regret</a></h3>
                        <p>Nam nisl lacus, dignissim ac tristique ut, scelerisque eu massa. Vestibulum ligula nunc,
                            rutrum in malesuada vitae. </p>

                        <a href="blog-post.html" class="read-more">Read More <i class="fa fa-angle-right"></i></a>
                    </div>

                </div>
                <!-- Blog Post / End -->

            </div>

            <div class="col-md-4">

                <!-- Blog Post -->
                <div class="blog-post">

                    <!-- Img -->
                    <a href="blog-post.html" class="post-img">
                        <!--                        <img src="assets/img/blog-post-03.jpg" alt="">-->
                        <?php echo \Asset::img('blog-post-03.jpg'); ?>
                    </a>

                    <!-- Content -->
                    <div class="post-content">
                        <h3><a href="#">What to Do a Year Before Buying Apartment</a></h3>
                        <p>Nam nisl lacus, dignissim ac tristique ut, scelerisque eu massa. Vestibulum ligula nunc,
                            rutrum in malesuada vitae. </p>

                        <a href="blog-post.html" class="read-more">Read More <i class="fa fa-angle-right"></i></a>
                    </div>

                </div>
                <!-- Blog Post / End -->

            </div>

        </div>
    </div>
</section>
<!-- Fullwidth Section / End -->