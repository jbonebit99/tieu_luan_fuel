<?php

use Fuel\Core\Lang;
\Lang::load('lang');
?>

<!-- Titlebar
================================================== -->
<div class="parallax titlebar" data-background="<?php echo Asset::get_file('listings-parallax.jpg', 'img'); ?>"
    data-color="#333333" data-color-opacity="0.7" data-img-width="800" data-img-height="505">
    <div id="titlebar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2><?php echo Arr::get($content, "title"); ?></h2>
                    <span><?php echo Arr::get($content, "subtitle"); ?></span>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><?php echo \Arr::get($content, "title"); ?></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Content
================================================== -->
<div class="container">
    <div class="row sticky-wrapper">

        <div class="col-md-8">

            <!-- Main Search Input -->
            <form action="/search" method="POST">
                <div class="main-search-input margin-bottom-35">
                    <input type="text" name="key" class="ico-01" placeholder="Nhập tiêu đề hoặc quận/huyện"
                        value="<?php echo Arr::get($content, "key")  ?>" required />
                    <button class="button"><?php echo \Lang::get('search');?></button>
                </div>
            </form>

            <!-- Sorting / Layout Switcher -->
            <div class="row margin-bottom-15">

                <div class="col-md-6">
                    <!-- Sort by -->
                    <div class="sort-by">
                        <label><?php echo \Lang::get('sort_by');?>:</label>

                        <div class="sort-by-select">
                            <select data-placeholder="Default order" class="chosen-select-no-single"
                                onchange="return sort(this);">
                                <option value="default"><?php echo \Lang::get('default');?></option>
                                <option value="price_high_to_low"><?php echo \Lang::get('price_high_to_low');?></option>
                                <option value="price_low_to_high"><?php echo \Lang::get('price_low_to_high');?></option>
                                <option value="newest"><?php echo \Lang::get('newest');?></option>
                                <option value="oldest"><?php echo \Lang::get('oldest');?></option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <!-- Layout Switcher -->
                    <div class="layout-switcher">
                        <a href="#" class="list"><i class="fa fa-th-list"></i></a>
                        <a href="#" class="grid"><i class="fa fa-th-large"></i></a>
                    </div>
                </div>
            </div>


            <!-- Listings -->
            <div class="listings-container list-layout" id="list_content">
                <?php
				foreach (Arr::get($content, "properties") as $value) :
					?>
                <!-- Listing Item -->
                <div class="listing-item">

                    <a href="" class="listing-img-container">

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
                            <span class="listing-price"><?php echo $value['price'] . " triệu"; ?> <i></i></span>
                            <span class="like-icon with-tip"
                                data-tip-content="<?php echo \Lang::get('add_to_bookmarks');?>"></span>
                            <span class="compare-button with-tip"
                                data-tip-content="<?php echo \Lang::get('add_to_compare');?>"></span>
                        </div>

                        <div class="listing-carousel">
                            <?php
									\Asset::add_path('uploads/img', 'img');

									foreach (explode('/', $value['src']) as $file) :
										?>
                            <div><img src="<?php echo  \Asset::get_file($file, 'img'); ?> " alt=""></div>
                            <?php
									endforeach;
									?>
                        </div>
                    </a>

                    <div class="listing-content">

                        <div class="listing-title">
                            <h4><a
                                    href="/<?php echo $value['shape']; ?>/details/<?php echo $value['id']; ?>"><?php echo $value['title']; ?></a>
                            </h4>
                            <a href="">
                                <i class="fa fa-map-marker"></i>
                                <?php echo ($value['address'] . ", " . $value['ward'] . ", " . $value['district']) . ", " . $value['province']; ?>
                            </a>

                            <a href="/<?php echo $value['shape']; ?>/details/<?php echo $value['id']; ?>"
                                class="details button border"><?php echo ucwords(\Lang::get('details')); ?></a>
                        </div>

                        <ul class="listing-details">
                            <!--							<li>530 sq ft</li>-->
                            <li><?php echo $value['bedrooms']; ?> <?php echo \Lang::get('bedrooms'); ?></li>
                            <li><?php echo $value['rooms']; ?> <?php echo \Lang::get('rooms'); ?></li>
                            <li><?php echo $value['toilets']; ?> <?php echo \Lang::get('toilets'); ?></li>
                        </ul>

                        <div class="listing-footer">
                            <a href="#"><i class="fa fa-user"></i> <?php echo ucwords($value['name']); ?></a>
                            <span><i class="fa fa-calendar-o"></i>
                                <?php echo \Date::time_ago($value['created_at'], '', "day") ?></span>
                        </div>

                    </div>

                </div>
                <!-- Listing Item / End -->
                <?php
				endforeach;
				?>

            </div>
            <!-- Listings Container / End -->
            <?php
			echo Paginationapp::instance('my_pagination')->render();
			?>
            <!-- Pagination -->
            <!-- <div class="pagination-container margin-top-20">
				<nav class="pagination">
					<ul>
						<li><a href="#" class="current-page">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li class="blank">...</li>
						<li><a href="#">22</a></li>
					</ul>
				</nav>
				<nav class="pagination-next-prev">
					<ul>
						<li><a href="#" class="prev">Previous</a></li>
						<li><a href="#" class="next">Next</a></li>
					</ul>
				</nav>
			</div> -->
            <!-- Pagination / End -->

        </div>


        <!-- Sidebar
		================================================== -->
        <div class="col-md-4">
            <div class="sidebar sticky right">

                <!-- Widget -->
                <div class="widget margin-bottom-40">
                    <h3 class="margin-top-0 margin-bottom-35"><?php echo \Lang::get('find_new_properties'); ?></h3>

                    <!-- Row -->
                    <div class="row with-forms">
                        <!-- Status -->
                        <div class="col-md-12">
                            <select data-placeholder="Any Status" class="chosen-select-no-single">
                                <option>Any Status</option>
                                <option>For Sale</option>
                                <option>For Rent</option>
                            </select>
                        </div>
                    </div>
                    <!-- Row / End -->


                    <!-- Row -->
                    <div class="row with-forms">
                        <!-- Type -->
                        <div class="col-md-12">
                            <select data-placeholder="Any Type" class="chosen-select-no-single">
                                <option>Any Type</option>
                                <option>Apartments</option>
                                <option>Houses</option>
                                <option>Commercial</option>
                                <option>Garages</option>
                                <option>Lots</option>
                            </select>
                        </div>
                    </div>
                    <!-- Row / End -->


                    <!-- Row -->
                    <div class="row with-forms">
                        <!-- States -->
                        <div class="col-md-12">
                            <select data-placeholder="All States" class="chosen-select">
                                <option>All States</option>
                            </select>
                        </div>
                    </div>
                    <!-- Row / End -->


                    <!-- Row -->
                    <div class="row with-forms">
                        <!-- Cities -->
                        <div class="col-md-12">
                            <select data-placeholder="All Cities" class="chosen-select">
                                <option>All Cities</option>

                            </select>
                        </div>
                    </div>
                    <!-- Row / End -->


                    <!-- Row -->
                    <div class="row with-forms">

                        <!-- Min Area -->
                        <div class="col-md-6">
                            <select data-placeholder="Beds" class="chosen-select-no-single">
                                <option label="blank"></option>
                                <option>Beds (Any)</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>

                        <!-- Max Area -->
                        <div class="col-md-6">
                            <select data-placeholder="Baths" class="chosen-select-no-single">
                                <option label="blank"></option>
                                <option>Baths (Any)</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>

                    </div>
                    <!-- Row / End -->

                    <br>

                    <!-- Area Range -->
                    <div class="range-slider">
                        <label>Area Range</label>
                        <div id="area-range" data-min="0" data-max="1500" data-unit="sq ft"></div>
                        <div class="clearfix"></div>
                    </div>

                    <br>

                    <!-- Price Range -->
                    <div class="range-slider">
                        <label>Price Range</label>
                        <div id="price-range" data-min="0" data-max="400000" data-unit="$"></div>
                        <div class="clearfix"></div>
                    </div>



                    <!-- More Search Options -->
                    <a href="#" class="more-search-options-trigger margin-bottom-10 margin-top-30"
                        data-open-title="Additional Features" data-close-title="Additional Features"></a>

                    <div class="more-search-options relative">

                        <!-- Checkboxes -->
                        <div class="checkboxes one-in-row margin-bottom-10">

                            <input id="check-2" type="checkbox" name="check">
                            <label for="check-2">Air Conditioning</label>

                            <input id="check-3" type="checkbox" name="check">
                            <label for="check-3">Swimming Pool</label>

                            <input id="check-4" type="checkbox" name="check">
                            <label for="check-4">Central Heating</label>

                            <input id="check-5" type="checkbox" name="check">
                            <label for="check-5">Laundry Room</label>


                            <input id="check-6" type="checkbox" name="check">
                            <label for="check-6">Gym</label>

                            <input id="check-7" type="checkbox" name="check">
                            <label for="check-7">Alarm</label>

                            <input id="check-8" type="checkbox" name="check">
                            <label for="check-8">Window Covering</label>

                        </div>
                        <!-- Checkboxes / End -->

                    </div>
                    <!-- More Search Options / End -->

                    <button class="button fullwidth margin-top-30"><?php echo \Lang::get('search');?></button>


                </div>
                <!-- Widget / End -->

            </div>
        </div>
        <!-- Sidebar / End -->
    </div>
</div>