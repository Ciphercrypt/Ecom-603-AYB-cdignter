<!DOCTYPE html>
<html lang="<?= MY_LANGUAGE_ABBR ?>">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="<?= $description ?>" />
    <meta name="keywords" content="<?= $keywords ?>" />
    <meta property="og:title" content="<?= $title ?>" />
    <meta property="og:description" content="<?= $description ?>" />
    <meta property="og:url" content="<?= LANG_URL ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:image"
        content="<?= isset($image) && !is_null($image) ? $image : base_url('assets/img/site-overview.png') ?>" />
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>" />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lobster+Two" rel="stylesheet" />

    <link rel="stylesheet" href="<?= base_url('templatecss/bootstrap.min.css ') ?>" />
    <link rel="stylesheet" href="<?= base_url('templatecss/font-awesome.min.css ') ?>" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" />
    
    <link rel="stylesheet" href="<?= base_url('templatecss/flaticon.css ') ?>" />
    <link rel="stylesheet" href="<?= base_url('templatecss/slicknav.min.css ') ?>" />
    <link rel="stylesheet" href="<?= base_url('templatecss/jquery-ui.min.css ') ?>" />
    <link rel="stylesheet" href="<?= base_url('templatecss/owl.carousel.min.css ') ?>" />
    <link rel="stylesheet" href="<?= base_url('templatecss/animate.css ') ?>" />
    <link rel="stylesheet" href="<?= base_url('templatecss/style.css ') ?>" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
    <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>


    <link href="<?= base_url('assets/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('templatecss/custom.css') ?>" rel="stylesheet" />
    <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('loadlanguage/all.js') ?>"></script>
    <?php if ($cookieLaw != false) { ?>
    <script type="text/javascript">
        window.cookieconsent_options = {
            "message": "<?= $cookieLaw['message'] ?>",
            "dismiss": "<?= $cookieLaw['button_text'] ?>",
            "learnMore": "<?= $cookieLaw['learn_more'] ?>",
            "link": "<?= $cookieLaw['link'] ?>",
            "theme": "<?= $cookieLaw['theme'] ?>"
        };
    </script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.10/cookieconsent.min.js">
    </script>
    <?php } ?>
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>
<style>
    .mybg-events {
        background: url('<?=base_url('template/imgs/bg.jpg')?>') no-repeat center center fixed;
        background-size: cover;
    }
</style>

<body>
    <!-- <div class="container">
        <div class="user-panel">
            <?php if (isset($_SESSION['logged_user'])) { ?>
            <a href="<?= LANG_URL . '/myaccount' ?>" class="my-acc">
                <?= lang('my_acc') ?>
            </a>
            <?php } else { ?>
            <a href="<?= LANG_URL . '/login' ?>" class="my-acc-login">
                <?= lang('login') ?>
            </a>
            <a href="<?= LANG_URL . '/register' ?>" class="my-acc-register">
                <?= lang('register') ?>
            </a>
            <?php } ?>
            <div class="clearfix"></div>
        </div>
        <div class="row header">
            <div class="col-md-4 col-xs-12">
                <div class="logo">
                    <a href="<?= LANG_URL ?>">
                        <img src="<?= base_url('attachments/site_logo/' . $sitelogo) ?>" alt="<?= $title ?>">
                    </a>
                </div>
            </div>
            <div class="col-md-7 col-sm-10 col-xs-10">
                <div class="top">
                    <?php
                    if ($footerContactPhone != '') {
                    ?>
                    <p class="phone"><?= lang('call_us') . ' ' . $footerContactPhone ?></p>
                    <?php
                    }
                    $num_langs = count($allLanguages);
                    if ($num_langs > 0) {
                    ?>
                    <div class="dropdown dropdown-langs">
                        <button class="dropdown-toggle" type="button" data-toggle="dropdown">
                            <img src="<?= base_url('attachments/lang_flags/' . MY_LANGUAGE_ABBR . '.jpg') ?>"
                                alt="<?= MY_LANGUAGE_ABBR ?>">
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <?php
                                foreach ($allLanguages as $key_lang => $lang) {
                                ?>
                            <li><a href="<?= base_url($key_lang) ?>"><?= $lang['name'] ?></a></li>
                            <?php
                                }
                                ?>
                        </ul>
                    </div>
                    <?php } ?>
                    <form method="GET" class="search" id="bigger-search" action="<?= LANG_URL . '/shop' ?>">
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
                        <div class="hidden">
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
                                                name="added_after" id="added_after" class="form-control"><span
                                                class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="added_before"><?= lang('added_before') ?></label>
                                        <div class="input-group date">
                                            <input type="text"
                                                value="<?= isset($_GET['added_before']) ? htmlspecialchars($_GET['added_before']) : '' ?>"
                                                name="added_before" id="added_before" class="form-control"><span
                                                class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
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
                        </div>
                        <input type="text" class="field" id="search_in_title"
                            value="<?= isset($_GET['search_in_title']) ? htmlspecialchars($_GET['search_in_title']) : '' ?>"
                            placeholder="<?= lang('search_here') ?>">
                        <button onclick="submitForm()"><i class="fa fa-search"></i></button>
                    </form>
                    <div class="clearfix"></div>
                </div>
                <div class="bottom mainmenu">
                    <nav>
                        <div class="navbar-header">
                            <span class="visible-xs menu-text-xs"><?= lang('menu') ?></span>
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div id="navbar" class="collapse navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li<?= uri_string() == '' || uri_string() == MY_LANGUAGE_ABBR ? ' class="active"' : '' ?>>
                                    <a href="<?= LANG_URL ?>"><?= lang('home') ?></a></li>
                                    <li<?= uri_string() == 'shop' || uri_string() == MY_LANGUAGE_ABBR . '/shop' ? ' class="active"' : '' ?>>
                                        <a href="<?= LANG_URL . '/shop' ?>"><?= lang('shop') ?> <i
                                                class="fa fa-chevron-down"></i></a>
                                        <!--   <div class="megamenu">
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
                                                <a href="javascript:void(0);"
                                                    data-categorie-id="<?= $nav_category['id'] ?>"
                                                    class="go-category <?= $children == true ? 'mega-title' : '' ?>"><?= $nav_category['name'] ?></a>
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
                                        <?php
                                        if (!empty($nonDynPages)) {
                                            foreach ($nonDynPages as $addonPage) {
                                        ?>
                                        <li<?= uri_string() == $addonPage || uri_string() == MY_LANGUAGE_ABBR . '/' . $addonPage ? ' class="active"' : '' ?>>
                                            <a
                                                href="<?= LANG_URL . '/' . $addonPage ?>"><?= mb_ucfirst(lang($addonPage)) ?></a>
                                            </li>
                                            <?php
                                            }
                                        }
                                        if (!empty($dynPages)) {
                                            foreach ($dynPages as $addonPage) {
                                                ?>
                                            <li<?= urldecode(uri_string()) == 'page/' . $addonPage['pname'] || uri_string() == MY_LANGUAGE_ABBR . '/' . 'page/' . $addonPage['pname'] ? ' class="active"' : ''
                                                        ?>><a
                                                    href="<?= LANG_URL . '/page/' . $addonPage['pname'] ?>"><?= mb_ucfirst($addonPage['lname']) ?></a>
                                                </li>
                                                <?php
                                            }
                                        }
                                                ?>
                                                <li<?= uri_string() == 'checkout' || uri_string() == MY_LANGUAGE_ABBR . '/checkout' ? ' class="active"' : '' ?>>
                                                    <a href="<?= LANG_URL . '/checkout' ?>"><?= lang('checkout') ?></a>
                                                    </li>
                                                    <li<?= uri_string() == 'shopping-cart' || uri_string() == MY_LANGUAGE_ABBR . '/shopping-cart' ? ' class="active"' : '' ?>>
                                                        <a
                                                            href="<?= LANG_URL . '/shopping-cart' ?>"><?= lang('shopping_cart') ?></a>
                                                        </li>
                                                        <li<?= uri_string() == 'contacts' || uri_string() == MY_LANGUAGE_ABBR . '/contacts' ? ' class="active"' : '' ?>>
                                                            <a
                                                                href="<?= LANG_URL . '/contacts' ?>"><?= lang('contacts') ?></a>
                                                            </li>
                            </ul>
                        </div>

                    </nav>
                </div>
            </div>
            <div class="col-md-1 col-sm-2 col-xs-2">
                <ul class="shop-dropdown">
                    <li class="dropdown text-center">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="badge"><?= $cartItems['array'] == 0 ? 0 : $sumOfItems ?></span>
                            <i class="fa fa-shopping-basket"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right dropdown-cart" role="menu">
                            <?= $load::getCartItems($cartItems) ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
 -->





    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 text-center text-lg-left">
                        <!-- logo -->
                        <a href="./index.html" class="site-logo">
                            <img src="http://www.ayurcinbio.com/images/logo_new_sm.png" alt="">
                        </a>
                    </div>
                    <div class="col-xl-6 col-lg-5">

                    
                        <div class="">
                            <form method="GET" id="bigger-search" class="header-search-form" action="<?= LANG_URL ?>/shop">
                                <div class="">
                                    <input type="text" id="search_in_title"
                                        value="<?= isset($_GET['search_in_title']) ? htmlspecialchars($_GET['search_in_title']) : '' ?>"
                                        placeholder="<?= lang('search_for') ?>...">

                                    <button onclick="submitForm()" type="button">
                                        <i class="fa fa-search" aria-hidden="true"></i> </button>


                                        <div class="">
                                            <a class="hidden" href="javascript:void(0);" id="dropdownsearch"
                                                data-toggle="dropdown">
                                                <i class="hidden" aria-hidden="true"></i>
                                            </a>
                                            <div class="hidden" role="menu" aria-labelledby="dropdownsearch">
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
                                                <div class="hidden">
                                                    <label for="quantity_more"><?= lang('quantity_more_than') ?></label>
                                                    <input type="text"
                                                        value="<?= isset($_GET['quantity_more']) ? htmlspecialchars($_GET['quantity_more']) : '' ?>"
                                                        name="quantity_more" id="quantity_more"
                                                        placeholder="<?= lang('type_a_number') ?>" class="hidden">
                                                </div>
                                                <div class="hiden">
                                                    <div class="hidden">
                                                        <div class="hidden">
                                                            <label for="added_after"><?= lang('added_after') ?></label>
                                                            <div class="hidden">
                                                                <input type="text"
                                                                    value="<?= isset($_GET['added_after']) ? htmlspecialchars($_GET['added_after']) : '' ?>"
                                                                    name="added_after" id="added_after" class="hidden">
                                                                <span class="hidden"><i class="fa fa-calendar"
                                                                        aria-hidden="true"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="hidden">
                                                        <div class="hidden">
                                                            <label for="hidden"><?= lang('added_before') ?></label>
                                                            <div class="hidden">
                                                                <input type="text"
                                                                    value="<?= isset($_GET['added_before']) ? htmlspecialchars($_GET['added_before']) : '' ?>"
                                                                    name="added_before" id="added_before"
                                                                    class="hidden">
                                                                <span class="hidden"><i class="hidden"
                                                                        aria-hidden="true"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="hidden">
                                                    <label
                                                        for="search_in_body"><?= lang('search_by_keyword_body') ?></label>
                                                    <input class="hidden"
                                                        value="<?= isset($_GET['search_in_body']) ? htmlspecialchars($_GET['search_in_body']) : '' ?>"
                                                        name="search_in_body" id="search_in_body" type="text" />
                                                </div>
                                                <div class="hidden">
                                                    <div class="hidden">
                                                        <div class="hidden">
                                                            <label for="price_from"><?= lang('price_from') ?></label>
                                                            <input type="text"
                                                                value="<?= isset($_GET['price_from']) ? htmlspecialchars($_GET['price_from']) : '' ?>"
                                                                name="price_from" id="price_from" class="hidden"
                                                                placeholder="<?= lang('type_a_number') ?>">
                                                        </div>
                                                    </div>
                                                    <div class="hidden">
                                                        <div class="hidden">
                                                            <label for="price_to"><?= lang('price_to') ?></label>
                                                            <input type="text" name="price_to"
                                                                value="<?= isset($_GET['price_to']) ? htmlspecialchars($_GET['price_to']) : '' ?>"
                                                                id="price_to" class="hidden"
                                                                placeholder="<?= lang('type_a_number') ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="hidden">
                                                    <i class="hidden" aria-hidden="true"></i>
                                                </button>
                                                <a class="hidden" id="clear-form"
                                                    href="javascript:void(0);"><?= lang('clear_form') ?></a>
                                            </div>
                                        </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5" >
                        <div class="user-panel">
                            <div class="up-item">
                                <i class="fa fa-user"></i>

                                <?php if (isset($_SESSION['logged_user'])) { ?>
                                <a href="<?= LANG_URL . '/myaccount' ?>" class="my-acc">


                                    <a href="<?= LANG_URL . '/myaccount' ?>"> <?= lang('my_acc') ?></a>
                                </a>
                                <?php } else { ?>


                                <a href="<?= LANG_URL . '/register' ?>">Sign</a> In or <a
                                    href="<?= LANG_URL . '/register' ?>">Create Account</a>
                                <!-- <a href="#">Sign</a> In or <a href="#">Create Account</a> -->
                                <?php } ?>

                            </div>

                            <div class="up-item">
                                <div class="shopping-card my-basket dropdown-toggle" data-toggle="dropdown"
                                    role="button" aria-expanded="false">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span><?= $cartItems['array'] == 0 ? lang('empty') : $sumOfItems ?></span>
                                </div>
                                <ul class="dropdown-menu dropdown-menu-right dropdown-cart" role="menu">
                                    <?= $load::getCartItems($cartItems) ?>
                                </ul>
                                <a href="#">Shopping Cart</a>
                            </div>

                            <!-- <div class="col-md-1 col-sm-2 col-xs-2">
                <ul class="shop-dropdown">
                    <li class="dropdown text-center">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="badge"><?= $cartItems['array'] == 0 ? 0 : $sumOfItems ?></span>
                            <i class="fa fa-shopping-basket"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right dropdown-cart" role="menu">
                            <?= $load::getCartItems($cartItems) ?>
                        </ul>
                    </li>
                </ul>
            </div> -->


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <nav class="main-navbar">
            <div class="container">
                <!-- menu -->
                <ul class="main-menu">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Products</a></li>

                    <li><a href="#">What's new?
                            <span class="new">New</span>
                        </a></li>
                    <li><a href="#">Categories</a>
                        <ul class="sub-menu">


                            <?php

function loop_tree_nav($nav_categories, $is_recursion = false)
{
    if ($is_recursion == false) {
?>

                            <?php
    }
    foreach ($nav_categories as $nav_category) {
        $children = false;
        if (isset($nav_category['children']) && !empty($nav_category['children'])) {
            $children = true;
        }
        ?>
                            <li> <a href="javascript:void(0);" data-categorie-id="<?= $nav_category['id'] ?>"
                                    class="go-category <?= $children == true ? 'mega-title' : '' ?>"><?= $nav_category['name'] ?></a>
                            </li>
                            <?php
            if ($children === true) {
                loop_tree_nav($nav_category['children'], true);
            }
        }
        if ($is_recursion == false) {
            ?>
                            <?php
        }
    }

    loop_tree_nav($nav_categories);
?>



                            <!-- <li><a href="#">Sneakers</a></li>
                            <li><a href="#">Sandals</a></li>
                            <li><a href="#">Formal Shoes</a></li>
                            <li><a href="#">Boots</a></li>
                            <li><a href="#">Flip Flops</a></li> -->
                        </ul>
                    </li>
                    <!-- <li><a href="#">Brands</a>
                        <ul class="sub-menu">

                        <?php
                                                    foreach ($brands as $brand) { ?>
                                                     <li>   <a href="javascript:void(0);" data-brand-id="<?= $brand['id'] ?>" class="brand<?= isset($_GET['brand_id']) && $_GET['brand_id'] == $brand['id'] ?  'mega-title' : '' ?>"><b style="color:green;"><?= $brand['name'] ?></b></a> 
                                                    </li>
                                                    <?php
                                                }
                                            ?>


                            <li><a href="./product.html">Product Page</a></li>
                            <li><a href="./category.html">Category Page</a></li>
                            <li><a href="./cart.html">Cart Page</a></li>
                            <li><a href="./checkout.html">Checkout Page</a></li>
                            <li><a href="./contact.html">Contact Page</a></li>
                        </ul>
                    </li> -->
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Contacts Us</a></li>

                </ul>
            </div>
        </nav>
    </header>