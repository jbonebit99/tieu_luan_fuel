<!-- Titlebar
================================================== -->
<?php
\Lang::load('lang');
$data = \Arr::get($content, "content");
?>
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2><?php echo Arr::get($content,"title")?></h2>
				<span><?php echo Arr::get($content,"subtitle")?></span>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="/">Home</a></li>
						<li><?php echo Arr::get($content,"title")?></li>
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


		<!-- Post Content -->
		<div class="col-md-8">


			<!-- Blog Post -->
			<div class="blog-post single-post">

				<!-- Img -->
			
				<?php echo Asset::img($data['image']);?>

				<!-- Content -->
				<div class="post-content">
					<h3><?php echo ucwords($data['title']);?></h3>

					<ul class="post-meta">
						<li><?php echo  Date::forge($data['created_at'])->format("%d-%m, %Y"); ?></li>
						<li><a href="#"><?php echo Arr::get($content,"count_comment")?> Bình luận</a></li>
					</ul>

					<div class="post-quote">
						<span class="icon"></span>
						<blockquote>
						<?php echo $data['sub_description']?>
						</blockquote>
					</div>
					<?php echo html_entity_decode( $data['content']); ?>
					<!-- Share Buttons -->
					<ul class="share-buttons margin-top-40 margin-bottom-0">
						<li><a class="fb-share" href="#"><i class="fa fa-facebook"></i> Share</a></li>
						<li><a class="twitter-share" href="#"><i class="fa fa-twitter"></i> Tweet</a></li>
						<li><a class="gplus-share" href="#"><i class="fa fa-google-plus"></i> Share</a></li>
						<li><a class="pinterest-share" href="#"><i class="fa fa-pinterest-p"></i> Pin</a></li>
					</ul>
					<div class="clearfix"></div>

				</div>
			</div>
			<!-- Blog Post / End -->


			<!-- Post Navigation -->
			<ul id="posts-nav" class="margin-top-0 margin-bottom-40">
				<li class="next-post">
					<a href="#"><span>Next Post</span>
					Tips For Newbie Hitchhiker</a>
				</li>
				<li class="prev-post">
					<a href="#"><span>Previous Post</span>
					What's So Great About Merry?</a>
				</li>
			</ul>


			<!-- About Author -->
			<div class="about-author">
				<?php echo Asset::img('agent-avatar.jpg');?>
				<div class="about-description">
					<h4>Admin Findeo</h4>
					<a href="#">dxtruong.ktpm0127@student.ctuet.edu.vn</a>
					<p>Chuyên viên bất động sản tại Cần Thơ. Với nhiều năm kinh nghiệm mua bán bất động sản</p>
				</div>
			</div>


			<!-- Related Posts -->
			<div class="clearfix"></div>
			<h4 class="headline margin-top-25">Related Posts</h4>
			<div class="row">
				<div class="col-md-6">

					<!-- Blog Post -->
					<div class="blog-post">

						<!-- Img -->
						<a href="#" class="post-img">
							<?php echo Asset::img('blog-post-02.jpg');?>
						</a>

						<!-- Content -->
						<div class="post-content">
							<h3><a href="#">Bedroom Colors You'll Never Regret</a></h3>
							<p>Nam nisl lacus, dignissim ac tristique ut, scelerisque eu massa. Vestibulum ligula nunc, rutrum in malesuada vitae. </p>

							<a href="#" class="read-more">Read More <i class="fa fa-angle-right"></i></a>
						</div>

					</div>
					<!-- Blog Post / End -->

				</div>

				<div class="col-md-6">

					<!-- Blog Post -->
					<div class="blog-post">

						<!-- Img -->
						<a href="#" class="post-img">
							<?php echo Asset::img('blog-post-03.jpg');?>
						</a>

						<!-- Content -->
						<div class="post-content">
							<h3><a href="#">What to Do a Year Before Buying Apartment</a></h3>
							<p>Nam nisl lacus, dignissim ac tristique ut, scelerisque eu massa. Vestibulum ligula nunc, rutrum in malesuada vitae. </p>

							<a href="#" class="read-more">Read More <i class="fa fa-angle-right"></i></a>
						</div>

					</div>
					<!-- Blog Post / End -->

				</div>
			</div>
			<!-- Related Posts / End -->


			<div class="margin-top-50"></div>

			<!-- Reviews -->
			<section class="comments">
			<h4 class="headline margin-bottom-35">Bình luận <span class="comments-amount">(<?php echo Arr::get($content,"count_comment")?>)</span></h4>

				<ul>

					<?php
						foreach (Arr::get($content,"comments") as $key => $value):
					?>

					<li>
						<div class="avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /> </div>
						<div class="comment-content"><div class="arrow-comment"></div>
							<div class="comment-by"><?php echo ucwords($value['name']); ?><span class="date"><?php echo  Date::forge($value['created_at'])->format("%d-%m, %Y"); ?></span>
								<a href="" class="reply"><i class="fa fa-exclamation-triangle"></i> Báo cáo</a>
							</div>
							<p><?php echo $value['content'];?></p>
						</div>

					</li>
					<?php endforeach; ?>
				 </ul>

			</section>
			<div class="clearfix"></div>
			<div class="margin-top-55"></div>


			<!-- Add Comment -->
			<h4 class="headline">Thêm bình luận</h4>
			<div class="margin-top-15"></div>

			<!-- Add Comment Form -->
			<form id="add_comment" class="add_comment" action="/blog/comment" method="POST">
				<fieldset>
					<input type="hidden" name="id" value="<?php echo $data['id']?>">
					<div>
						<label>Tên:</label>
						<input type="text" value="" name="name" id="name" required/>
					</div>

					<div>
						<label>Email: <span>*</span></label>
						<input type="text" value="" name="email" id="email" required/>
					</div>

					<div>
						<label>Nội dung bình luận: <span>*</span></label>
						<textarea cols="40" rows="3" required id="comment" name="comment"></textarea>
					</div>

				</fieldset>

				<a href="#" id="c_submit" class="button">Bình luận</a>
				<div class="clearfix"></div>
				<div class="margin-bottom-20"></div>

			</form>

	</div>
	<!-- Content / End -->



	<!-- Sidebar
	================================================== -->

	<!-- Widgets -->
	<div class="col-md-4">
		<div class="sidebar right">

			<!-- Widget -->
			<div class="widget">
				<h3 class="margin-top-0 margin-bottom-25">Tìm kiếm bài viết</h3>
				<form action="/blog/search" method="POST">
				<div class="search-blog-input">
					<div class="input"><input class="search-field" id=key name="key" type="text" placeholder="Nhập nội dung và nhấn Enter.." value=""/></div>
				</div>
				</form>
				
				<div class="clearfix"></div>
			</div>
			<!-- Widget / End -->


			<!-- Widget -->
			<div class="widget">
				<h3>Bạn có thắc mặc?</h3>
				<div class="info-box margin-bottom-10">
					<p>Bạn có câu hỏi hoặc cần giải đáp thắc mắc. Hãy gửi về cho chúng tôi</p>
					<a href="/contact" class="button fullwidth margin-top-20"><i class="fa fa-envelope-o"></i> Tới trang liên hệ</a>
				</div>
			</div>
			<!-- Widget / End -->


			<!-- Widget -->
			<div class="widget">

				<h3>Popular Posts</h3>
				<ul class="widget-tabs">

					<!-- Post #1 -->
					<li>
						<div class="widget-content">
								<div class="widget-thumb">
								<a href="blog-full-width-single-post.html"><img src="images/blog-widget-03.jpg" alt=""></a>
							</div>

							<div class="widget-text">
								<h5><a href="blog-full-width-single-post.html">What to Do a Year Before Buying Apartment </a></h5>
								<span>October 26, 2016</span>
							</div>
							<div class="clearfix"></div>
						</div>
					</li>

					<!-- Post #2 -->
					<li>
						<div class="widget-content">
							<div class="widget-thumb">
								<a href="blog-full-width-single-post.html"><img src="images/blog-widget-02.jpg" alt=""></a>
							</div>

							<div class="widget-text">
								<h5><a href="blog-full-width-single-post.html">Bedroom Colors You'll Never Regret</a></h5>
								<span>November 9, 2016</span>
							</div>
							<div class="clearfix"></div>
						</div>
					</li>

					<!-- Post #3 -->
					<li>
						<div class="widget-content">
							<div class="widget-thumb">
								<a href="blog-full-width-single-post.html"><img src="images/blog-widget-01.jpg" alt=""></a>
							</div>

							<div class="widget-text">
								<h5><a href="blog-full-width-single-post.html">8 Tips to Help You Finding New Home</a></h5>
								<span>November 12, 2016</span>
							</div>
							<div class="clearfix"></div>
						</div>
					</li>

				</ul>

			</div>
			<!-- Widget / End-->


			<!-- Widget -->
			<div class="widget">
				<h3 class="margin-top-0 margin-bottom-25">Social</h3>
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
