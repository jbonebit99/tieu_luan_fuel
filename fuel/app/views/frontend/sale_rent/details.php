<?php
$properties = \Arr::get($content, "properties");
\Asset::add_path('uploads/img','img');
?>
<!-- Titlebar
================================================== -->
<div id="titlebar" class="property-titlebar margin-bottom-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <a href="listings-list-with-sidebar.html" class="back-to-listings"></a>
                <div class="property-title">
                    <h2><?php echo $properties['title']; ?> <span class="property-badge">For Sale</span></h2>
                    <span>
						<a href="#location" class="listing-address">
							<i class="fa fa-map-marker"></i>
7843 Durham Avenue, MD
</a>
					</span>
                </div>

                <div class="property-pricing">
                    <div class="property-price"><?php echo $properties['price']; ?> triệu</div>
                    <div class="sub-price"><?php echo $properties['price']; ?> m2</div>
                </div>


            </div>
        </div>
    </div>
</div>


<!-- Content
================================================== -->

<!-- Slider -->
<div class="fullwidth-property-slider margin-bottom-50">
    <?php foreach (explode('/',$properties['src']) as $file): ?>
        <a href="<?php echo \Asset::get_file($file,'img'); ?>" data-background-image="<?php echo \Asset::get_file($file,'img'); ?>"
           class="item mfp-gallery"></a>
    <?php endforeach; ?>
</div>
<div class="container">
    <div class="row">

        <!-- Property Description -->
        <div class="col-lg-8 col-md-7">
            <div class="property-description">

                <!-- Main Features -->
                <ul class="property-main-features">
                    <li>Diện Tích <span><?php echo $properties['area'];?></span></li>
                    <li>Số Phòng <span><?php echo $properties['rooms'];?></span></li>
                    <li>Phòng Ngủ <span><?php echo $properties['bedrooms'];?></span></li>
                    <li>Toilets <span><?php echo $properties['toilets'];?></span></li>
                </ul>


                <!-- Description -->
                <h3 class="desc-headline">Mô Tả</h3>
                <div class="show-more">
                    <?php echo $properties['description'];?>
                    <a href="#" class="show-more-button">Show More <i class="fa fa-angle-down"></i></a>
                </div>

                <!-- Details -->
                <h3 class="desc-headline">Chi Tiết</h3>
                <ul class="property-features margin-top-0">
                    <li>Building Age: <span>2 Years</span></li>
                    <li>Parking: <span>Attached Garage</span></li>
                    <li>Cooling: <span>Central Cooling</span></li>
                    <li>Heating: <span>Forced Air, Gas</span></li>
                    <li>Sewer: <span>Public/City</span></li>
                    <li>Water: <span>City</span></li>
                    <li>Exercise Room: <span>Yes</span></li>
                    <li>Storage Room: <span>Yes</span></li>
                </ul>


                <!-- Features -->
                <h3 class="desc-headline">Features</h3>
                <ul class="property-features checkboxes margin-top-0">
                    <li>Air Conditioning</li>
                    <li>Swimming Pool</li>
                    <li>Central Heating</li>
                    <li>Laundry Room</li>
                    <li>Gym</li>
                    <li>Alarm</li>
                    <li>Window Covering</li>
                    <li>Internet</li>
                </ul>


                <!-- Floorplans -->
                <h3 class="desc-headline no-border">Floorplans</h3>
                <!-- Accordion -->
                <div class="style-1 fp-accordion">
                    <div class="accordion">

                        <h3>First Floor <span>460 sq ft</span> <i class="fa fa-angle-down"></i> </h3>
                        <div>
                            <a class="floor-pic mfp-image" href="https://i.imgur.com/kChy7IU.jpg">
                                <img src="https://i.imgur.com/kChy7IU.jpg" alt="">
                            </a>
                            <p>Mauris mauris ante, blandit et, ultrices a, susceros. Nam mi. Proin viverra leo ut odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate aliquam egestas litora torquent conubia.</p>
                        </div>

                        <h3>Second Floor <span>440 sq ft</span> <i class="fa fa-angle-down"></i></h3>
                        <div>
                            <a class="floor-pic mfp-image" href="https://i.imgur.com/l2VNlwu.jpg">
                                <img src="https://i.imgur.com/l2VNlwu.jpg" alt="">
                            </a>
                            <p>Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet purus vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor velit, faucibus interdum tellus libero ac justo. Vivamus non quam. Nullam laoreet, velit ut taciti sociosqu condimentum feugiat.</p>
                        </div>

                        <h3>Garage <span>140 sq ft</span> <i class="fa fa-angle-down"></i></h3>
                        <div>
                            <a class="floor-pic mfp-image" href="https://i.imgur.com/0zJYERy.jpg">
                                <img src="https://i.imgur.com/0zJYERy.jpg" alt="">
                            </a>
                        </div>

                    </div>
                </div>


                <!-- Video -->
                <h3 class="desc-headline no-border">Video</h3>
                <div class="responsive-iframe">
                    <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/UPBJKppEXoQ?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                </div>

                <!-- Location -->
                <h3 class="desc-headline no-border" id="location">Location</h3>
                <div id="propertyMap-container">
                    <div id="propertyMap" data-latitude="40.7427837" data-longitude="-73.11445617675781"></div>
                    <a href="#" id="streetView">Street View</a>
                </div>


                <!-- Similar Listings Container -->
                <h3 class="desc-headline no-border margin-bottom-35 margin-top-60">Similar Properties</h3>

                <!-- Layout Switcher -->

                <div class="layout-switcher hidden"><a href="#" class="list"><i class="fa fa-th-list"></i></a></div>
                <div class="listings-container list-layout">

                    <!-- Listing Item -->
                    <div class="listing-item">

                        <a href="#" class="listing-img-container">

                            <div class="listing-badges">
                                <span>For Rent</span>
                            </div>

                            <div class="listing-img-content">
                                <span class="listing-price">$1700 <i>monthly</i></span>
                                <span class="like-icon"></span>
                            </div>

                            <img src="images/listing-03.jpg" alt="">

                        </a>

                        <div class="listing-content">

                            <div class="listing-title">
                                <h4><a href="#">Meridian Villas</a></h4>
                                <a href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&hl=en&t=v&hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom" class="listing-address popup-gmaps">
                                    <i class="fa fa-map-marker"></i>
                                    778 Country St. Panama City, FL
                                </a>

                                <a href="#" class="details button border">Details</a>
                            </div>

                            <ul class="listing-details">
                                <li>1450 sq ft</li>
                                <li>1 Bedroom</li>
                                <li>2 Rooms</li>
                                <li>2 Rooms</li>
                            </ul>

                            <div class="listing-footer">
                                <a href="#"><i class="fa fa-user"></i> Chester Miller</a>
                                <span><i class="fa fa-calendar-o"></i> 4 days ago</span>
                            </div>

                        </div>
                        <!-- Listing Item / End -->

                    </div>
                    <!-- Listing Item / End -->


                    <!-- Listing Item -->
                    <div class="listing-item">

                        <a href="#" class="listing-img-container">

                            <div class="listing-badges">
                                <span>For Sale</span>
                            </div>

                            <div class="listing-img-content">
                                <span class="listing-price">$420,000 <i>$770 / sq ft</i></span>
                                <span class="like-icon"></span>
                            </div>

                            <div><img src="images/listing-04.jpg" alt=""></div>

                        </a>

                        <div class="listing-content">

                            <div class="listing-title">
                                <h4><a href="#">Selway Apartments</a></h4>
                                <a href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&hl=en&t=v&hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom" class="listing-address popup-gmaps">
                                    <i class="fa fa-map-marker"></i>
                                    33 William St. Northbrook, IL
                                </a>

                                <a href="#" class="details button border">Details</a>
                            </div>

                            <ul class="listing-details">
                                <li>540 sq ft</li>
                                <li>1 Bedroom</li>
                                <li>3 Rooms</li>
                                <li>2 Bathroom</li>
                            </ul>

                            <div class="listing-footer">
                                <a href="#"><i class="fa fa-user"></i> Kristen Berry</a>
                                <span><i class="fa fa-calendar-o"></i> 3 days ago</span>
                            </div>

                        </div>
                        <!-- Listing Item / End -->

                    </div>
                    <!-- Listing Item / End -->


                    <!-- Listing Item -->
                    <div class="listing-item">

                        <a href="#" class="listing-img-container">
                            <div class="listing-badges">
                                <span>For Sale</span>
                            </div>

                            <div class="listing-img-content">
                                <span class="listing-price">$535,000 <i>$640 / sq ft</i></span>
                                <span class="like-icon"></span>
                            </div>

                            <img src="images/listing-05.jpg" alt="">
                        </a>

                        <div class="listing-content">

                            <div class="listing-title">
                                <h4><a href="#">Oak Tree Villas</a></h4>
                                <a href="https://maps.google.com/maps?q=221B+Baker+Street,+London,+United+Kingdom&hl=en&t=v&hnear=221B+Baker+St,+London+NW1+6XE,+United+Kingdom" class="listing-address popup-gmaps">
                                    <i class="fa fa-map-marker"></i>
                                    71 Lower River Dr. Bronx, NY
                                </a>

                                <a href="#" class="details button border">Details</a>
                            </div>

                            <ul class="listing-details">
                                <li>350 sq ft</li>
                                <li>1 Bedroom</li>
                                <li>2 Rooms</li>
                                <li>1 Bathroom</li>
                            </ul>

                            <div class="listing-footer">
                                <a href="#"><i class="fa fa-user"></i> Mabel Gagnon</a>
                                <span><i class="fa fa-calendar-o"></i> 4 days ago</span>
                            </div>

                        </div>
                        <!-- Listing Item / End -->

                    </div>
                    <!-- Listing Item / End -->

                </div>
                <!-- Similar Listings Container / End -->

            </div>
        </div>
        <!-- Property Description / End -->


        <!-- Sidebar -->
        <div class="col-lg-4 col-md-5">
            <div class="sidebar sticky right">

                <!-- Widget -->
                <div class="widget margin-bottom-30">
                    <button class="widget-button with-tip" data-tip-content="Print"><i class="sl sl-icon-printer"></i></button>
                    <button class="widget-button with-tip" data-tip-content="Add to Bookmarks"><i class="fa fa-star-o"></i></button>
                    <button class="widget-button with-tip compare-widget-button" data-tip-content="Add to Compare"><i class="icon-compare"></i></button>
                    <div class="clearfix"></div>
                </div>
                <!-- Widget / End -->


                <!-- Booking Widget -->
                <div class="widget">
                    <!-- Book Now -->
                    <div id="booking-widget-anchor" class="boxed-widget booking-widget margin-top-35">
                        <h3><i class="fa fa-calendar-check-o "></i> Booking</h3>
                        <div class="row with-forms  margin-top-0">

                            <!-- Date Range Picker - docs: http://www.daterangepicker.com/ -->
                            <div class="col-lg-12">
                                <input type="text" id="date-picker" placeholder="Date" readonly="readonly">
                            </div>

                            <!-- Panel Dropdown -->
                            <div class="col-lg-12">
                                <div class="panel-dropdown">
                                    <a href="#">Guests <span class="qtyTotal" name="qtyTotal">1</span></a>
                                    <div class="panel-dropdown-content">

                                        <!-- Quantity Buttons -->
                                        <div class="qtyButtons">
                                            <div class="qtyTitle">Adults</div>
                                            <input type="text" name="qtyInput" value="1">
                                        </div>

                                        <div class="qtyButtons">
                                            <div class="qtyTitle">Childrens</div>
                                            <input type="text" name="qtyInput" value="0">
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- Panel Dropdown / End -->

                        </div>

                        <!-- Book Now -->
                        <a href="#" class="button book-now fullwidth margin-top-5">Request To Book</a>

                    </div>
                    <!-- Book Now / End -->


                </div>
                <!-- Booking Widget / End -->

                <!-- Widget -->
                <div class="widget">

                    <!-- Agent Widget -->
                    <div class="agent-widget">
                        <div class="agent-title">
                            <div class="agent-photo"><img src="images/agent-avatar.jpg" alt="" /></div>
                            <div class="agent-details">
                                <h4><a href="#">Jennie Wilson</a></h4>
                                <span><i class="sl sl-icon-call-in"></i>(123) 123-456</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <input type="text" placeholder="Your Email" pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$">
                        <input type="text" placeholder="Your Phone">
                        <textarea>I'm interested in this property [ID 123456] and I'd like to know more details.</textarea>
                        <button class="button fullwidth margin-top-5">Send Message</button>
                    </div>
                    <!-- Agent Widget / End -->

                </div>
                <!-- Widget / End -->


                <!-- Widget -->
                <div class="widget">
                    <h3 class="margin-bottom-30 margin-top-30">Mortgage Calculator</h3>

                    <!-- Mortgage Calculator -->
                    <form action="javascript:void(0);" autocomplete="off" class="mortgageCalc" data-calc-currency="USD">
                        <div class="calc-input">
                            <div class="pick-price tip" data-tip-content="Set This Property Price"></div>
                            <input type="text" id="amount" name="amount" placeholder="Sale Price" required>
                            <label for="amount" class="fa fa-usd"></label>
                        </div>

                        <div class="calc-input">
                            <input type="text" id="downpayment" placeholder="Down Payment">
                            <label for="downpayment" class="fa fa-usd"></label>
                        </div>

                        <div class="calc-input">
                            <input type="text" id="years" placeholder="Loan Term (Years)" required>
                            <label for="years" class="fa fa-calendar-o"></label>
                        </div>

                        <div class="calc-input">
                            <input type="text" id="interest" placeholder="Interest Rate" required>
                            <label for="interest" class="fa fa-percent"></label>
                        </div>

                        <button class="button calc-button" formvalidate>Calculate</button>
                        <div class="calc-output-container"><div class="notification success">Monthly Payment: <strong class="calc-output"></strong></div></div>
                    </form>
                    <!-- Mortgage Calculator / End -->

                </div>
                <!-- Widget / End -->


                <!-- Widget -->
                <div class="widget">
                    <h3 class="margin-bottom-35">Featured Properties</h3>

                    <div class="listing-carousel outer">
                        <!-- Item -->
                        <div class="item">
                            <div class="listing-item compact">

                                <a href="#" class="listing-img-container">

                                    <div class="listing-badges">
                                        <span class="featured">Featured</span>
                                        <span>For Sale</span>
                                    </div>

                                    <div class="listing-img-content">
                                        <span class="listing-compact-title">Eagle Apartments <i>$275,000</i></span>

                                        <ul class="listing-hidden-content">
                                            <li>Area <span>530 sq ft</span></li>
                                            <li>Rooms <span>3</span></li>
                                            <li>Beds <span>1</span></li>
                                            <li>Baths <span>1</span></li>
                                        </ul>
                                    </div>

                                    <img src="images/listing-01.jpg" alt="">
                                </a>

                            </div>
                        </div>
                        <!-- Item / End -->

                        <!-- Item -->
                        <div class="item">
                            <div class="listing-item compact">

                                <a href="#" class="listing-img-container">

                                    <div class="listing-badges">
                                        <span class="featured">Featured</span>
                                        <span>For Sale</span>
                                    </div>

                                    <div class="listing-img-content">
                                        <span class="listing-compact-title">Selway Apartments <i>$245,000</i></span>

                                        <ul class="listing-hidden-content">
                                            <li>Area <span>530 sq ft</span></li>
                                            <li>Rooms <span>3</span></li>
                                            <li>Beds <span>1</span></li>
                                            <li>Baths <span>1</span></li>
                                        </ul>
                                    </div>

                                    <img src="images/listing-02.jpg" alt="">
                                </a>

                            </div>
                        </div>
                        <!-- Item / End -->

                        <!-- Item -->
                        <div class="item">
                            <div class="listing-item compact">

                                <a href="#" class="listing-img-container">

                                    <div class="listing-badges">
                                        <span class="featured">Featured</span>
                                        <span>For Sale</span>
                                    </div>

                                    <div class="listing-img-content">
                                        <span class="listing-compact-title">Oak Tree Villas <i>$325,000</i></span>

                                        <ul class="listing-hidden-content">
                                            <li>Area <span>530 sq ft</span></li>
                                            <li>Rooms <span>3</span></li>
                                            <li>Beds <span>1</span></li>
                                            <li>Baths <span>1</span></li>
                                        </ul>
                                    </div>

                                    <img src="images/listing-03.jpg" alt="">
                                </a>

                            </div>
                        </div>
                        <!-- Item / End -->
                    </div>

                </div>
                <!-- Widget / End -->

            </div>
        </div>
        <!-- Sidebar / End -->

    </div>
</div>


