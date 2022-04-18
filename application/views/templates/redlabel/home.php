

<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
if(isset($_SESSION['logged_user'])){
$data= $this->Public_model->getUserProfileInfo($_SESSION['logged_user']); }
?>

<div class="bottom mainmenu">
                        <nav>
                            <div class="navbar-header">
                                <span class="visible-xs menu-text-xs"><?= lang('menu') ?></span>
                                <ul class="nav navbar-nav">
                                    <li<?= uri_string() == 'shop' || uri_string() == MY_LANGUAGE_ABBR . '/shop' ? ' class="active"' : '' ?>><a >yyy<?= lang('shop') ?> <i class="fa fa-chevron-down"></i></a>
                                        <div class="megamenu">
                                            <?php

                                            function loop_tree_nav1($nav_categories, $is_recursion = false)
                                            {
                                                if ($is_recursion == false) {
                                                    ?>
                                                    <span>
                                                        <?php
                                                    }
                                                    foreach ($nav_categories as $nav_category) {
                                                        $children = false;
                                                        if (isset($nav_category['children']) && !empty($nav_category['children'])) {
                                                            $children = true;
                                                        }
                                                        ?> 
                                                        <a href="javascript:void(0);" data-categorie-id="<?= $nav_category['id'] ?>" class="go-category <?= $children == true ? 'mega-title' : '' ?>"><b class="text-primary" style="color:black;"><?= $nav_category['name'] ?></b></a>
                                                        <?php
                                                        if ($children === true) {
                                                            loop_tree_nav($nav_category['children'], true);
                                                        }
                                                    }
                                                    if ($is_recursion == false) {
                                                        ?>
                                                    </span>
                                                    <?php
                                                }
                                            }

                                            loop_tree_nav1($nav_categories);
                                            ?>
                                        </div>
                                    </li>
                                    <li<?= uri_string() == 'shop' || uri_string() == MY_LANGUAGE_ABBR . '/shop' ? ' class="active"' : '' ?>><a href="<?= LANG_URL . '/shop' ?>">Brands<i class="fa fa-chevron-down"></i></a>
                                        <div class="megamenu">
                                            <?php
                                                    foreach ($brands as $brand) { ?>
                                                     <span>   <a href="javascript:void(0);" data-brand-id="<?= $brand['id'] ?>" class="brand<?= isset($_GET['brand_id']) && $_GET['brand_id'] == $brand['id'] ?  'mega-title' : '' ?>"><b style="color:green;"><?= $brand['name'] ?></b></a> 
                                                    </span>
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                    </li>
                                </ul>

                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar">hi there</span>
                                    <span class="icon-bar">avi</span>
                                    <span class="icon-bar">a</span>
                                </button>
                            </div>
                            <div id="navbar" class="collapse navbar-collapse">
                                <ul class="nav navbar-nav">
                                    <li<?= uri_string() == 'shop' || uri_string() == MY_LANGUAGE_ABBR . '/shop' ? ' class="active"' : '' ?>><a href="<?= LANG_URL . '/shop' ?>"><?= lang('shop') ?> <i class="fa fa-chevron-down"></i></a>
                                        <div class="megamenu">
                                            <?php

                                            function loop_tree_nav($nav_categories, $is_recursion = false)
                                            {
                                                if ($is_recursion == false) {
                                                    ?>
                                                    <span>
                                                        <?php
                                                    }
                                                    foreach ($nav_categories as $nav_category) {
                                                        $children = false;
                                                        if (isset($nav_category['children']) && !empty($nav_category['children'])) {
                                                            $children = true;
                                                        }
                                                        ?> 
                                                        <a href="javascript:void(0);" data-categorie-id="<?= $nav_category['id'] ?>" class="go-category <?= $children == true ? 'mega-title' : '' ?>"><b class="text-primary" style="color:black;"><?= $nav_category['name'] ?></b></a>
                                                        <?php
                                                        if ($children === true) {
                                                            loop_tree_nav($nav_category['children'], true);
                                                        }
                                                    }
                                                    if ($is_recursion == false) {
                                                        ?>
                                                    </span>
                                                    <?php
                                                }
                                            }

                                            loop_tree_nav($nav_categories);
                                            ?>
                                        </div>
                                    </li>
                                    <li<?= uri_string() == 'shop' || uri_string() == MY_LANGUAGE_ABBR . '/shop' ? ' class="active"' : '' ?>><a href="<?= LANG_URL . '/shop' ?>">Brands<i class="fa fa-chevron-down"></i></a>
                                        <div class="megamenu">
                                            <?php
                                                    foreach ($brands as $brand) { ?>
                                                     <span>   <a href="javascript:void(0);" data-brand-id="<?= $brand['id'] ?>" class="brand<?= isset($_GET['brand_id']) && $_GET['brand_id'] == $brand['id'] ?  'mega-title' : '' ?>"><b style="color:green;"><?= $brand['name'] ?></b></a> 
                                                    </span>
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        </nav>
                    </div> 


               
<?php 

if (count($sliderProducts) > 0) { 
    if (!isset($_GET['search_in_title'])){
    
    ?>
    <div id="home-slider" class="carousel slide" data-ride="carousel" >
       
        <div class="carousel-inner" role="listbox" >
            <?php
            $i = 0;
            foreach ($sliderProducts as $article) {
                ?>

                

                        <?php 
                             $avi=strtolower(trim($article['title']));
                            if (strpos($avi,"dudhai") !==false ||  strpos($avi,"दुधाई")!==false ){
                                        

                              ?>  
                            <div class="item <?= $i == 0 ? 'active' : '' ?>" style="background-image: url('<?= base_url('attachments/shop_images/' . $article['image']) ?>');width:100%;height:30%; " onclick="location.href='<?=base_url()?>Home/Showsubscription';">
            
                                                           
                                  <?php  } else { ?>
                                   
                             <div class="item <?= $i == 0 ? 'active' : '' ?>" style="background-image: url('<?= base_url('attachments/shop_images/' . $article['image']) ?>');width:100%;height:30%; " onclick="location.href='<?= LANG_URL . '/' . $article['url'] ?>';">         
                             

                                  <?php }?>
                    <div class="container1" style=" background: rgba(255, 255, 240, 0.1);backdrop-filter: blur(4px);" >
                        <div class="row" >
                            <div class="centered" >
                                <h3>
                                    <?php $avi=strtolower(trim($article['title']));
                                     if (strpos($avi,"dudhai") !==false ||  strpos($avi,"दुधाई")!==false ){
                                        

                              ?>  <a href="<?=base_url()?>Home/Showsubscription" >
                                <?= character_limiter($article['title'], 100) ?>
                                </a>
                                  <?php  } else { ?>
                                      <a href="<?= LANG_URL . '/' . $article['url'] ?>">
                                      &nbsp&nbsp<?= character_limiter($article['title'], 100) ?>
                                      </a>

                                  <?php }?>
                                    
                                </h3>
                                <?php if(strlen(strip_tags($article['basic_description']))>250){

                                    ?>

                                        <div class="description">
                                    
                                        &nbsp&nbsp<?= character_limiter(strip_tags($article['basic_description']), 250) ?>
                                 </div>
                                <?php } else { ?>

                                    <div class="description">
                                    
                                   <?= $article['basic_description']?>
                                </div>

                                    
                             <?php   }  ?>

                          
                                    

                      
                            </div>
                           
                        </div>
                    </div>
                </div>
                <?php
                $i++;
            }
            ?>
        </div>
        <a class="left carousel-control" href="#home-slider" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
        <a class="right carousel-control" href="#home-slider" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
<?php }} ?>



<section class="features-section "style="margin-top:10px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 p-0 feature">
                    <div class="feature-inner">
                        <div class="feature-icon">
                            <img src="<?= base_url('attachments/icons/1.png') ?>" alt="#">
                        </div>
                        <h4>Fast Secure Payments</h4>
                    </div>
                </div>
                <div class="col-md-4 p-0 feature">
                    <div class="feature-inner">
                        <div class="feature-icon">
                            <img src="<?= base_url('attachments/icons/2.png') ?>" alt="#">
                        </div>
                        <h4 class="text-white">Premium Products</h4>
                    </div>
                </div>
                <div class="col-md-4 p-0 feature">
                    <div class="feature-inner">
                        <div class="feature-icon">
                            <img src="<?= base_url('attachments/icons/3.png') ?>" alt="#">
                        </div>
                        <h4>Affordable Delivery</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
<div class="container-fluid" id="home-page" data-aos="fade-down">
    <div class="row">
        <div class="col-md-3">
            <div class="hidden">
                <div class="title">
                    <span><?= lang('categories') ?></span>
                    <?php if (isset($_GET['category']) && $_GET['category'] != '') {  ?> 
                        <a href="javascript:void(0);" class="clear-filter" data-type-clear="category" data-toggle="tooltip" data-placement="right" title="<?= lang('clear_the_filter') ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
                    <?php } ?>
                </div>
                <a href="javascript:void(0)" id="show-xs-nav" class="visible-xs visible-sm">
                    <span class="show-sp"><?= lang('showXsNav') ?><i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i></span>
                    <span class="hidde-sp"><?= lang('hideXsNav') ?><i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i></span>
                </a>
                <div id="nav-categories">
                    <?php

                    function loop_tree($pages, $is_recursion = false)
                    {
                        ?>
                        <ul class="<?= $is_recursion === true ? 'children' : 'parent' ?>">
                            <?php
                            foreach ($pages as $page) {
                                $children = false;
                                if (isset($page['children']) && !empty($page['children'])) {
                                    $children = true;
                                }
                                ?>
                                <li upper-links dropdown>
                                    <?php if ($children === true) {
                                        ?>
                                        <a class="links" href="">
                                        <i class="fa fa-chevron-right" aria-hidden="true">1</i> <?= $page['name'] ?>
                                    </a>
                                    <?php } else { ?>
                                        <li class="profile-li">
                                    <a  href="javascript:void(0);" data-categorie-id="<?= $page['id'] ?>" class="go-category left-side <?= isset($_GET['category']) && $_GET['category'] == $page['id'] ? 'selected' : '' ?> "> 
      
                                </li>
                                        <i class="fa fa-tags" aria-hidden="true">hi there</i>
                                    <a href="javascript:void(0);" data-categorie-id="<?= $page['id'] ?>" class="go-category left-side <?= isset($_GET['category']) && $_GET['category'] == $page['id'] ? 'selected' : '' ?>">
                                        <?= $page['name'] ?>
                                    </a>
                                    <?php } ?>

                                    <?php
                                    if ($children === true) {
                                        loop_tree($page['children'], true);
                                    } else {
                                        ?>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                        <?php
                        if ($is_recursion === true) {
                            ?>
                            </li>
                            <?php
                        }
                    }

                    loop_tree($home_categories);
                    ?>
                </div>
            </div>
            <?php if ($showBrands == 1) {  if (!isset($_GET['search_in_title'])){?>
                <div class="hidden">
                    <div class="title">
                        <span><?= lang('brands') ?></span>
                        <?=$load ::getMax($bestSellers)?>
                        <?=$load ::getMin($bestSellers)?>
                        <?php if (isset($_GET['brand_id']) && $_GET['brand_id'] != '') { ?>
                            <a href="javascript:void(0);" class="clear-filter" data-type-clear="brand_id" data-toggle="tooltip" data-placement="right" title="<?= lang('clear_the_filter') ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
                        <?php } ?>
                    </div>
                    <ul>
                        <?php foreach ($brands as $brand) { ?>
                            <li>
                                <i class="glyphicon glyphicon-leaf" aria-hidden="true"></i> <a href="javascript:void(0);" data-brand-id="<?= $brand['id'] ?>" class="brand <?= isset($_GET['brand_id']) && $_GET['brand_id'] == $brand['id'] ? 'selected' : '' ?>"><?= $brand['name'] ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } } ?>
        </div>
        <div class="container-fluid eqHeight " id="products-side">
            <div class="alone title" style="margin-top:1%;">
                <span><?= lang('best_sellers') ?></span>
            </div>
            <div class="product-sort gradient-color">
           <!-- <div class="product-sort gradient-color"> -->
                <div class="hidden">
                    <div class="ord col-sm-4">
                        <div class="form-group">
                            <select class="selectpicker order form-control" data-order-to="order_new">
                                <option <?= isset($_GET['order_new']) && $_GET['order_new'] == "desc" ? 'selected' : '' ?> <?= !isset($_GET['order_new']) || $_GET['order_new'] == "" ? 'selected' : '' ?> value="desc"><?= lang('new') ?> </option>
                                <option <?= isset($_GET['order_new']) && $_GET['order_new'] == "asc" ? 'selected' : '' ?> value="asc"><?= lang('old') ?> </option>
                            </select>
                        </div>
                    </div>
                    <div class="ord col-sm-4">
                        <div class="form-group">
                            <select class="selectpicker order form-control" data-order-to="order_price" title="<?= lang('price_title') ?>..">
                                <option label="<?= lang('not_selected') ?>"></option>
                                <option <?= isset($_GET['order_price']) && $_GET['order_price'] == "asc" ? 'selected' : '' ?> value="asc"><?= lang('price_low') ?> </option>
                                <option <?= isset($_GET['order_price']) && $_GET['order_price'] == "desc" ? 'selected' : '' ?> value="desc"><?= lang('price_high') ?> </option>
                            </select>
                        </div>
                    </div>
                    <div class="ord col-sm-4">
                        <div class="form-group">
                            <select class="selectpicker order form-control" data-order-to="order_procurement" title="<?= lang('procurement_title') ?>..">
                                <option label="<?= lang('not_selected') ?>"></option>
                                <option <?= isset($_GET['order_procurement']) && $_GET['order_procurement'] == "desc" ? 'selected' : '' ?> value="desc"><?= lang('procurement_desc') ?> </option>
                                <option <?= isset($_GET['order_procurement']) && $_GET['order_procurement'] == "asc" ? 'selected' : '' ?> value="asc"><?= lang('procurement_asc') ?> </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div style="">
            <?php
            if (!empty($products)) {
                $load::getProducts($products, 'col-lg-12 col-md-3', false);
            } else {
                ?>
                <script>
                    $(document).ready(function () {
                        ShowNotificator('alert-info', '<?= lang('no_results') ?>');
                    });
                </script>
                <?php
            }
            ?>
        </div>
        </div>



    </div>



    <section class=" container-fluid banner-section" style="margin-top:20px;">
        <div class="container d-flex justify-content-between">
            <div class="banner set-bg col-6" style="background-image:url('<?= base_url('attachments/lang_flags/'.MY_LANGUAGE_ABBR.'.png') ?>') ;border-radius:20px;" >
                <div class="tag-new">NEW</div>
                <span>New Recipes</span>
                <h2>SWEET PASTRIES</h2>
                <a class="btn btn-light  active" style=" background-color: white;color: black;border-radius:10px;border: 2px solid #4CAF50;border-image:conic-gradient(red,pink,magenta) 1; " href="<?= LANG_URL . '/logout' ?>">SHOP NOW</a>
            </div>
            <div class="banner set-bg col-6 ml-2"  style="background-image:url('<?= base_url('attachments/lang_flags/'.MY_LANGUAGE_ABBR.'.png') ?>') ;border-radius:20px;">
                <div class="tag-new">NEW</div>
                <span>New Recipes</span>
                <h2>SWEET PASTRIES</h2>
                <a class="btn btn-light  active" style=" background-color: white;color: black;border-radius:10px;border: 2px solid #4CAF50;border-image:conic-gradient(red,pink,magenta) 1; " href="<?= LANG_URL . '/logout' ?>">SHOP NOW</a>
            </div>
        </div>
    </section>
    

    <div class="col-sm-8 col-md-9 ml-4" style="margin-left:100px;">
            <div class="alone title">
                <span><?= lang('latest_blog') ?></span>
            </div>
            <div class="may">
                <?php
                        $i=0;

                if (!empty($posts)) {

                    foreach ($posts as $post) {
                       if($i<4){
                        ?>
                        <div class="box"style="margin-top:40px;">
                        <span></span>
                            <div class="thumbnail blog-list" >
                                <a href="<?= LANG_URL . '/blog/' . $post['url'] ?>" class="img-container">
                                    <img src="<?= base_url('attachments/blog_images/' . $post['image']) ?>" alt="<?= $post['title'] ?>">
                                </a>
                                <div class="content">
                                    <h2>
                                        <?= character_limiter($post['title'], 85) ?>
                                    </h2>
                                    <small>
                                        <span>
                                            <i class="fa fa-clock-o"></i>
                                            <?= date('M d, y', $post['time']) ?>
                                        </span>
                                    </small>
                                    <p class="description"><?= character_limiter(strip_tags($post['description']), 300) ?></p>

<a class="btn btn-light  active" style=" background-color: white;color: black;border-radius:10px;border: 2px solid #4CAF50;border-image:conic-gradient(red,pink,magenta) 1; " href="<?= LANG_URL . '/blog/' . $post['url'] ?>">  <i class="fa fa-long-arrow-right"></i>
                                        <?= lang('read_mode') ?></a>

                                   
                                    
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                $i++;}
                } else {
                    ?>
                    <div class="alert alert-info"><?= lang('no_posts') ?></div>
                <?php } ?>
            </div>
            <?= $links_pagination ?>
        </div>




    
    <?php 
    if ($links_pagination != '') { ?>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <?= $links_pagination ?>
            </div>
        </div>
    <?php } ?>



</div>
