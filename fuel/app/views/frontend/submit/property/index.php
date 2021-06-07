<?php
if (!empty(\Arr::get($errors, 'data')) ) {
    Controller_Utility::message( \Arr::get($errors, 'data'));
}
?>
<style>
    #map_cuc_manh {
        height: 400px;
    }
</style>

<!-- Titlebar
================================================== -->
<div id="titlebar" class="submit-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2><i class="fa fa-plus-circle"></i> Thêm Tin Bất Động Sản</h2>
            </div>
        </div>
    </div>
</div>


<!-- Content
================================================== -->

<div class="container">
    <div class="row">

        <!-- Submit Page -->
        <div class="col-md-12">
            <div class="submit-page">
                <?php
                if (!\Session::get('username')) {
                ?>
                    <div class="notification notice large margin-bottom-55">
                        <h4>Vui Lòng Đăng Nhập Để Đăng Tin?</h4>
                        <p>Nếu bạn không có tài khoản, bạn có thể đăng ký <a href="/authen/register">tại đây</a>.
                        </p>
                    </div>
                <?php
                } else {
                ?>
                    <!-- Section -->
                    <section id="submit-properties">
                        <form action="/submit-property" method="post" enctype="multipart/form-data" name="form_submit_property">
                            <h3>Thông Tin Cơ Bản</h3>
                            <div class="submit-section">

                                <!-- Title -->
                                <div class="form">
                                    <h5>Tiêu Đề <i class="tip" data-tip-content="Giới thiệu sơ lược về tin của bạn"></i>
                                    </h5>
                                    <input class="search-field" type="text" value="" name="title" id="title" required    />
                                </div>

                                <!-- Row -->
                                <div class="row with-forms">

                                    <!-- Status -->
                                    <div class="col-md-6">
                                        <h5>Trạng Thái</h5>
                                        <select class="chosen-select-no-single" name="shape" id="shape" onchange="getTypeByShape()">
                                            <option value="sale">Mua Bán</option>
                                            <option value="rent">Cho Thuê</option>
                                        </select>
                                    </div>

                                    <!-- Type -->
                                    <div class="col-md-6">
                                        <h5>Loại</h5>
                                        <select class="chosen-select-no-single" name="type" id="type">
                                            <option label="blank"></option>
                                        </select>
                                    </div>

                                </div>
                                <!-- Row / End -->


                                <!-- Row -->
                                <div class="row with-forms">

                                    <!-- Price -->
                                    <div class="col-md-4">
                                        <h5>Giá <i class="tip" data-tip-content="Giá bạn muốn bán đơn vị VNĐ"></i>
                                        </h5>
                                        <div class="select-input disabled-first-option">
                                            <input type="text" data-unit="Triệu VND" name="price" id="price" placeholder="Ví dụ: 100.5" required>
                                        </div>
                                    </div>

                                    <!-- Area -->
                                    <div class="col-md-4">
                                        <h5>Diện Tích</h5>
                                        <div class="select-input disabled-first-option">
                                            <input type="text" data-unit="m2" name="area" id="area" placeholder="Ví dụ: 10.5" required>
                                        </div>
                                    </div>

                                    <!-- Rooms -->
                                    <div class="col-md-4">
                                        <h5>Số Phòng</h5>
                                        <select class="chosen-select-no-single" name="rooms" id="rooms">
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">Nhiều hơn 5</option>
                                        </select>
                                    </div>

                                </div>
                                <!-- Row / End -->

                            </div>
                            <!-- Section / End -->


                            <!-- Section -->
                            <h3>Hình Ảnh</h3>
                            <!-- <div class="submit-section">
                            <form action="/file-upload" class="dropzone"></form>
                        </div> -->
                            <div class="input-images"></div>
                            <small><?php ?></small>
                            <!-- Section / End -->


                            <!-- Section -->
                            <h3>Vị Trí</h3>
                            <div class="submit-section">

                                <!-- Row -->
                                <div class="row with-forms">

                                    <!-- Address -->
                                    <div class="col-md-12">
                                        <h5>Địa Chỉ</h5>
                                        <input type="text" name="address" id="address">
                                    </div>
                                </div>
                                <!-- Row / End -->
                                <!-- Row -->
                                <div class="row with-forms">
                                    <!-- Province -->
                                    <div class="col-md-4">
                                        <h5>Tỉnh/ Thành Phố</h5>
                                        <select class="chosen-select-no-single" id="province" name="province" onchange="getDistrict();">
                                            <option value="" label="blank"></option>
                                        </select>
                                    </div <!-- District -->
                                    <div class="col-md-4">
                                        <h5>Quận/ Huyện</h5>
                                        <select class="chosen-select-no-single" id="district" name="district" onchange="getWard();">
                                            <option value="" label="blank"></option>
                                        </select>
                                    </div>
                                    <!-- Ward -->
                                    <div class="col-md-4">
                                        <h5>Xã/ Phường/ Thị Trấn</h5>
                                        <select class="chosen-select-no-single" id="ward" name="ward">
                                            <option value="" label="blank"></option>
                                        </select>
                                    </div>


                                </div>
                                <!-- Row / End -->
                            </div>
                            <!-- Section / End -->
                            <h3>Bản Đồ</h3>
                            <!-- Row -->
                            <div class="row with-forms">

                                <!-- Price -->
                                <div class="col-md-6">
                                    <h5>Kinh Độ <i class="tip" data-tip-content="Nhập kinh độ hoặc bỏ qua để chọn trên bản đồ"></i>
                                    </h5>
                                    <div class="form">
                                        <input class="search-field" type="text" value="" name="longitude" id="longitude" />
                                    </div>
                                </div>

                                <!-- Area -->
                                <div class="col-md-6">
                                    <h5>Vĩ Độ <i class="tip" data-tip-content="Nhập vĩ độ hoặc bỏ qua để chọn trên bản đồ"></i>
                                    </h5>
                                    <div class="form">
                                        <input class="search-field" type="text" value="" name="latitude" id="latitude" />
                                    </div>
                                </div>

                            </div>
                            <!-- Row / End -->
                            <div class="submit-section">
                                <div class="row with-forms">
                                    <div class="col-md-12">
                                        <div id="map_cuc_manh"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Section -->
                            <h3>Thông Tin Chi Tiết</h3>
                            <div class="submit-section">

                                <!-- Description -->
                                <div class="form">
                                    <h5>Mô Tả</h5>
                                    <textarea class="WYSIWYG" name="description" cols="40" rows="3" id="description" spellcheck="true" required></textarea>
                                    <script>
                                        CKEDITOR.replace('description');
                                    </script>
                                </div>

                                <!-- Row -->
                                <div class="row with-forms">


                                    <!-- Beds -->
                                    <div class="col-md-4">
                                        <h5>Phòng Ngủ <span>(optional)</span></h5>
                                        <select class="chosen-select-no-single" name="bedrooms" id="bedrooms">
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>

                                    <!-- Toilets -->
                                    <div class="col-md-4">
                                        <h5>Toilets <span>(optional)</span></h5>
                                        <select class="chosen-select-no-single" id="toilets" name="toilets">
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>

                                </div>
                                <!-- Row / End -->


                                <!-- Checkboxes -->
                                <h5 class="margin-top-30">Khác <span>(optional)</span></h5>
                                <!-- Row -->
                                <div class="row with-forms">


                                    <!-- Beds -->
                                    <div class="col-md-3">
                                        <div class="checkboxes in-row margin-bottom-20">
                                            <input id="check-gym" type="checkbox" name="check-gym">
                                            <label for="check-gym">Gần Phòng Gym</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="checkboxes in-row margin-bottom-20">
                                            <input id="check-market" type="checkbox" name="check-market">
                                            <label for="check-market">Gần Siêu Thị/ Chợ</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="checkboxes in-row margin-bottom-20">
                                            <input id="check-hospital" type="checkbox" name="check-hospital">
                                            <label for="check-hospital">Gần Bệnh Viện</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="checkboxes in-row margin-bottom-20">
                                            <input id="check-parking" type="checkbox" name="check-parking">
                                            <label for="check-parking">Bãi Đỗ Xe</label>
                                        </div>
                                    </div>

                                </div>
                                <!-- Checkboxes / End -->
                            </div>
                            <!-- Section / End -->
                            <!-- Section -->
                            <h3>Thông Tin Liên Lạc</h3>
                            <div class="submit-section">
                                <!-- Row -->
                                <div class="row with-forms">
                                    <!-- Name -->
                                    <div class="col-md-4">
                                        <h5>Tên</h5>
                                        <input type="text" name="name" id="name" required>
                                    </div>
                                    <!-- Email -->
                                    <div class="col-md-4">
                                        <h5>E-Mail</h5>
                                        <input type="text" name="email" id="email" required>
                                    </div>
                                    <!-- Name -->
                                    <div class="col-md-4">
                                        <h5>Số Điện Thoại <span>(*)</span></h5>
                                        <input type="text" name="phone" id="phone" required>
                                    </div>
                                </div>
                                <!-- Row / End -->
                            </div>
                            <!-- Section / End -->
                            <div class="divider"></div>
                            <input type="submit" class="submit button" id="submit-properties" name="submit-properties" value="Đăng Tin" />
                            <!-- <a href="#" class="button preview">Đăng <i class="fa fa-arrow-circle-right"></i></a> -->
                        </form>
                    </section>
                <?php
                }
                ?>
            </div>
        </div>

    </div>
</div>

<script>
    var map = L.map('map_cuc_manh').setView([10.047031686637611, 105.76783154231147], 15);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    var marker = L.marker([10.047031686637611, 105.76783154231147], {
            draggable: true
        }).addTo(map)
        .bindPopup('Đây là toạ độ mặc định.<br> Kéo biểu tượng để chọn toạ độ.')
        .openPopup();
    // L.circle([50.5, 30.5], {radius: 200}).addTo(map);
    $('#longitude, #latitude').blur(function() {
        if ($('#longitude').val() && $('#latitude').val()) {
            marker.setLatLng([$('#latitude').val(), $('#longitude').val()]);
            map.setView([$('#latitude').val(), $('#longitude').val()]);
        }
    });

    marker.on('dragend', function(e) {
        $('#longitude').val(marker.getLatLng().lng);
        $('#latitude').val(marker.getLatLng().lat);
    })

    console.log(marker.getLatLng().lat);
    // L.control.zoom('zoomInText').addTo(map);
</script>