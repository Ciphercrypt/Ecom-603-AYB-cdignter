<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" href="<?= base_url('assets/bootstrap-select-1.12.1/bootstrap-select.min.css') ?>">

<div class="inner-nav">
    <div class="container">
        <?= lang('home') ?> <span class="active"> > <?= lang('shop') ?></span>
    </div>
</div>






<!-- Page info end -->

<section class="category-section spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 order-2 order-lg-1">
                <div class="filter-widget">
                    <h2 class="fw-title">Categories

                    </h2>

                    <?php if (isset($_GET['category']) && $_GET['category'] != '') { ?>
                    <?= $_GET['category'] ?>
                    <a href="javascript:void(0);" class="clear-filter" data-type-clear="category" data-toggle="tooltip"
                        data-placement="right" title="<?= lang('clear_the_filter') ?>"><i class="fa fa-times"
                            aria-hidden="true"></i></a>
                    <?php } ?>


                    <a href="javascript:void(0)" id="show-xs-nav" class="visible-xs visible-sm">
                        <span class="show-sp">Show Filters<i class="fa fa-filter" aria-hidden="true"></i></span>
                        <span class="hidde-sp">Hide Filter<i class="fa fa-arrow-up" aria-hidden="true"></i></span>
                    </a>
                    <div id="nav-categories">
                        <ul class="category-menu">


                            <?php
                        foreach($home_categories as $pages)
                        {
                            ?>
                            <li><a href="#"><?=$pages['name']?></a>

                                <?php   if(!empty($pages['children'])){ 
                                    ?>

                                <ul class="sub-menu">

                                    <?php foreach($pages['children'] as $childrens)
                            { ?>
                                    <li><a href="#"> <?= $childrens['name'] ?> <span>(2)</span></a></li>
                                    <?php  } ?>


                                </ul>



                                <?php  } 
                    } ?>


                        </ul>

                        <br>




                        <div class="filter-widget">
                            <h2 class="fw-title">Brand</h2>
                            <ul class="category-menu">


                                <li><a href="#">Asos<span>(56)</span></a></li>
                                <li><a href="#">Bershka<span>(36)</span></a></li>
                                <li><a href="#">Missguided<span>(27)</span></a></li>
                                <li><a href="#">Zara<span>(19)</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="category-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 order-2 order-lg-1">
                <div class="filter-widget">
                    <h2 class="fw-title">Categories</h2>

                    <?php if (isset($_GET['category']) && $_GET['category'] != '') { ?>
                    <?= $_GET['category'] ?>
                    <a href="javascript:void(0);" class="clear-filter" data-type-clear="category" data-toggle="tooltip"
                        data-placement="right" title="<?= lang('clear_the_filter') ?>"><i class="fa fa-times"
                            aria-hidden="true"></i></a>
                    <?php } ?>


                    <a href="javascript:void(0)" id="show-xs-nav" class="visible-xs visible-sm">
                        <span class="show-sp">Show Filters<i class="fa fa-filter" aria-hidden="true"></i></span>
                        <span class="hidde-sp">Hide Filter<i class="fa fa-arrow-up" aria-hidden="true"></i></span>
                    </a>



                    <ul class="category-menu">

                        <?php
                        foreach($home_categories as $pages)
                        {
                            ?>
                        <li><a href="#"><?=$pages['name']?></a>

                            <?php   if(!empty($pages['children'])){ 
                                    ?>

                            <ul class="sub-menu">

                                <?php foreach($pages['children'] as $childrens)
                            { ?>
                                <li><a href="#"> <?= $childrens['name'] ?> <span>(2)</span></a></li>
                                <?php  } ?>


                            </ul>




                            <?php  } 
                    } ?>

                    </ul>
                    </li>

                    </ul>
                </div>


                <div class="filter-widget">
                    <h2 class="fw-title">Brand</h2>
                    <ul class="category-menu">


                        <?php
                              foreach ($brands as $brand) {
                            ?>

                        <li><a href="#"><?=$brand['name']?> <span>(2)</span></a></li>

                        <?php    }
                            ?>





                    </ul>
                </div>
            </div>

            <div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
                <div class="row">

                    <div class="d-flex flex-row">
                        <div class="text-muted m-2" id="res">Showing 44 results</div>
                        <div class="ml-auto mr-lg-4">
                            <div id="sorting" class="border rounded p-1 m-1"> <span class="text-muted">Sort by</span>


                            <select 
                                                            data-style="btn-green" data-order-to="order_new">
                                                            <option
                                                                <?= isset($_GET['order_new']) && $_GET['order_new'] == "desc" ? 'selected' : '' ?>
                                                                <?= !isset($_GET['order_new']) || $_GET['order_new'] == "" ? 'selected' : '' ?>
                                                                value="desc"><?= lang('new') ?> </option>
                                                            <option
                                                                <?= isset($_GET['order_new']) && $_GET['order_new'] == "asc" ? 'selected' : '' ?>
                                                                value="asc"><?= lang('old') ?> </option>
                            </select>


                                <select name="sort" id="sort">
                                    <option value="popularity"><b>Popularity</b></option>
                                    <option value="prcie"><b>Price</b></option>
                                    <option value="rating"><b>Rating</b></option>
                                </select> </div>
                        </div>
                    </div>
                    <div class="row">


                        <?php
                if (!empty($products)) {
                foreach ($products as $product) {
                    ?>





                        <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1">
                            <div class="card"> <img class="card-img-top"
                                    src="<?= base_url('attachments/shop_images/' . $product['image']) ?>"
                                    alt="<?= $product['title'] ?>">
                                <div class="card-body">
                                    <h5><b><?= $product['title'] ?></b> </h5>
                                    <div class="d-flex flex-row my-2">
                                        <div class="text-muted"><?= $product['price'] . CURRENCY ?></div>
                                        <div class="ml-auto"> <button class="border rounded bg-white sign"><span
                                                    class="fa fa-plus" id="orange"></span></button> <span
                                                class="px-sm-1">1
                                                loaf</span> <button class="border rounded bg-white sign"><span
                                                    class="fa fa-minus" id="orange"></span></button> </div>
                                    </div> <a class="btn w-100 rounded my-2" data-goto="<?= LANG_URL . '/checkout' ?>"
                                        href="javascript:void(0);" data-id="<?= $product['id'] ?>">Add to cart</a>
                                </div>
                            </div>
                        </div>


                        < <?php
                }
            } else {
                ?> <script>
                            $(document).ready(function () {
                            ShowNotificator('alert-info', '<?= lang('no_results ') ?>');
                            });
                            </script>
                            <?php
            }
            ?> -->







                    </div>



                    <!-- 

                    <div class="text-center w-100 pt-3">
                        <button class="site-btn sb-line sb-dark">LOAD MORE</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Category section -->

                    <!-- 
<div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
    <div class="row">
        <div class="col-lg-4 col-sm-6">
            <div class="product-item">
                <div class="pi-pic">
                    <div class="tag-sale">ON SALE</div>
                    <img src="./img/product/6.jpg" alt="">
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
        <div class="col-lg-4 col-sm-6">
            <div class="product-item">
                <div class="pi-pic">
                    <img src="./img/product/7.jpg" alt="">
                    <div class="pi-links">
                        <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                        <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                    </div>
                </div>
                <div class="pi-text">
                    <h6>$35,00</h6>
                    <p>Flamboyant Pink Top</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="product-item">
                <div class="pi-pic">
                    <img src="./img/product/8.jpg" alt="">
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
        <div class="col-lg-4 col-sm-6">
            <div class="product-item">
                <div class="pi-pic">
                    <img src="./img/product/10.jpg" alt="">
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
        <div class="col-lg-4 col-sm-6">
            <div class="product-item">
                <div class="pi-pic">
                    <img src="./img/product/11.jpg" alt="">
                    <div class="pi-links">
                        <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                        <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                    </div>
                </div>
                <div class="pi-text">
                    <h6>$35,00</h6>
                    <p>Flamboyant Pink Top</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="product-item">
                <div class="pi-pic">
                    <img src="./img/product/12.jpg" alt="">
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
        <div class="col-lg-4 col-sm-6">
            <div class="product-item">
                <div class="pi-pic">
                    <img src="./img/product/5.jpg" alt="">
                    <div class="pi-links">
                        <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                        <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                    </div>
                </div>
                <div class="pi-text">
                    <h6>$35,00</h6>
                    <p>Flamboyant Pink Top</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="product-item">
                <div class="pi-pic">
                    <img src="./img/product/9.jpg" alt="">
                    <div class="pi-links">
                        <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                        <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                    </div>
                </div>
                <div class="pi-text">
                    <h6>$35,00</h6>
                    <p>Flamboyant Pink Top</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="product-item">
                <div class="pi-pic">
                    <img src="./img/product/1.jpg" alt="">
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
        <div class="col-lg-4 col-sm-6">
            <div class="product-item">
                <div class="pi-pic">
                    <div class="tag-new">new</div>
                    <img src="./img/product/2.jpg" alt="">
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
        <div class="col-lg-4 col-sm-6">
            <div class="product-item">
                <div class="pi-pic">
                    <img src="./img/product/3.jpg" alt="">
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
        <div class="col-lg-4 col-sm-6">
            <div class="product-item">
                <div class="pi-pic">
                    <img src="./img/product/4.jpg" alt="">
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
        <div class="text-center w-100 pt-3">
            <button class="site-btn sb-line sb-dark">LOAD MORE</button>
        </div>
    </div>
</div>
</div>
</div>
</section> -->




                    <div class="container" id="shop-page">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="">
                                    <div class="title">
                                        <span><?= lang('categories') ?></span>
                                        <?php if (isset($_GET['category']) && $_GET['category'] != '') { ?>
                                        <a href="javascript:void(0);" class="clear-filter" data-type-clear="category"
                                            data-toggle="tooltip" data-placement="right"
                                            title="<?= lang('clear_the_filter') ?>"><i class="fa fa-times"
                                                aria-hidden="true"></i></a>
                                        <?php } ?>
                                    </div>
                                    <div class="body">
                                        <a href="javascript:void(0)" id="show-xs-nav" class="visible-xs visible-sm">
                                            <span class="show-sp"><?= lang('showXsNav') ?><i
                                                    class="fa fa-arrow-circle-o-down" aria-hidden="true"></i></span>
                                            <span class="hidde-sp"><?= lang('hideXsNav') ?><i
                                                    class="fa fa-arrow-circle-o-up" aria-hidden="true"></i></span>
                                        </a>
                                        <div id="nav-categories">


                                            <section class="category-section spad">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-lg-3 order-2 order-lg-1">
                                                            <div class="filter-widget">
                                                                <h2 class="fw-title">Categories</h2>
                                                                <ul class="category-menu">
                                                                    <li><a href="#">Woman wear</a>
                                                                        <ul class="sub-menu">
                                                                            <li><a href="#">Midi Dresses
                                                                                    <span>(2)</span></a></li>
                                                                            <li><a href="#">Maxi
                                                                                    Dresses<span>(56)</span></a></li>
                                                                            <li><a href="#">Prom
                                                                                    Dresses<span>(36)</span></a></li>
                                                                            <li><a href="#">Little Black Dresses
                                                                                    <span>(27)</span></a></li>
                                                                            <li><a href="#">Mini
                                                                                    Dresses<span>(19)</span></a></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li><a href="#">Man Wear</a>
                                                                        <ul class="sub-menu">
                                                                            <li><a href="#">Midi Dresses
                                                                                    <span>(2)</span></a></li>
                                                                            <li><a href="#">Maxi
                                                                                    Dresses<span>(56)</span></a></li>
                                                                            <li><a href="#">Prom
                                                                                    Dresses<span>(36)</span></a></li>
                                                                        </ul>
                                                                    </li>
                                                                    <li><a href="#">Children</a></li>
                                                                    <li><a href="#">Bags & Purses</a></li>
                                                                    <li><a href="#">Eyewear</a></li>
                                                                    <li><a href="#">Footwear</a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="filter-widget mb-0">
                                                                <h2 class="fw-title">refine by</h2>
                                                                <div class="price-range-wrap">
                                                                    <h4>Price</h4>
                                                                    <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                                                        data-min="10" data-max="270">
                                                                        <div class="ui-slider-range ui-corner-all ui-widget-header"
                                                                            style="left: 0%; width: 100%;"></div>
                                                                        <span tabindex="0"
                                                                            class="ui-slider-handle ui-corner-all ui-state-default"
                                                                            style="left: 0%;">
                                                                        </span>
                                                                        <span tabindex="0"
                                                                            class="ui-slider-handle ui-corner-all ui-state-default"
                                                                            style="left: 100%;">
                                                                        </span>
                                                                    </div>
                                                                    <div class="range-slider">
                                                                        <div class="price-input">
                                                                            <input type="text" id="minamount">
                                                                            <input type="text" id="maxamount">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="filter-widget mb-0">
                                                                <h2 class="fw-title">color by</h2>
                                                                <div class="fw-color-choose">
                                                                    <div class="cs-item">
                                                                        <input type="radio" name="cs" id="gray-color">
                                                                        <label class="cs-gray" for="gray-color">
                                                                            <span>(3)</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="cs-item">
                                                                        <input type="radio" name="cs" id="orange-color">
                                                                        <label class="cs-orange" for="orange-color">
                                                                            <span>(25)</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="cs-item">
                                                                        <input type="radio" name="cs" id="yollow-color">
                                                                        <label class="cs-yollow" for="yollow-color">
                                                                            <span>(112)</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="cs-item">
                                                                        <input type="radio" name="cs" id="green-color">
                                                                        <label class="cs-green" for="green-color">
                                                                            <span>(75)</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="cs-item">
                                                                        <input type="radio" name="cs" id="purple-color">
                                                                        <label class="cs-purple" for="purple-color">
                                                                            <span>(9)</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="cs-item">
                                                                        <input type="radio" name="cs" id="blue-color"
                                                                            checked="">
                                                                        <label class="cs-blue" for="blue-color">
                                                                            <span>(29)</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="filter-widget mb-0">
                                                                <h2 class="fw-title">Size</h2>
                                                                <div class="fw-size-choose">
                                                                    <div class="sc-item">
                                                                        <input type="radio" name="sc" id="xs-size">
                                                                        <label for="xs-size">XS</label>
                                                                    </div>
                                                                    <div class="sc-item">
                                                                        <input type="radio" name="sc" id="s-size">
                                                                        <label for="s-size">S</label>
                                                                    </div>
                                                                    <div class="sc-item">
                                                                        <input type="radio" name="sc" id="m-size"
                                                                            checked="">
                                                                        <label for="m-size">M</label>
                                                                    </div>
                                                                    <div class="sc-item">
                                                                        <input type="radio" name="sc" id="l-size">
                                                                        <label for="l-size">L</label>
                                                                    </div>
                                                                    <div class="sc-item">
                                                                        <input type="radio" name="sc" id="xl-size">
                                                                        <label for="xl-size">XL</label>
                                                                    </div>
                                                                    <div class="sc-item">
                                                                        <input type="radio" name="sc" id="xxl-size">
                                                                        <label for="xxl-size">XXL</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="filter-widget">
                                                                <h2 class="fw-title">Brand</h2>
                                                                <ul class="category-menu">
                                                                    <li><a href="#">Abercrombie & Fitch
                                                                            <span>(2)</span></a></li>
                                                                    <li><a href="#">Asos<span>(56)</span></a></li>
                                                                    <li><a href="#">Bershka<span>(36)</span></a></li>
                                                                    <li><a href="#">Missguided<span>(27)</span></a></li>
                                                                    <li><a href="#">Zara<span>(19)</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>


                                                        <?php

                        function loop_tree($pages, $is_recursion = false)
                        {
                            ?>
                                                        <ul
                                                            class="<?= $is_recursion === true ? 'children' : 'parent' ?>">
                                                            <?php
                                foreach ($pages as $page) {
                                    $children = false;
                                    if (isset($page['children']) && !empty($page['children'])) {
                                        $children = true;
                                    }
                                    ?>
                                                            <li>
                                                                <?php if ($children === true) {
                                            ?>
                                                                <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                                                <?php } else { ?>
                                                                <i class="fa fa-circle-o" aria-hidden="true"></i>
                                                                <?php } ?>
                                                                <a href="javascript:void(0);"
                                                                    data-categorie-id="<?= $page['id'] ?>"
                                                                    class="go-category left-side <?= isset($_GET['category']) && $_GET['category'] == $page['id'] ? 'selected' : '' ?>">
                                                                    <?= $page['name'] ?>
                                                                </a>
                                                                <?php
                                        if ($children === true) {
                                            print_r($page['children']);
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
                                        </div>
                                        <?php if ($showBrands == 1) { ?>
                                        <div class="filter-sidebar">
                                            <div class="title">
                                                <span><?= lang('brands') ?></span>
                                                <?php if (isset($_GET['brand_id']) && $_GET['brand_id'] != '') { ?>
                                                <a href="javascript:void(0);" class="clear-filter"
                                                    data-type-clear="brand_id" data-toggle="tooltip"
                                                    data-placement="right" title="<?= lang('clear_the_filter') ?>"><i
                                                        class="fa fa-times" aria-hidden="true"></i></a>
                                                <?php } ?>
                                            </div>
                                            <ul>
                                                <?php foreach ($brands as $brand) { ?>
                                                <li>
                                                    <i class="fa fa-chevron-right" aria-hidden="true"></i> <a
                                                        href="javascript:void(0);" data-brand-id="<?= $brand['id'] ?>"
                                                        class="brand <?= isset($_GET['brand_id']) && $_GET['brand_id'] == $brand['id'] ? 'selected' : '' ?>"><?= $brand['name'] ?></a>
                                                </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                        <?php } if ($showOutOfStock == 1) { ?>
                                        <div class="filter-sidebar">
                                            <div class="title">
                                                <span><?= lang('store') ?></span>
                                                <?php if (isset($_GET['in_stock']) && $_GET['in_stock'] != '') { ?>
                                                <a href="javascript:void(0);" class="clear-filter"
                                                    data-type-clear="in_stock" data-toggle="tooltip"
                                                    data-placement="right" title="<?= lang('clear_the_filter') ?>"><i
                                                        class="fa fa-times" aria-hidden="true"></i></a>
                                                <?php } ?>
                                            </div>
                                            <ul>
                                                <li>
                                                    <a href="javascript:void(0);" data-in-stock="1"
                                                        class="in-stock <?= isset($_GET['in_stock']) && $_GET['in_stock'] == '1' ? 'selected' : '' ?>"><?= lang('in_stock') ?>
                                                        (<?= $countQuantities['in_stock'] ?>)</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" data-in-stock="0"
                                                        class="in-stock <?= isset($_GET['in_stock']) && $_GET['in_stock'] == '0' ? 'selected' : '' ?>"><?= lang('out_of_stock') ?>
                                                        (<?= $countQuantities['out_of_stock'] ?>)</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <?php } if ($shippingOrder != 0 && $shippingOrder != null) { ?>
                                        <div class="filter-sidebar">
                                            <div class="title">
                                                <span><?= lang('freeShippingHeader') ?></span>
                                            </div>
                                            <div class="oaerror info">
                                                <strong><?= lang('promo') ?></strong> -
                                                <?= str_replace(array('%price%', '%currency%'), array($shippingOrder, CURRENCY), lang('freeShipping')) ?>!
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>

                                    <div class="col-md-9 eqHeight" id="products-side">
                                        <h1><?= lang('products') ?></h1>
                                        <div class="product-sort gradient-color">
                                            <div class="row">
                                                <div class="ord col-sm-4">
                                                    <div class="form-group">
                                                        <select class="selectpicker order form-control"
                                                            data-style="btn-green" data-order-to="order_new">
                                                            <option
                                                                <?= isset($_GET['order_new']) && $_GET['order_new'] == "desc" ? 'selected' : '' ?>
                                                                <?= !isset($_GET['order_new']) || $_GET['order_new'] == "" ? 'selected' : '' ?>
                                                                value="desc"><?= lang('new') ?> </option>
                                                            <option
                                                                <?= isset($_GET['order_new']) && $_GET['order_new'] == "asc" ? 'selected' : '' ?>
                                                                value="asc"><?= lang('old') ?> </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="ord col-sm-4">
                                                    <div class="form-group">
                                                        <select class="selectpicker order form-control"
                                                            data-style="btn-green" data-order-to="order_price"
                                                            title="<?= lang('price_title') ?>..">
                                                            <option label="<?= lang('not_selected') ?>"></option>
                                                            <option
                                                                <?= isset($_GET['order_price']) && $_GET['order_price'] == "asc" ? 'selected' : '' ?>
                                                                value="asc"><?= lang('price_low') ?> </option>
                                                            <option
                                                                <?= isset($_GET['order_price']) && $_GET['order_price'] == "desc" ? 'selected' : '' ?>
                                                                value="desc"><?= lang('price_high') ?> </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="ord col-sm-4">
                                                    <div class="form-group">
                                                        <select class="selectpicker order form-control"
                                                            data-style="btn-green" data-order-to="order_procurement"
                                                            title="<?= lang('procurement_title') ?>..">
                                                            <option label="<?= lang('not_selected') ?>"></option>
                                                            <option
                                                                <?= isset($_GET['order_procurement']) && $_GET['order_procurement'] == "desc" ? 'selected' : '' ?>
                                                                value="desc"><?= lang('procurement_desc') ?> </option>
                                                            <option
                                                                <?= isset($_GET['order_procurement']) && $_GET['order_procurement'] == "asc" ? 'selected' : '' ?>
                                                                value="asc"><?= lang('procurement_asc') ?> </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
            if (!empty($products)) {
                foreach ($products as $product) {
                    ?>


                                        <div class="col-lg-3 col-sm-6">
                                            <div class="product-item">
                                                <div class="pi-pic">
                                                    <img src="<?= base_url('attachments/shop_images/' . $product['image']) ?>"
                                                        alt="<?= $product['title'] ?>">
                                                    <div class="pi-links">
                                                        <a data-goto="<?= LANG_URL . '/checkout' ?>"
                                                            href="javascript:void(0);" data-id="<?= $product['id'] ?>"
                                                            class="add-card"><i
                                                                class="fa fa-shopping-cart"></i><span>ADD TO
                                                                CART</span></a>
                                                        <a href="#" class="wishlist-btn"><i class="fa fa-heart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="pi-text">
                                                    <h6><?= $product['price'] . CURRENCY ?></h6>
                                                    <p><?= $product['title'] ?></p>
                                                </div>
                                            </div>
                                        </div>



                                        <!-- <div class="col-sm-6 col-md-4 product-inner">
                        <a href="<?= LANG_URL . '/' . $product['url'] ?>">
                            <img src="<?= base_url('attachments/shop_images/' . $product['image']) ?>" alt=""
                                class="img-responsive">
                        </a>
                        <h3><?= $product['title'] ?></h3>
                        <span class="price"><?= $product['price'] . CURRENCY ?></span>
                        <a class="add-to-cart" data-goto="<?= LANG_URL . '/checkout' ?>" href="javascript:void(0);"
                            data-id="<?= $product['id'] ?>">
                            <?= lang('add_to_cart') ?>
                        </a>
                    </div> -->
                                        <?php
                }
            } else {
                ?>
                                        <script>
                                            $(document).ready(function () {
                                                ShowNotificator('alert-info', '<?= lang('
                                                    no_results ') ?>');
                                            });
                                        </script>
                                        <?php
            }
            ?>
                                    </div>
                                </div>
                                <?php if ($links_pagination != '') { ?>
                                <div class="row">
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <?= $links_pagination ?>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>


                            <div class="categories">
                                <div class="title">
                                    <span><?= lang('categories') ?></span>
                                    <?php if (isset($_GET['category']) && $_GET['category'] != '') { ?>
                                    <a href="javascript:void(0);" class="clear-filter" data-type-clear="category"
                                        data-toggle="tooltip" data-placement="right"
                                        title="<?= lang('clear_the_filter') ?>"><i class="fa fa-times"
                                            aria-hidden="true"></i></a>
                                    <?php } ?>
                                </div>
                                <div class="body">
                                    <a href="javascript:void(0)" id="show-xs-nav" class="visible-xs visible-sm">
                                        <span class="show-sp"><?= lang('showXsNav') ?><i
                                                class="fa fa-arrow-circle-o-down" aria-hidden="true"></i></span>
                                        <span class="hidde-sp"><?= lang('hideXsNav') ?><i
                                                class="fa fa-arrow-circle-o-up" aria-hidden="true"></i></span>
                                    </a>
                                    <div id="nav-categories">
                                        <li>
                                            hello
                                        </li>
                                        <li>
                                            hello
                                        </li>
                                        <li>
                                            hello
                                        </li>
                                        <li>
                                            hello
                                        </li>
                                        <li>
                                            hello
                                        </li>
                                        <li>
                                            hello
                                        </li>

                                    </div>
                                </div>



                                <script
                                    src="<?= base_url('assets/bootstrap-select-1.12.1/js/bootstrap-select.min.js') ?>">
                                </script>