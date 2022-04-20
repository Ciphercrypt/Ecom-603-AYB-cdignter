<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" href="<?= base_url('assets/bootstrap-select-1.12.1/bootstrap-select.min.css') ?>">

<div class="inner-nav">
    <div class="container">
        <?= lang('home') ?> <span class="active"> > <?= lang('shop') ?></span>
    </div>
</div>

<!-- 
<div class="col-sm-7">
    <div class="row">
        <div class="col-sm-5">
            <div class="bag-info">
                <img src="<?= base_url('template/imgs/white-bag.png') ?>" alt="Search">
                <a class="my-basket dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    <?= lang('your_basket') ?>
                    <span class="sum-scope">
                        (<span class="sumOfItems"><?= $cartItems['array'] == 0 ? lang('empty') : $sumOfItems ?></span>)
                    </span>
                    <i class="fa fa-angle-double-down" aria-hidden="true"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-right dropdown-cart" role="menu">
                    <?= $load::getCartItems($cartItems) ?>
                </ul>
            </div>
        </div>
        <div class="col-sm-7">
            <form method="GET" id="bigger-search" class="search" action="<?= LANG_URL ?>">
                <div class="input-group">
                    <input type="hidden" id="search_in_title"
                        value="<?= isset($_GET['search_in_title']) ? htmlspecialchars($_GET['search_in_title']) : '' ?>"
                        class="hidden" placeholder="<?= lang('search_for') ?>...">
                    <span class="input-group-btn">
                      
                    </span>
                    <div class="dropdown">
                        <a class="advanced-search-btn dropdown-toggle" href="javascript:void(0);" id="dropdownsearch"
                            data-toggle="dropdown">
                            <i class="fa fa-2x fa-caret-down cloth-color" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right advanced-search-menu" role="menu"
                            aria-labelledby="dropdownsearch">
                            <input type="hidden" name="category"
                                value="<?= isset($_GET['category']) ? htmlspecialchars($_GET['category']) : '' ?>">
                            <input type="hidden" name="in_stock"
                                value="<?= isset($_GET['in_stock']) ? htmlspecialchars($_GET['in_stock']) : '' ?>">
                            <input type="hidden" name="search_in_title"
                                value="<?= isset($_GET['search_in_title']) ? htmlspecialchars($_GET['search_in_title']) : '' ?>">
                            <input type="hidden" name="order_new"
                                value="<?= isset($_GET['order_new']) ? htmlspecialchars($_GET['order_new']) : '' ?>">
                            <input type="hidden" name="order_price"
                                value="<?= isset($_GET['order_price']) ? htmlspecialchars($_GET['order_price']) : '' ?>">
                            <input type="hidden" name="order_procurement"
                                value="<?= isset($_GET['order_procurement']) ? htmlspecialchars($_GET['order_procurement']) : '' ?>">
                            <input type="hidden" name="brand_id"
                                value="<?= isset($_GET['brand_id']) ? htmlspecialchars($_GET['brand_id']) : '' ?>">
                            <div class="form-group">
                                <label for="quantity_more"><?= lang('quantity_more_than') ?></label>
                                <input type="text"
                                    value="<?= isset($_GET['quantity_more']) ? htmlspecialchars($_GET['quantity_more']) : '' ?>"
                                    name="quantity_more" id="quantity_more" placeholder="<?= lang('type_a_number') ?>"
                                    class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="added_after"><?= lang('added_after') ?></label>
                                        <div class="input-group date">
                                            <input type="text"
                                                value="<?= isset($_GET['added_after']) ? htmlspecialchars($_GET['added_after']) : '' ?>"
                                                name="added_after" id="added_after" class="form-control">
                                            <span class="input-group-addon"><i class="fa fa-calendar"
                                                    aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="added_before"><?= lang('added_before') ?></label>
                                        <div class="input-group date">
                                            <input type="text"
                                                value="<?= isset($_GET['added_before']) ? htmlspecialchars($_GET['added_before']) : '' ?>"
                                                name="added_before" id="added_before" class="form-control">
                                            <span class="input-group-addon"><i class="fa fa-calendar"
                                                    aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="search_in_body"><?= lang('search_by_keyword_body') ?></label>
                                <input class="form-control"
                                    value="<?= isset($_GET['search_in_body']) ? htmlspecialchars($_GET['search_in_body']) : '' ?>"
                                    name="search_in_body" id="search_in_body" type="text" />
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="price_from"><?= lang('price_from') ?></label>
                                        <input type="text"
                                            value="<?= isset($_GET['price_from']) ? htmlspecialchars($_GET['price_from']) : '' ?>"
                                            name="price_from" id="price_from" class="form-control"
                                            placeholder="<?= lang('type_a_number') ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="price_to"><?= lang('price_to') ?></label>
                                        <input type="text" name="price_to"
                                            value="<?= isset($_GET['price_to']) ? htmlspecialchars($_GET['price_to']) : '' ?>"
                                            id="price_to" class="form-control"
                                            placeholder="<?= lang('type_a_number') ?>">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-inner-search cloth-bg-color">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                            <a class="btn btn-default" id="clear-form"
                                href="javascript:void(0);"><?= lang('clear_form') ?></a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

       
        <nav class="navbar navbar-expand-sm navbar-light bg-white border-bottom"> <a
                class="navbar-brand ml-2 font-weight-bold" href="#"><span id="burgundy">The</span><span
                    id="orange">Bakeshop</span></a> <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarColor" aria-controls="navbarColor" aria-expanded="false"
                aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse" id="navbarColor">
                <ul class="navbar-nav">
                    <li class="nav-item rounded bg-light search-nav-item"><input type="text" id="search"
                            class="bg-light" placeholder="Search bread, cakes, desserts"><span
                            class="fa fa-search text-muted"></span></li>
                    <li class="nav-item"><a class="nav-link" href="#"><span class="fa fa-user-o"></span><span
                                class="text">Login</span></a> </li>
                    <li class="nav-item "><a class="nav-link" href="#"><span class="fa fa-shopping-cart"></span><span
                                class="text">Cart</span></a> </li>
                </ul>
            </div>
        </nav>
        <div class="filter"> <button class="btn btn-default" type="button" data-toggle="collapse"
                data-target="#mobile-filter" aria-expanded="true" aria-controls="mobile-filter">Filters<span
                    class="fa fa-filter pl-1"></span></button>
        </div>
        <div id="mobile-filter">
            <p class="pl-sm-0 pl-2"> Home | <b>All Breads</b></p>
            <div class="border-bottom pb-2 ml-2">
                <h4 id="burgundy">Filters</h4>
            </div>
            <div class="py-2 border-bottom ml-3">
                <h6 class="font-weight-bold">Categories</h6>
                <div id="orange"><span class="fa fa-minus"></span></div>
                <form>
                    <div class="form-group"> <input type="checkbox" id="artisan"> <label for="artisan">Fresh Artisan
                            Breads</label> </div>
                    <div class="form-group"> <input type="checkbox" id="breakfast"> <label for="breakfast">Breakfast
                            Breads</label> </div>
                    <div class="form-group"> <input type="checkbox" id="healthy"> <label for="healthy">Healthy
                            Breads</label> </div>
                </form>
            </div>
            <div class="py-2 border-bottom ml-3">
                <h6 class="font-weight-bold">Accompainments</h6>
                <div id="orange"><span class="fa fa-minus"></span></div>
                <form>
                    <div class="form-group"> <input type="checkbox" id="tea"> <label for="tea">Tea Cakes</label> </div>
                    <div class="form-group"> <input type="checkbox" id="cookies"> <label for="cookies">Cookies</label>
                    </div>
                    <div class="form-group"> <input type="checkbox" id="pastries"> <label
                            for="pastries">Pastries</label> </div>
                    <div class="form-group"> <input type="checkbox" id="dough"> <label for="dough">Cookie Dough</label>
                    </div>
                    <div class="form-group"> <input type="checkbox" id="choco"> <label for="choco">Chocolates</label>
                    </div>
                </form>
            </div>
            <div class="py-2 ml-3">
                <h6 class="font-weight-bold">Top Offers</h6>
                <div id="orange"><span class="fa fa-minus"></span></div>
                <form>
                    <div class="form-group"> <input type="checkbox" id="25off"> <label for="25">25% off</label> </div>
                    <div class="form-group"> <input type="checkbox" id="5off"> <label for="5off" id="off">5% off on
                            artisan breads</label> </div>
                </form>
            </div>
        </div>
      
        <section id="sidebar">
            <p> Home | <b>All Breads</b></p>
            <div class="border-bottom pb-2 ml-2">
                <h4 id="burgundy">Filters</h4>
            </div>
            <div class="py-2 border-bottom ml-3">
                <h6 class="font-weight-bold">Categories</h6>
                <div id="orange"><span class="fa fa-minus"></span></div>
                <form>
                    <div class="form-group"> <input type="checkbox" id="artisan"> <label for="artisan">Fresh Artisan
                            Breads</label> </div>
                    <div class="form-group"> <input type="checkbox" id="breakfast"> <label for="breakfast">Breakfast
                            Breads</label> </div>
                    <div class="form-group"> <input type="checkbox" id="healthy"> <label for="healthy">Healthy
                            Breads</label> </div>
                </form>
            </div>
            <div class="py-2 border-bottom ml-3">
                <h6 class="font-weight-bold">Accompainments</h6>
                <div id="orange"><span class="fa fa-minus"></span></div>
                <form>
                    <div class="form-group"> <input type="checkbox" id="tea"> <label for="tea">Tea Cakes</label> </div>
                    <div class="form-group"> <input type="checkbox" id="cookies"> <label for="cookies">Cookies</label>
                    </div>
                    <div class="form-group"> <input type="checkbox" id="pastries"> <label
                            for="pastries">Pastries</label> </div>
                    <div class="form-group"> <input type="checkbox" id="dough"> <label for="dough">Cookie Dough</label>
                    </div>
                    <div class="form-group"> <input type="checkbox" id="choco"> <label for="choco">Chocolates</label>
                    </div>
                </form>
            </div>
            <div class="py-2 ml-3">
                <h6 class="font-weight-bold">Top Offers</h6>
                <div id="orange"><span class="fa fa-minus"></span></div>
                <form>
                    <div class="form-group"> <input type="checkbox" id="25off"> <label for="25">25% off</label> </div>
                    <div class="form-group"> <input type="checkbox" id="5off"> <label for="5off" id="off">5% off on
                            artisan breads</label> </div>
                </form>
            </div>
        </section>
       
        <section id="products">
            <div class="container">
                <div class="d-flex flex-row">
                    <div class="text-muted m-2" id="res">Showing 44 results</div>
                    <div class="ml-auto mr-lg-4">
                        <div id="sorting" class="border rounded p-1 m-1"> <span class="text-muted">Sort by</span>
                            <select name="sort" id="sort">
                                <option value="popularity"><b>Popularity</b></option>
                                <option value="prcie"><b>Price</b></option>
                                <option value="rating"><b>Rating</b></option>
                            </select> </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1">
                        <div class="card"> <img class="card-img-top"
                                src="https://images.pexels.com/photos/1775043/pexels-photo-1775043.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500">
                            <div class="card-body">
                                <h5><b>Multi Grain Bread</b> </h5>
                                <div class="d-flex flex-row my-2">
                                    <div class="text-muted">₹110/loaf</div>
                                    <div class="ml-auto"> <button class="border rounded bg-white sign"><span
                                                class="fa fa-plus" id="orange"></span></button> <span class="px-sm-1">1
                                            loaf</span> <button class="border rounded bg-white sign"><span
                                                class="fa fa-minus" id="orange"></span></button> </div>
                                </div> <button class="btn w-100 rounded my-2">Add to cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1">
                        <div class="card"> <img class="card-img-top"
                                src="https://images.pexels.com/photos/3085146/pexels-photo-3085146.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500">
                            <div class="card-body">
                                <h5><b>Bagels</b> </h5>
                                <div class="d-flex flex-row my-2">
                                    <div class="text-muted">₹35/piece</div>
                                    <div class="ml-auto"> <button class="border rounded bg-white sign"><span
                                                class="fa fa-plus" id="orange"></span></button> <span class="px-sm-1">1
                                            pc</span> <button class="border rounded bg-white sign"><span
                                                class="fa fa-minus" id="orange"></span></button> </div>
                                </div> <button class="btn w-100 rounded my-2">Add to cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1">
                        <div class="card"> <img class="card-img-top"
                                src="https://images.pexels.com/photos/1448665/pexels-photo-1448665.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500">
                            <div class="card-body">
                                <h5><b>White Bread</b> </h5>
                                <div class="d-flex flex-row my-2">
                                    <div class="text-muted">₹80/loaf</div>
                                    <div class="ml-auto"> <button class="border rounded bg-white sign"><span
                                                class="fa fa-plus" id="orange"></span></button> <span class="px-sm-1">1
                                            loaf</span> <button class="border rounded bg-white sign"><span
                                                class="fa fa-minus" id="orange"></span></button> </div>
                                </div> <button class="btn w-100 rounded my-2">Add to cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1">
                        <div class="card"> <img class="card-img-top"
                                src="https://images.pexels.com/photos/461060/pexels-photo-461060.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500">
                            <div class="card-body">
                                <h5><b>Baguette</b> </h5>
                                <div class="d-flex flex-row my-2">
                                    <div class="text-muted">₹160/piece</div>
                                    <div class="ml-auto"> <button class="border rounded bg-white sign"><span
                                                class="fa fa-plus" id="orange"></span></button> <span class="px-sm-1">1
                                            pc</span> <button class="border rounded bg-white sign"><span
                                                class="fa fa-minus" id="orange"></span></button> </div>
                                </div> <button class="btn w-100 rounded my-2">Add to cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1">
                        <div class="card"> <img class="card-img-top"
                                src="https://images.pexels.com/photos/209206/pexels-photo-209206.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500">
                            <div class="card-body">
                                <h5><b>Masala Bun</b> </h5>
                                <div class="d-flex flex-row my-2">
                                    <div class="text-muted">₹85/piece</div>
                                    <div class="ml-auto"> <button class="border rounded bg-white sign"><span
                                                class="fa fa-plus" id="orange"></span></button> <span class="px-sm-1">1
                                            pc</span> <button class="border rounded bg-white sign"><span
                                                class="fa fa-minus" id="orange"></span></button> </div>
                                </div> <button class="btn w-100 rounded my-2">Add to cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1">
                        <div class="card d-relative"> <img class="card-img-top"
                                src="https://images.pexels.com/photos/3570/morning-breakfast-croissant.jpg?auto=compress&cs=tinysrgb&dpr=1&w=500">
                            <div class="card-body">
                                <h5><b>Croissant</b> </h5>
                                <div class="rounded bg-white discount" id="orange">10% off</div>
                                <div class="d-flex flex-row my-2">
                                    <div class="text-muted price"><del>₹55</del>₹45/piece</div>
                                    <div class="ml-auto"> <button class="border rounded bg-white sign"><span
                                                class="fa fa-plus" id="orange"></span></button> <span>1pc</span> <button
                                            class="border rounded bg-white sign"><span class="fa fa-minus"
                                                id="orange"></span></button> </div>
                                </div> <button class="btn w-100 rounded my-2">Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
 -->



<div class="page-top-info">
    <div class="container">
        <h4>CAtegory PAge</h4>
        <div class="site-pagination">
            <a href="">Home</a> /
            <a href="">Shop</a> /
        </div>
    </div>
</div>
<!-- Page info end -->

<section class="category-section spad">
    <div class="container">
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

                            <?php
                              foreach ($brands as $brand) {
                            ?>
                                  
                                <li><a href="#"><?=$brand['name']?> <span>(2)</span></a></li>

                        <?php    }
                            ?>
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
                    <a href="javascript:void(0);" class="clear-filter" data-type-clear="category" data-toggle="tooltip"
                        data-placement="right" title="<?= lang('clear_the_filter') ?>"><i class="fa fa-times"
                            aria-hidden="true"></i></a>
                    <?php } ?>
                </div>
                <div class="body">
                    <a href="javascript:void(0)" id="show-xs-nav" class="visible-xs visible-sm">
                        <span class="show-sp"><?= lang('showXsNav') ?><i class="fa fa-arrow-circle-o-down"
                                aria-hidden="true"></i></span>
                        <span class="hidde-sp"><?= lang('hideXsNav') ?><i class="fa fa-arrow-circle-o-up"
                                aria-hidden="true"></i></span>
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
                                                        <li><a href="#">Midi Dresses <span>(2)</span></a></li>
                                                        <li><a href="#">Maxi Dresses<span>(56)</span></a></li>
                                                        <li><a href="#">Prom Dresses<span>(36)</span></a></li>
                                                        <li><a href="#">Little Black Dresses <span>(27)</span></a></li>
                                                        <li><a href="#">Mini Dresses<span>(19)</span></a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Man Wear</a>
                                                    <ul class="sub-menu">
                                                        <li><a href="#">Midi Dresses <span>(2)</span></a></li>
                                                        <li><a href="#">Maxi Dresses<span>(56)</span></a></li>
                                                        <li><a href="#">Prom Dresses<span>(36)</span></a></li>
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
                                                    <input type="radio" name="cs" id="blue-color" checked="">
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
                                                    <input type="radio" name="sc" id="m-size" checked="">
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
                                                <li><a href="#">Abercrombie & Fitch <span>(2)</span></a></li>
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
                                    <ul class="<?= $is_recursion === true ? 'children' : 'parent' ?>">
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
                                            <a href="javascript:void(0);" data-categorie-id="<?= $page['id'] ?>"
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
                            <a href="javascript:void(0);" class="clear-filter" data-type-clear="brand_id"
                                data-toggle="tooltip" data-placement="right" title="<?= lang('clear_the_filter') ?>"><i
                                    class="fa fa-times" aria-hidden="true"></i></a>
                            <?php } ?>
                        </div>
                        <ul>
                            <?php foreach ($brands as $brand) { ?>
                            <li>
                                <i class="fa fa-chevron-right" aria-hidden="true"></i> <a href="javascript:void(0);"
                                    data-brand-id="<?= $brand['id'] ?>"
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
                            <a href="javascript:void(0);" class="clear-filter" data-type-clear="in_stock"
                                data-toggle="tooltip" data-placement="right" title="<?= lang('clear_the_filter') ?>"><i
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
                                    <select class="selectpicker order form-control" data-style="btn-green"
                                        data-order-to="order_new">
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
                                    <select class="selectpicker order form-control" data-style="btn-green"
                                        data-order-to="order_price" title="<?= lang('price_title') ?>..">
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
                                    <select class="selectpicker order form-control" data-style="btn-green"
                                        data-order-to="order_procurement" title="<?= lang('procurement_title') ?>..">
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
                    <div class="col-sm-6 col-md-4 product-inner">
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
                    </div>
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
                <a href="javascript:void(0);" class="clear-filter" data-type-clear="category" data-toggle="tooltip"
                    data-placement="right" title="<?= lang('clear_the_filter') ?>"><i class="fa fa-times"
                        aria-hidden="true"></i></a>
                <?php } ?>
            </div>
            <div class="body">
                <a href="javascript:void(0)" id="show-xs-nav" class="visible-xs visible-sm">
                    <span class="show-sp"><?= lang('showXsNav') ?><i class="fa fa-arrow-circle-o-down"
                            aria-hidden="true"></i></span>
                    <span class="hidde-sp"><?= lang('hideXsNav') ?><i class="fa fa-arrow-circle-o-up"
                            aria-hidden="true"></i></span>
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



            <script src="<?= base_url('assets/bootstrap-select-1.12.1/js/bootstrap-select.min.js') ?>"></script>