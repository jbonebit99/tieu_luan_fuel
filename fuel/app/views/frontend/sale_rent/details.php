<?php
\Lang::load('lang');
$properties = \Arr::get($content, "properties");
\Asset::add_path('uploads/img', 'img');
?>

<style>
#map_cuc_manh {
    height: 400px;
}
</style>
<!-- Titlebar
================================================== -->
<div id="titlebar" class="property-titlebar margin-bottom-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <a href="" class="back-to-listings"></a>
                <div class="property-title">
                    <h2><?php echo $properties['title']; ?> <span
                            class="property-badge"><?php echo $properties['shape'] == 'sale' ? \Lang::get('sale') : \Lang::get('rent'); ?></span>
                    </h2>
                    <span>
                        <a href="#location" class="listing-address">
                            <i class="fa fa-map-marker"></i>
                            <?php echo $properties['district'] . " " . $properties['province']; ?>
                        </a>
                    </span>
                </div>

                <div class="property-pricing">
                    <div class="property-price"><?php echo $properties['price']; ?> triệu</div>
                    <div class="sub-price"><?php echo $properties['area']; ?> m2</div>
                </div>


            </div>
        </div>
    </div>
</div>


<!-- Content
================================================== -->

<!-- Slider -->
<div class="fullwidth-property-slider margin-bottom-50">
    <?php foreach (explode('/', $properties['src']) as $file) : ?>
    <a href="<?php echo \Asset::get_file($file, 'img'); ?>"
        data-background-image="<?php echo \Asset::get_file($file, 'img'); ?>" class="item mfp-gallery"></a>
    <?php endforeach; ?>
</div>
<div class="container">
    <div class="row">

        <!-- Property Description -->
        <div class="col-lg-8 col-md-7">
            <div class="property-description">

                <!-- Main Features -->
                <ul class="property-main-features">
                    <li><?php echo \Lang::get('area'); ?><span><?php echo $properties['area']; ?></span></li>
                    <li><?php echo \Lang::get('rooms'); ?><span><?php echo $properties['rooms']; ?></span></li>
                    <li><?php echo \Lang::get('bedrooms'); ?><span><?php echo $properties['bedrooms']; ?></span></li>
                    <li><?php echo \Lang::get('toilets'); ?><span><?php echo $properties['toilets']; ?></span></li>
                </ul>


                <!-- Description -->
                <h3 class="desc-headline"><?php echo ucwords(\Lang::get('description')); ?></h3>
                <div class="show-more">
                    <?php echo html_entity_decode(urldecode($properties['description'])); ?>
                    <a href="#" class="show-more-button">Show More <i class="fa fa-angle-down"></i></a>
                </div>

                <!-- Details -->
                <!-- <h3 class="desc-headline"><?php echo ucwords(\Lang::get('details')); ?></h3>
                <ul class="property-features margin-top-0">
                    <li>Building Age: <span>2 Years</span></li>
                    <li>Parking: <span>Attached Garage</span></li>
                    <li>Cooling: <span>Central Cooling</span></li>
                    <li>Heating: <span>Forced Air, Gas</span></li>
                    <li>Sewer: <span>Public/City</span></li>
                    <li>Water: <span>City</span></li>
                    <li>Exercise Room: <span>Yes</span></li>
                    <li>Storage Room: <span>Yes</span></li>
                </ul> -->


                <!-- Features -->
                <h3 class="desc-headline"><?php echo \Lang::get('features') ?></h3>
                <ul class="property-features checkboxes margin-top-0">
                    <?php
                    if ($properties['gym']) :
                    ?>
                    <li><?php echo \Lang::get('near_gym'); ?></li>
                    <?php
                    endif;
                    ?>
                    <?php
                    if ($properties['market']) :
                    ?>
                    <li><?php echo \Lang::get('near_market'); ?></li>
                    <?php
                    endif;
                    ?>
                    <?php
                    if ($properties['parking']) :
                    ?>
                    <li><?php echo \Lang::get('parking'); ?></li>
                    <?php
                    endif;
                    ?>
                    <?php
                    if ($properties['hospital']) :
                    ?>
                    <li><?php echo \Lang::get('near_hospital'); ?></li>
                    <?php
                    endif;
                    ?>
                </ul>


                <!-- Floorplans -->
                <!-- <h3 class="desc-headline no-border">Floorplans</h3> -->
                <!-- Accordion -->
                <!-- <div class="style-1 fp-accordion">
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
                </div> -->


                <!-- Video -->
                <h3 class="desc-headline no-border">Video</h3>
                <div class="responsive-iframe">
                    <iframe width="956" height="538" src="https://www.youtube.com/embed/taJxW4zsKOQ"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>

                <!-- Location -->
                <h3 class="desc-headline no-border" id="location"><?php echo \Lang::get('location'); ?></h3>
                <div id="propertyMap-container">
                    <div id="map_cuc_manh"></div>

                </div>


                <!-- Similar Listings Container -->
                <h3 class="desc-headline no-border margin-bottom-35 margin-top-60">
                    <?php echo \Lang::get('similar_properties'); ?></h3>

                <!-- Layout Switcher -->

                <div class="layout-switcher hidden"><a href="#" class="list"><i class="fa fa-th-list"></i></a></div>
                <div class="listings-container list-layout">
                    <?php foreach (\Arr::get($content, "same_properties") as $same_properties) : ?>
                    <!-- Listing Item -->
                    <div class="listing-item">

                        <a href="/<?php echo $same_properties['shape']; ?>/details/<?php echo $same_properties['id']; ?>"
                            class="listing-img-container">

                            <div class="listing-badges">
                                <span><?php echo $same_properties['shape'] == 'sale' ? "Bán" : "Cho Thuê" ?></span>
                            </div>

                            <div class="listing-img-content">
                                <span class="listing-price"><?php echo $same_properties['price']; ?>
                                    <i><?php echo ucwords(\Lang::get('price')); ?></i></span>
                                <span class="like-icon"></span>
                            </div>

                            <?php
                                foreach (explode('/', $same_properties['src']) as $file) :
                                ?>
                            <img src="<?php echo \Asset::get_file($file, 'img'); ?>" alt="">
                            <?php
                                    break;
                                endforeach;
                                ?>

                        </a>

                        <div class="listing-content">

                            <div class="listing-title">
                                <h4><a
                                        href="/<?php echo $same_properties['shape']; ?>/details/<?php echo $same_properties['id']; ?>"><?php echo Str::truncate($same_properties['title'], 45, '...'); ?></a>
                                </h4>
                                <a href="">
                                    <i class="fa fa-map-marker"></i>
                                    <?php echo $same_properties['district'] . ", " . $same_properties['province']; ?>
                                </a>

                                <a href="/<?php echo $same_properties['shape']; ?>/details/<?php echo $same_properties['id']; ?>"
                                    class="details button border"><?php echo Lang::get('details'); ?></a>
                            </div>

                            <ul class="listing-details">
                                <li><?php echo $same_properties['area']; ?> m2</li>
                                <li><?php echo $same_properties['bedrooms'] . ' ' . Lang::get('bedrooms'); ?></li>
                                <li><?php echo $same_properties['rooms'] . ' ' . Lang::get('rooms'); ?></li>
                                <li><?php echo $same_properties['toilets'] . ' ' . Lang::get('rooms'); ?></li>
                            </ul>

                            <div class="listing-footer">
                                <a href="#"><i class="fa fa-user"></i>
                                    <?php echo ucwords($same_properties['name']); ?></a>
                                <span><i class="fa fa-calendar-o"></i>
                                    <?php echo \Date::time_ago($same_properties['created_at'], '', "day"); ?></span>
                            </div>

                        </div>
                        <!-- Listing Item / End -->

                    </div>
                    <?php
                    endforeach;
                    ?>
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
                    <button class="widget-button with-tip" data-tip-content="<?php echo \Lang::get('print'); ?>"><i
                            class="sl sl-icon-printer"></i></button>
                    <button class="widget-button with-tip"
                        data-tip-content="<?php echo \Lang::get('add_to_bookmarks'); ?>"><i
                            class="fa fa-star-o"></i></button>
                    <button class="widget-button with-tip compare-widget-button"
                        data-tip-content="<?php echo \Lang::get('add_to_compare'); ?>"><i
                            class="icon-compare"></i></button>
                    <div class="clearfix"></div>
                </div>
                <!-- Widget / End -->


                <!-- Booking Widget -->
                <div class="widget">
                    <!-- Book Now -->
                    <div id="booking-widget-anchor" class="boxed-widget booking-widget margin-top-35">
                        <h3><i class="fa fa-calendar-check-o "></i> Đặt lịch tham quan</h3>
                        <div class="row with-forms  margin-top-0">

                            <!-- Date Range Picker - docs: http://www.daterangepicker.com/ -->
                            <div class="col-lg-12">
                                <input type="text" id="date-picker" placeholder="Ngày" readonly="readonly">
                            </div>

                            <!-- Panel Dropdown -->
                            <div class="col-lg-12">
                                <div class="panel-dropdown">
                                    <a href="#">Số khách <span class="qtyTotal" name="qtyTotal">1</span></a>
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
                        <a href="#" class="button book-now fullwidth margin-top-5">Đặt lịch hẹn</a>

                    </div>
                    <!-- Book Now / End -->


                </div>
                <!-- Booking Widget / End -->

                <!-- Widget -->
                <div class="widget">

                    <!-- Agent Widget -->
                    <div class="agent-widget">
                        <div class="agent-title">
                            <div class="agent-photo"><?php echo Asset::img('agent-avatar.jpg');?></div>
                            <div class="agent-details">
                                <h4><a href="#"></a><?php echo $properties['name']?></h4>
                                <span><i class="sl sl-icon-call-in"></i><?php echo $properties['phone']?></span>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <input type="text" placeholder="Your Email"
                            pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$">
                        <input type="text" placeholder="Your Phone">
                        <textarea>I'm interested in this property [ID 123456] and I'd like to know more details.</textarea>
                        <button class="button fullwidth margin-top-5">Send Message</button>
                    </div>
                    <!-- Agent Widget / End -->

                </div>
                <!-- Widget / End -->


                <!-- Widget -->
                <div class="widget">
                    <h3 class="margin-bottom-30 margin-top-30">Máy tính</h3>

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
                        <div class="calc-output-container">
                            <div class="notification success">Monthly Payment: <strong class="calc-output"></strong>
                            </div>
                        </div>
                    </form>
                    <!-- Mortgage Calculator / End -->

                </div>
                <!-- Widget / End -->


                <!-- Widget -->
                <div class="widget">
                    <h3 class="margin-bottom-35">Nổi bật</h3>

                    <div class="listing-carousel outer">
                        <!-- Item -->
                        <?php
                        foreach (\Arr::get($content, "featured") as $featured) :
                        ?>
                        <div class="item">
                            <div class="listing-item compact">

                                <a href="/<?php echo $featured['shape']; ?>/details/<?php echo $featured['id']; ?>"
                                    class="listing-img-container">

                                    <div class="listing-badges">
                                        <span class="featured">Featured</span>
                                        <span><?php echo $featured['shape'] == 'sale' ? "Bán" : "Cho Thuê" ?></span>
                                    </div>

                                    <div class="listing-img-content">
                                        <span class="listing-compact-title">
                                            <?php echo Str::truncate($featured['title'], 15, '...'); ?>
                                            <i><?php echo $featured['price']; ?> triệu</i></span>

                                        <ul class="listing-hidden-content">
                                            <li><?php echo Lang::get('area'); ?> <span><?php echo $featured['area']; ?>
                                                    m2</span></li>
                                            <li><?php echo Lang::get('rooms'); ?>
                                                <span><?php echo $featured['rooms']; ?></span>
                                            </li>
                                            <li><?php echo Lang::get('bedrooms'); ?>
                                                <span><?php echo $featured['bedrooms']; ?></span>
                                            </li>
                                            <li><?php echo Lang::get('toilets'); ?>
                                                <span><?php echo $featured['toilets']; ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <?php
                                        foreach (explode('/', $featured['src']) as $file) :
                                        ?>
                                    <img src="<?php echo \Asset::get_file($file, 'img'); ?>" alt="">
                                    <?php
                                            break;
                                        endforeach;
                                        ?>
                                </a>

                            </div>
                        </div>
                        <?php
                        endforeach;
                        ?>
                        <!-- Item / End -->
                    </div>

                </div>
                <!-- Widget / End -->

            </div>
        </div>
        <!-- Sidebar / End -->

    </div>
</div>
<script>
var map = L.map('map_cuc_manh').setView([<?php echo $properties['latitude']; ?>,
    <?php echo $properties['longitude']; ?>
], 15);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);
var marker = L.marker([<?php echo $properties['latitude']; ?>, <?php echo $properties['longitude']; ?>], {
        draggable: false
    }).addTo(map)
    .bindPopup('<?php echo $properties['title']; ?>')
    .openPopup();

var circle = L.circle([<?php echo $properties['latitude']; ?>, <?php echo $properties['longitude']; ?>], {
    color: 'yellow',
    radius: 500
}).addTo(map);
L.Routing.control({
    waypoints: [L.latLng(<?php echo $properties['latitude']; ?>, <?php echo $properties['longitude']; ?>), L
        .latLng(10.047031686637611, 105.76783154231147)
    ],
    // routeWhileDragging: true,
    reverseWaypoints: true,
    showAlternatives: true,
    show: false
}).addTo(map);
// function createButton(label, container) {
//     var btn = L.DomUtil.create('button', '', container);
//     btn.setAttribute('type', 'button');
//     btn.innerHTML = label;
//     return btn;
// }

// map.on('click', function(e) {
//     var container = L.DomUtil.create('div'),
//         destBtn = createButton('Đi đến vị trí này', container);
//     L.popup()
//         .setContent(container)
//         .setLatLng(e.latlng)
//         .openOn(map);
    
// });
</script>


<!-- function onLocationFound(e) {
		var radius = e.accuracy / 2;

		L.marker(e.latlng).addTo(map)
			.bindPopup("You are within " + radius + " meters from this point").openPopup();

		L.circle(e.latlng, radius).addTo(map);
	}

	function onLocationError(e) {
		alert(e.message);
	}

	map.on('locationfound', onLocationFound);
	map.on('locationerror', onLocationError);
	map.locate({setView: true, maxZoom: 16}); -->
