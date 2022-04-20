<?php
defined('BASEPATH') or exit('No direct script access allowed');


if (count($sliderProducts) > 0 && !isset($_GET['search_in_title'])) {
?>
<section class="hero-section">
	<div class="hero-slider owl-carousel">
		<?php
			$i = 0;
			foreach ($sliderProducts as $article) {
				if ($i < 4) {
			?>




		<div class="hs-item set-bg" data-setbg="<?= base_url('attachments/shop_images/' . $article['image']) ?>">
			<div class="container">
				<div class="row">
					<div class="col-xl-6 col-lg-7 text-white">
						<span>New Arrivals</span>
						<h2> <?= character_limiter($article['title'], 100) ?></h2>
						<p> <?= character_limiter(strip_tags($article['basic_description']), 150) ?></p>
						<a href="#" class="add-to-cart site-btn sb-line">DISCOVER</a>
						<a href="#" class="site-btn sb-white">ADD TO CART</a>
					</div>
				</div>
				<div class="offer-card text-white" style="background-color:greenyellow;">
					<span>from</span>
					<h2>₹29</h2>
					<p>KNOW MORE</p>
				</div>
			</div>
		</div>



		<!-- <div class="item <?= $i == 0 ? 'active' : '' ?>" style="background-image: url('<?= base_url('attachments/shop_images/' . $article['image']) ?>')">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3>
                                    <a href="<?= LANG_URL . '/' . $article['url'] ?>">
                                        <?= character_limiter($article['title'], 100) ?>
                                    </a>
                                </h3>
                                <div class="description">
                                    <?= character_limiter(strip_tags($article['basic_description']), 150) ?>
                                </div>
                                <?php if ($hideBuyButtonsOfOutOfStock == 0 || (int)$article['quantity'] > 0) { ?>
                                    <a class="option add-to-cart" data-goto="<?= LANG_URL . '/checkout' ?>" href="javascript:void(0);" data-id="<?= $article['id'] ?>">
                                        <?= lang('buy_now') ?>
                                    </a>
                                <?php } ?>
                            </div>
                            <div class="col-sm-6">

                            </div>
                        </div>
                    </div>
                </div> -->
		<?php
					$i++;
				}
			}
			?>

	</div>


	<div class="container">
		<div class="slide-num-holder" id="snh-1"></div>
</section>

<?php } ?>






<section class="features-section">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4 p-0 feature">
				<div class="feature-inner">
					<div class="feature-icon">
						<span class="fa fa-credit-card" style="font-size:300%;"></span>
					</div>
					<h2>Fast Secure Payments</h2>
				</div>
			</div>
			<div class="col-md-4 p-0 feature" style="background-color:green;">
				<div class="feature-inner">
					<div class="feature-icon">
						<span class="fa fa-leaf" style="font-size:300%;"></span>
					</div>
					<h2>100% Ayurvedic Products</h2>
				</div>
			</div>
			<div class="col-md-4 p-0 feature">
				<div class="feature-inner">
					<div class="feature-icon">
						<span class="fa fa-paper-plane" style="font-size:300%;"></span>
					</div>
					<h2> fast Delivery</h2>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- 
    <section class="banner-section mt-5">
		<div class="container">
			<div class="banner set-bg" data-setbg="<?= base_url('template/imgs/banner-bg.jpg') ?>">
				<div class="tag-new">NEW</div> 
			
				<span>Nutritious food supplement to overcome junk food disorders.</span>
                <h4>Through our routine diat,we should keep up our health. From Baby to grandpa, we wish to see healthy India. Healthy Mind in healthy body.</h4>
				<a href="#" class="site-btn">Read More</a>
			</div>
		</div>
	</section> -->




<section class="testimonials" id="gobottom">
	<div class="container">
		<div class="row">
			<div class="col-md-4 mb-3 wow bounceInUp" data-wow-duration="1.4s">
				<div class="big-img">
					<img src="<?= base_url('template/imgs/bg.jpg') ?>" class="img-fluid">
				</div>
			</div>
			<div class="col-md-8">
				<div class="inner-section wow fadeInUp">
					<h3>Follow the <span class="bg-main">Nutritious food supplement to overcome junk food
							disorders.</span></h3>
					<br>
					<p class="text-justify">Through our routine diat,we should keep up our health. From Baby to grandpa,
						we wish to see healthy India. Healthy Mind in healthy body.</p>
					<a class="btn btn-primary btn-join" href="#">READ MORE</a>
					<div class="linear-grid">
						<div class="row">



							<section class="top-letest-product-section">
								<div class="container">

									<div class="product-slider owl-carousel">


										<?php
										$i = 0;
										if (!empty($products) && $i < 5) {

											foreach ($products as $product) {
										?>







										<!-- <a href="<?= LANG_URL . '/' . $product['url'] ?>"> -->
										<div class="product-item">
											<div class="pi-pic">
												<img src="<?= base_url('attachments/shop_images/' . $product['image']) ?>"
													alt="">
												<div class="pi-links">
													<a class="add-card add-to-cart"
														data-goto="<?= LANG_URL . '/checkout' ?>"
														href="javascript:void(0);" data-id="<?= $product['id'] ?>"><i
															class="fa fa-shopping-cart"></i><span>ADD TO CART</span></a>
													<a href="#" class="wishlist-btn"><i class="fa fa-heart"></i></a>
												</div>
											</div>
											<div class="pi-text">
												<h6><?= $product['price'] . CURRENCY ?></h6>
												<p><?= $product['title'] ?></p>
											</div>
										</div>

										<!-- </a> -->
										<!--	 <div class="product-item">
					<div class="pi-pic">
						<div class="tag-new">New</div>
						<img src="<?= base_url('template/imgs/bg.jpg') ?>" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$35,00</h6>
						<p>Black and White Stripes Dress</p>
					</div>
				</div>
			<div class="product-item">
					<div class="pi-pic">
						<img src="<?= base_url('template/imgs/bg.jpg') ?>" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$35,00</h6>
						<p>Flamboyant Pink Top </p>
					</div>
				</div>
				<div class="product-item">
						<div class="pi-pic">
							<img src="<?= base_url('template/imgs/bg.jpg') ?>" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>$35,00</h6>
							<p>Flamboyant Pink Top </p>
						</div>
					</div>
				<div class="product-item">
						<div class="pi-pic">
							<img src="<?= base_url('template/imgs/bg.jpg') ?>" alt="">
							<div class="pi-links">
								<a href="#" class="add-card"><i class="fa fa-shopping-cart"></i><span>ADD TO CART</span></a>
								<a href="#" class="wishlist-btn"><i class="fa fa-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>$35,00</h6>
							<p>Flamboyant Pink Top </p>
						</div>
					</div> -->



										<?php }
											$i++;
										} ?>



									</div>
								</div>
							</section>


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="testimonials mybg-events">

	<div class="container">

		<div class="row">
			<div class="col-md-12 wow fadeInUp">
				<h3 class="title-heading text-center">Why Ayurcin?</h3>
				<p class="myp text-center">The nutritious herbs we are offering through the foods. We have invented
					Herbal Milk and Herbal Chikki which rejuvenates and activates digestive system</p>
			</div>
		</div>
		<div class="row wow slideInLeft" data-wow-duration="3s">
			<!-- <div class="col-md-4 mb-3">
          <div class="big-img2">
            <img src="https://images.pexels.com/photos/167527/pexels-photo-167527.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" class="img-fluid">
          </div>

        </div> -->
			<div class="col-md-8">
				<div class="inner-section">
					<div class="my-grid">
						<div class="row">
							<!-- <div class="col-sm-6 col-md-4 mb-3">

                  <img src="https://images.pexels.com/photos/761963/pexels-photo-761963.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" class="img-fluid">

                </div>
                <div class="col-sm-6 col-md-8 mb-3 ">

                  <img src=" https://images.pexels.com/photos/164693/pexels-photo-164693.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" class="img-fluid">

                </div> -->

							<div class="col-md-12 mb-3 " align="center">
								<div class="text-block">
									<h5 class="events-heading">Start OWN distribution business with just ₹5,000.</h5>
									<p class="myp-font">For healthy India</p>
									<a href="#" class="site-btn">Read More</a>
								</div>
							</div>
							<!-- <div class=" col-md-4 ">

                  <img src="https://images.pexels.com/photos/1150837/pexels-photo-1150837.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" class="img-fluid">

                </div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>



<section class="product-filter-section mt-4">
	<div class="container">
		<div class="section-title">
			<h2>BROWSE TOP SELLING PRODUCTS</h2>
		</div>
		<ul class="product-filter-menu">

			<?php
			$i = 0;
			if ($i < 7) {
				foreach ($all_categories as $categories) {
			?>
			<li><a href="javascript:void(0);"
					data-categorie-id="<?= $categories['id'] ?>"><?= $categories['name'] ?></a></li>
			<li><a href="javascript:void(0);"
					data-categorie-id="<?= $categories['id'] ?>"><?= $categories['name'] ?></a></li>

			<?php


					$i++;
				}
				
			}
			?>




			<!-- <li><a href="#">JUMPSUITS</a></li>
				<li><a href="#">LINGERIE</a></li>
				<li><a href="#">JEANS</a></li>
				<li><a href="#">DRESSES</a></li>
				<li><a href="#">COATS</a></li>
				<li><a href="#">JUMPERS</a></li>
				<li><a href="#">LEGGINGS</a></li> -->
		</ul>
		<div class="row">

			<?php 
		$i=0;
		if($i<20)
		{
			foreach($bestSellers as $best_sellers)
			{

?>

<!-- 

			<div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1">
				<div class="card"> <img class="card-img-top" src="="
						<?= base_url('attachments/shop_images/' . $product['image']) ?>">
					<div class="card-body">
						<h5><b>Bagels</b> </h5>
						<div class="d-flex flex-row my-2">
							<div class="text-muted">₹35/piece</div>
							<div class="ml-auto"> <button class="border rounded bg-white sign"><span class="fa fa-plus"
										id="orange"></span></button>
								<span class="px-sm-1">1
									pc</span> <button class="border rounded bg-white sign"><span class="fa fa-minus"
										id="orange"></span></button>
							</div>
						</div> <button class="btn w-100 rounded my-2">Add to cart</button>
					</div>
				</div>
			</div> -->


			<div class="col-lg-3 col-sm-6">
				<div class="product-item">
					<div class="pi-pic">
						<a href="">
							<img src="<?= base_url('attachments/shop_images/' . $best_sellers['image']) ?>" alt=""> </a>
						<div class="pi-links">
							<a href="javascript:void(0);" data-categorie-id="<?= $best_sellers['id'] ?>"
								class="add-card"><i class="fa fa-shopping-cart"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="fa fa-heart"></i>
						</div>
					</div>
					<div class="pi-text">
						<h6>₹ <?= $best_sellers['price'] ?></h6>
						<p>
							<?= character_limiter($best_sellers['title'], 50) ?>
						</p>
						</a>
					</div>
				</div>
			</div>



			<?php
			}
		}
		?>
			<div class="col-lg-3 col-sm-6">
				<div class="product-item">
					<div class="pi-pic">
						<img src="<?= base_url('template/imgs/6.jpg') ?>" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$35,00</h6>
						<p>Flamboyant Pink Top </p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6">
				<div class="product-item">
					<div class="pi-pic">
						<div class="tag-sale">ON SALE</div>
						<img src="<?= base_url('template/imgs/6.jpg') ?>" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$35,00</h6>
						<p>Black and White Stripes Dress</p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6">
				<div class="product-item">
					<div class="pi-pic">
						<img src="<?= base_url('template/imgs/6.jpg') ?>" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$35,00</h6>
						<p>Flamboyant Pink Top </p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6">
				<div class="product-item">
					<div class="pi-pic">
						<img src="<?= base_url('template/imgs/6.jpg') ?>" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$35,00</h6>
						<p>Flamboyant Pink Top </p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6">
				<div class="product-item">
					<div class="pi-pic">
						<img src="<?= base_url('template/imgs/6.jpg') ?>" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$35,00</h6>
						<p>Flamboyant Pink Top </p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6">
				<div class="product-item">
					<div class="pi-pic">
						<img src="<?= base_url('template/imgs/6.jpg') ?>" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$35,00</h6>
						<p>Black and White Stripes Dress</p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6">
				<div class="product-item">
					<div class="pi-pic">
						<img src="<?= base_url('template/imgs/6.jpg') ?>" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$35,00</h6>
						<p>Flamboyant Pink Top </p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6">
				<div class="product-item">
					<div class="pi-pic">
						<img src="<?= base_url('template/imgs/6.jpg') ?>" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$35,00</h6>
						<p>Flamboyant Pink Top </p>
					</div>
				</div>
			</div>
		</div>
		<div class="text-center pt-5">
			<button class="site-btn sb-line sb-dark">LOAD MORE</button>
		</div>
	</div>
</section>



<div class="home-banners">
	<div class="single-banner pull-left">
		<a href="#"><img src="<?= base_url('attachments/banners/1.jpg') ?>" alt="" /></a>
	</div>
	<div class="single-banner pull-right">
		<a href="#"><img src="<?= base_url('attachments/banners/2.jpg') ?>" alt="" /></a>
	</div>
	<div class="clearfix"></div>
</div>

<!-- <h3 class="part-label"><?= lang('products') ?></h3>
<div class="row products">
	<?php
            if (!empty($products)) {
                $load::getProducts($products, 'col-sm-4 col-md-3', false);
            } else {
                ?>
	<div class="col-xs-12">
		<div class="alert alert-danger"><?= lang('no_products') ?></div>
	</div>
	<?php } ?>
</div> -->


<!-- 
<div class="new-products">
	<div class="container">
		<h3><?= lang('new_products') ?></h3>
		<div class="row">
			<div class="col-md-12">
				<div class="carousel slide multi-item-carousel home-carousel" id="theCarousel">
					<div class="carousel-inner">
						<?php
						$i = 0;
						foreach ($newProducts as $product) {
						?>
						<div class="item <?= $i == 0 ? 'active' : '' ?>">
							<div class="col-xs-12 col-sm-4">
								<a href="<?= LANG_URL . '/' . $product['url'] ?>">
									<img src="<?= base_url('attachments/shop_images/' . $product['image']) ?>"
										class="img-responsive">
									<h1><?= $product['title'] ?></h1>
									<span class="price"><?= $product['price'] ?> &#8377;</span>
								</a>
								<a class="add-to-cart" href="<?= LANG_URL . '/' . $product['url'] ?>">
									<?= lang('add_to_cart') ?>
								</a>
							</div>
						</div>
						<?php
							$i++;
						}
						?>
					</div>
					<a class="left carousel-control" href="#theCarousel" data-slide="prev"><i
							class="glyphicon glyphicon-chevron-left"></i></a>
					<a class="right carousel-control" href="#theCarousel" data-slide="next"><i
							class="glyphicon glyphicon-chevron-right"></i></a>
				</div>
			</div>
		</div>
	</div>
</div> -->
<div class="blog-posts">
	<div class="container">
		<h3><?= lang('blog_posts') ?></h3>
		<div class="row">
			<div class="col-md-12">
				<div class="carousel slide multi-item-carousel" id="theCarousel1">
					<div class="carousel-inner">
						<?php
						$i = 0;
						foreach ($lastBlogs as $post) {
						?>
						<div class="item <?= $i == 0 ? 'active' : '' ?>">
							<div class="col-xs-12 col-sm-4">
								<a href="<?= LANG_URL . '/blog/' . $post['url'] ?>">
									<img src="<?= base_url('attachments/blog_images/' . $post['image']) ?>"
										class="img-responsive">
									<span class="time"><?= date('M d, Y', $post['time']) ?></span>
									<h1><?= character_limiter($post['title'], 85) ?></h1>
									<p class="description">
										<?= character_limiter(strip_tags($post['description']), 300) ?></p>
									<span class="read-more"><?= lang('read_more') ?> <i class="fa fa-long-arrow-right"
											aria-hidden="true"></i></span>
								</a>
							</div>
						</div>
						<?php
							$i++;
						}
						?>
					</div>
					<a class="left carousel-control" href="#theCarousel1" data-slide="prev"><i
							class="glyphicon glyphicon-chevron-left"></i></a>
					<a class="right carousel-control" href="#theCarousel1" data-slide="next"><i
							class="glyphicon glyphicon-chevron-right"></i></a>
				</div>
			</div>
		</div>
	</div>
</div>