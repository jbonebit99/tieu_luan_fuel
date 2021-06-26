<?php
// var_dump(\Arr::get($content,"blog"));die;
?>

<!-- Titlebar
================================================== -->
<div id="titlebar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h2><?php echo Arr::get($content,"title");?></h2>
                <span><?php echo Arr::get($content,"subtitle");?></span>

                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>Tin tức</li>
                    </ul>
                </nav>

            </div>
        </div>
    </div>
</div>


<!-- Content
================================================== -->
<div class="container">

    <!-- Blog Posts -->
    <div class="blog-page">
        <div class="row">
            <div class="col-md-8">

                <!-- Blog Post -->
                <?php
                foreach (Arr::get($content, 'blogs') as $key => $value):
                ?>
                ` <div class="blog-post">
                    <!-- Img -->
                    <a href="blog/view/<?php echo $value['id'] ?>" class="post-img">
                        <!--                        <img src="images/blog-post-01a.jpg" alt="">-->
                        <?php echo \Asset::img($value['image'], array("alt" => "")); ?>
                    </a>

                    <!-- Content -->
                    <div class="post-content">
                        <h3><a href="blog/view/<?php echo $value['id'] ?>"><?php echo $value['title'] ?></a></h3>

                        <ul class="post-meta">
                            <li><?php echo  Date::forge($value['created_at'])->format("%d-%m, %Y"); ?></li>
                            <li><a href="#"><?php echo $value['total_comment']?> bình luận</a></li>
                        </ul>

                        <p><?php echo $value['sub_description']?></p>

                        <a href="blog/view/<?php echo $value['id'] ?>" class="read-more">Xem thêm <i class="fa fa-angle-right"></i></a>
                    </div>

                </div>

                <?php
endforeach;
?>
                <!-- Blog Post / End -->
                <!-- Blog Post / End -->



                <!-- Pagination -->
                <div class="clearfix"></div>
                <?php
echo Paginationapp::instance('my_pagination')->render();
?>
                <div class="clearfix"></div>

            </div>

            <!-- Blog Posts / End -->


            <!-- Widgets -->
            <div class="col-md-4">
                <div class="sidebar right">

                    <!-- Widget -->
                    <div class="widget">
                        <h3 class="margin-top-0 margin-bottom-25">Tìm kiếm bài viết</h3>
                       <form action="/blog/search/" method="POST">
                       <div class="search-blog-input">
                            <div class="input"><input class="search-field" id="key" name="key" type="text" value="" placeholder="Nhập nội dung và nhấn Enter"
                                    value="" /></div>
                        </div>
                       </form>
                        <div class="clearfix"></div>
                    </div>
                    <!-- Widget / End -->


                    <!-- Widget -->
                    <div class="widget">
                        <h3>Bạn có thắc mắc?</h3>
                        <div class="info-box margin-bottom-10">
                            <p>Bạn có câu hỏi hoặc cần giải đáp thắc mắc. Hãy gửi về cho chúng tôi</p>
                            <a href="/contact.html" class="button fullwidth margin-top-20"><i
                                    class="fa fa-envelope-o"></i> Đến trang liên hệ</a>
                        </div>
                    </div>
                    <!-- Widget / End -->


                    <!-- Widget -->
                    <div class="widget">

                        <h3>Bài viết ngẫu nhiên</h3>
                        <ul class="widget-tabs">
                            <?php 
                            
                                foreach (Arr::get($content,'random') as $key => $ramdom):
                            ?>
                            <!-- Post #1 -->
                            <li>
                                <div class="widget-content">
                                    <div class="widget-thumb">
                                        <?php echo \Asset::img($ramdom['image'], array("alt" => "")); ?>
                                    </div>

                                    <div class="widget-text">
                                        <h5><a href="/blog/view/<?php echo $ramdom['id']?>"><?php echo ucwords($ramdom['title']);?> </a></h5>
                                        <span><?php echo  Date::forge($ramdom['created_at'])->format("%d-%m, %Y"); ?></span>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </li>
                                <?php 
                                endforeach;
                                ?>
                        

                        </ul>

                    </div>
                    <!-- Widget / End-->


                    <!-- Widget -->
                    <div class="widget">
                        <h3 class="margin-top-0 margin-bottom-25">Theo dõi chúng tôi</h3>
                        <ul class="social-icons rounded">
                            <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
                            <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
                            <li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
                            <li><a class="linkedin" href="#"><i class="icon-linkedin"></i></a></li>
                        </ul>

                    </div>
                    <!-- Widget / End-->

                    <div class="clearfix"></div>
                    <div class="margin-bottom-40"></div>
                </div>
            </div>
        </div>
        <!-- Sidebar / End -->


    </div>
</div>