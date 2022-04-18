<?php
defined('BASEPATH') or exit('No direct script access allowed');


if (count($sliderProducts) > 0) {
?>
   <section class="hero-section">
    <div class="hero-slider owl-carousel">
            <?php
            $i = 0;
            foreach ($sliderProducts as $article) {
                if($i<4)
                {
            ?>




                <div class="hs-item set-bg" data-setbg="<?= base_url('attachments/shop_images/' . $article['image']) ?>">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-7 text-white">
                                <span>New Arrivals</span>
                                <h2>  <?= character_limiter($article['title'], 100) ?></h2>
                                <p> <?= character_limiter(strip_tags($article['basic_description']), 150) ?></p>
                                <a href="#" class="add-to-cart site-btn sb-line">DISCOVER</a>
                                <a href="#" class="site-btn sb-white">ADD TO CART</a>
                            </div>
                        </div>
                        <div class="offer-card text-white">
                            <span>from</span>
                            <h2>$29</h2>
                            <p>SHOP NOW</p>
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
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
                        <span class="fa fa-star" style="font-size:300%;"></span>
						</div>
						<h2>Premium Products</h2>
					</div>
				</div>
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
                        <span class="fa fa-paper-plane" style="font-size:300%;"></span>
						</div>
						<h2>Free & fast Delivery</h2>
					</div>
				</div>
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
                                        <img src="<?= base_url('attachments/shop_images/' . $product['image']) ?>" class="img-responsive">
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
                    <a class="left carousel-control" href="#theCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                    <a class="right carousel-control" href="#theCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
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
                                        <img src="<?= base_url('attachments/blog_images/' . $post['image']) ?>" class="img-responsive">
                                        <span class="time"><?= date('M d, Y', $post['time']) ?></span>
                                        <h1><?= character_limiter($post['title'], 85) ?></h1>
                                        <p class="description"><?= character_limiter(strip_tags($post['description']), 300) ?></p>
                                        <span class="read-more"><?= lang('read_more') ?> <i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                                    </a>
                                </div>
                            </div>
                        <?php
                            $i++;
                        }
                        ?>
                    </div>
                    <a class="left carousel-control" href="#theCarousel1" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                    <a class="right carousel-control" href="#theCarousel1" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>