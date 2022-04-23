<section class="product-section">
	<div class="container">
		<div class="back-link">
			<a href="./category.html"> &lt;&lt; Back to Category</a>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div class="product-pic-zoom">
					<img class="product-big-img" src="<?= base_url('/attachments/shop_images/' . $product['image']) ?>"
						alt="">
				</div>
				<div class="product-thumbs" tabindex="1" style="overflow: hidden; outline: none;">
					<div class="product-thumbs-track">

						<div class="pt active"
							data-imgbigurl="<?= base_url('/attachments/shop_images/' . $product['image']) ?>"><img
								src="<?= base_url('/attachments/shop_images/' . $product['image']) ?>"
								alt="<?= str_replace('"', "'", $product['title']) ?>"></div>


						<?php
            if ($product['folder'] != null) {
                $dir = "attachments/shop_images/" . $product['folder'] . '/';
                ?>

						<?php
                    if (is_dir($dir)) {
                        if ($dh = opendir($dir)) {
                            $i = 1;
                            while (($file = readdir($dh)) !== false) {
                                if (is_file($dir . $file)) {
                                    ?>

						<div class="pt " data-imgbigurl="<?= base_url($dir . $file) ?>"><img
								src="<?= base_url($dir . $file) ?>"
								alt="<?= str_replace('"', "'", $product['title']) ?>"></div>

						<?php
                                    $i++;
                                }
                            }
                            closedir($dh);
                        }
                    }
                    ?>

						<?php
            }
            ?>




						<!-- <div class="pt active"
							data-imgbigurl="http://localhost/ayurbiocin/attachments/shop_images/H12.jpg"><img
								src="http://localhost/ayurbiocin/attachments/shop_images/H12.jpg" alt=""></div>

						<div class="pt"
							data-imgbigurl="https://n.nordstrommedia.com/id/sr3/71765f60-c648-43c4-85bd-778675c636f5.jpeg?crop=pad&pad_color=FFF&format=jpeg&w=780&h=1196">
							<img src="https://n.nordstrommedia.com/id/sr3/71765f60-c648-43c4-85bd-778675c636f5.jpeg?crop=pad&pad_color=FFF&format=jpeg&w=780&h=1196"
								alt=""></div>
						<div class="pt" data-imgbigurl="http://localhost/ayurbiocin/attachments/shop_images/H12.jpg">
							<img src="http://localhost/ayurbiocin/attachments/shop_images/H12.jpg" alt=""></div>
						<div class="pt" data-imgbigurl="http://localhost/ayurbiocin/attachments/shop_images/H12.jpg">
							<img src="http://localhost/ayurbiocin/attachments/shop_images/H12.jpg" alt=""></div> -->
					</div>
				</div>
			</div>
			<div class="col-lg-6 product-details">
				<h2 class="p-title"><?= $product['title'] ?></h2>
				<h3 class="p-price"><?= $product['price'] . CURRENCY ?></h3>
				<?php if( $product['quantity']>=1)
				{
					?>
				<h4 class="p-stock">Available: <span>In Stock</span></h4>

				<?php
				} else{ ?>
				<h4 class="p-stock"> <span>Out of Stock</span></h4>

				<?php	}?>
				<div class="p-rating">
					<i class="fa fa-star-o"></i>
					<i class="fa fa-star-o"></i>
					<i class="fa fa-star-o"></i>
					<i class="fa fa-star-o"></i>
					<i class="fa fa-star-o fa-fade"></i>
				</div>
				<div class="p-review">
					<a href="">3 reviews</a>|<a href="">Add your review</a>
				</div>

				<div class="quantity">
					<p>Quantity</p>
					<div class="pro-qty"><input type="text" value="1"></div>
				</div>


				<?php if ($product['quantity'] > 0) { ?>

				<a href="javascript:void(0);" data-id="<?= $product['id'] ?>" data-goto="<?= LANG_URL . '/checkout' ?>"
					class="site-btn">
					<span class="text-to-bg" class="fa fa-shopping-cart"><?= lang('buy_now') ?></span>
				</a>

				<a href="javascript:void(0);" data-id="<?= $product['id'] ?>"
					data-goto="<?= LANG_URL . '/shopping-cart' ?>" class="site-btn">
					<span class="text-to-bg" class="fa fa-shopping-cart"><?= lang('add_to_cart') ?></span>
				</a>
				<?php } else { ?>
				<div class="alert alert-info"><?= lang('out_of_stock_product') ?></div>
				<?php } ?>


				<div class="quantity">
					<p>Description</p>
				</div>

				<div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
					<div class="panel-body">
						<?= $product['description'] ?>
					</div>
				</div>


				<div id="accordion" class="accordion-area">

					<div class="panel">
						<div class="panel-header" id="headingTwo">
							<button class="panel-link" data-toggle="collapse" data-target="#collapse2"
								aria-expanded="false" aria-controls="collapse2">care details </button>
						</div>
						<div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
							<div class="panel-body">
								<img src="./img/cards.png" alt="">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so
									dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te
									mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
							</div>
						</div>
					</div>
					<div class="panel">
						<div class="panel-header" id="headingThree">
							<button class="panel-link" data-toggle="collapse" data-target="#collapse3"
								aria-expanded="false" aria-controls="collapse3">shipping & Returns</button>
						</div>
						<div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
							<div class="panel-body">
								<h4>7 Days Returns</h4>
								<p>Cash on Delivery Available<br>Home Delivery <span>3 - 4 days</span></p>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so
									dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te
									mpus. Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
							</div>
						</div>
					</div>
				</div>
				<div class="social-sharing">
					<a href=""><i class="fa fa-google-plus"></i></a>
					<a href=""><i class="fa fa-pinterest"></i></a>
					<a href=""><i class="fa fa-facebook"></i></a>
					<a href=""><i class="fa fa-twitter"></i></a>
					<a href=""><i class="fa fa-youtube"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- product section end -->


<!-- RELATED PRODUCTS section -->
<section class="related-product-section">
	<div class="container">
		<div class="section-title">
			<h2>RELATED PRODUCTS</h2>
		</div>
		<div class="product-slider owl-carousel">
			
		<?php if (!empty($sameCagegoryProducts)) {
                foreach ($sameCagegoryProducts as $product) {
                    ?>
                   


                    <div class="card"> 
                    <a href="<?= LANG_URL . '/' . $product['url'] ?>">
                    <img class="card-img-top" src="<?= base_url('attachments/shop_images/' . $product['image']) ?>" alt="<?= $product['title'] ?>" class="img-responsive">  </a>
                    <div class="card-body">
                     <a href="<?= LANG_URL . '/' . $product['url'] ?>">   <h5><b><?= $product['title'] ?></b> </h5> </a>
                        <div class="d-flex flex-row my-2">
                            <div class="text-muted"><?= $product['price'] . CURRENCY ?></div>
                            <div class="ml-auto"> <button class="border rounded bg-white sign"><span class="fa fa-plus" id="orange"></span></button> <span class="px-sm-1">1 pc</span> <button class="border rounded bg-white sign"><span class="fa fa-minus" id="orange"></span></button> </div>
                        </div> <button class="btn w-100 rounded my-2" data-goto="<?= LANG_URL . '/checkout' ?>" href="javascript:void(0);" data-id="<?= $product['id'] ?>" >Add to cart</button>
                    </div>
                </div>

                   
               


                    <?php
                }
            } else {
				?>
				<div class="alert alert-info"><?= lang('no_same_category_products') ?></div>
				<?php
			}
			?> 
			
		</div>
	</div>
</section>
<!-- RELATED PRODUCTS section end -->


<!-- Footer section -->
<section class="footer-section">
	<div class="container">
		<div class="footer-logo text-center">
			<a href="index.html"><img src="./img/logo-light.png" alt=""></a>
		</div>
		<div class="row">
			<div class="col-lg-3 col-sm-6">
				<div class="footer-widget about-widget">
					<h2>About</h2>
					<p>Donec vitae purus nunc. Morbi faucibus erat sit amet congue mattis. Nullam frin-gilla
						faucibus urna, id dapibus erat iaculis ut. Integer ac sem.</p>
					<img src="img/cards.png" alt="">
				</div>
			</div>
			<div class="col-lg-3 col-sm-6">
				<div class="footer-widget about-widget">
					<h2>Questions</h2>
					<ul>
						<li><a href="">About Us</a></li>
						<li><a href="">Track Orders</a></li>
						<li><a href="">Returns</a></li>
						<li><a href="">Jobs</a></li>
						<li><a href="">Shipping</a></li>
						<li><a href="">Blog</a></li>
					</ul>
					<ul>
						<li><a href="">Partners</a></li>
						<li><a href="">Bloggers</a></li>
						<li><a href="">Support</a></li>
						<li><a href="">Terms of Use</a></li>
						<li><a href="">Press</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6">
				<div class="footer-widget about-widget">
					<h2>Questions</h2>
					<div class="fw-latest-post-widget">
						<div class="lp-item">
							<div class="lp-thumb set-bg" data-setbg="img/blog-thumbs/1.jpg"></div>
							<div class="lp-content">
								<h6>what shoes to wear</h6>
								<span>Oct 21, 2018</span>
								<a href="#" class="readmore">Read More</a>
							</div>
						</div>
						<div class="lp-item">
							<div class="lp-thumb set-bg" data-setbg="img/blog-thumbs/2.jpg"></div>
							<div class="lp-content">
								<h6>trends this year</h6>
								<span>Oct 21, 2018</span>
								<a href="#" class="readmore">Read More</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6">
				<div class="footer-widget contact-widget">
					<h2>Questions</h2>
					<div class="con-info">
						<span>C.</span>
						<p>Your Company Ltd </p>
					</div>
					<div class="con-info">
						<span>B.</span>
						<p>1481 Creekside Lane Avila Beach, CA 93424, P.O. BOX 68 </p>
					</div>
					<div class="con-info">
						<span>T.</span>
						<p>+53 345 7953 32453</p>
					</div>
					<div class="con-info">
						<span>E.</span>
						<p>office@youremail.com</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="social-links-warp">
		<div class="container">
			<div class="social-links">
				<a href="" class="instagram"><i class="fa fa-instagram"></i><span>instagram</span></a>
				<a href="" class="google-plus"><i class="fa fa-google-plus"></i><span>g+plus</span></a>
				<a href="" class="pinterest"><i class="fa fa-pinterest"></i><span>pinterest</span></a>
				<a href="" class="facebook"><i class="fa fa-facebook"></i><span>facebook</span></a>
				<a href="" class="twitter"><i class="fa fa-twitter"></i><span>twitter</span></a>
				<a href="" class="youtube"><i class="fa fa-youtube"></i><span>youtube</span></a>
				<a href="" class="tumblr"><i class="fa fa-tumblr-square"></i><span>tumblr</span></a>
			</div>

			<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
			<p class="text-white text-center mt-5">Copyright &copy;<script>
					document.write(new Date().getFullYear());
				</script> All rights reserved | This template is made with <i class="fa fa-heart-o"
					aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
			<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

		</div>
	</div>
</section>