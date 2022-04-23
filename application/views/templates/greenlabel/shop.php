<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<div class="inner-nav">
    <div class="container">
        <?= lang('home') ?> <span class="active"> > <?= lang('shop') ?></span>
    </div>
</div>







<!-- Navbar section -->

<div class="filter"> <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#mobile-filter" aria-expanded="true" aria-controls="mobile-filter">Filters<span class="fa fa-filter pl-1"></span></button>
</div>
<div id="mobile-filter">
    <p class="pl-sm-0 pl-2"> Home | <b>All Breads</b></p>
    <div class="border-bottom pb-2 ml-2">
        <h4 id="burgundy">Filters</h4>
    </div>
    <div class="py-2 border-bottom ml-3">
        <h6 class="font-weight-bold">Categories</h6>
        <div id="orange"><span class="fa fa-minus"></span></div>
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
    </div>
    <div class="py-2 border-bottom ml-3">
        <h6 class="font-weight-bold">Brands</h6>
        <div id="orange"><span class="fa fa-minus"></span></div>
        <?php
                              foreach ($brands as $brand) {
                            ?>

                        <li><a href="#"><?=$brand['name']?> <span>(2)</span></a></li>

                        <?php    }
                            ?>

    </div>
   
</div>
<!-- Sidebar filter section -->
<section id="sidebar">
    <p> Home | <b>All Breads</b></p>
    <div class="border-bottom pb-2 ml-2">
        <h4 id="burgundy">Filters</h4>
    </div>
    <div class="py-2 border-bottom ml-3">
        <h6 class="font-weight-bold">Categories</h6>
        <div id="orange"><span class="fa fa-minus"></span></div>
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
    </div>
    <div class="py-2 border-bottom ml-3">
        <h6 class="font-weight-bold">Brands</h6>
        <div id="orange"><span class="fa fa-minus"></span></div>
        <?php
                              foreach ($brands as $brand) {
                            ?>

                        <li><a href="#"><?=$brand['name']?> <span>(2)</span></a></li>

                        <?php    }
                            ?>


    </div>
  
</section>
<!-- products section -->
<section id="products">
    <div class="container">
        <div class="d-flex flex-row">
            <div class="text-muted m-2" id="res">Showing 44 results</div>
            <div class="ml-auto mr-lg-4">
                <div id="sorting" class="border rounded p-1 m-1"> <span class="text-muted">Sort by</span> 
                <select name="sort" id="sort">
                <option <?= isset($_GET['order_new']) && $_GET['order_new'] == "desc" ? 'selected' : '' ?> <?= !isset($_GET['order_new']) || $_GET['order_new'] == "" ? 'selected' : '' ?> value="desc"><?= lang('new') ?> </option>
                                <option <?= isset($_GET['order_new']) && $_GET['order_new'] == "asc" ? 'selected' : '' ?> value="asc"><?= lang('old') ?> </option>
                            </select>

                    <select name="sort" id="sort">
                    <option label="<?= lang('not_selected') ?>"></option>
                                <option <?= isset($_GET['order_price']) && $_GET['order_price'] == "asc" ? 'selected' : '' ?> value="asc"><?= lang('price_low') ?> </option>
                                <option <?= isset($_GET['order_price']) && $_GET['order_price'] == "desc" ? 'selected' : '' ?> value="desc"><?= lang('price_high') ?> </option>
                           </select>

                    <select name="sort" id="sort">
                    <option label="<?= lang('not_selected') ?>"></option>
                                <option <?= isset($_GET['order_procurement']) && $_GET['order_procurement'] == "desc" ? 'selected' : '' ?> value="desc"><?= lang('procurement_desc') ?> </option>
                                <option <?= isset($_GET['order_procurement']) && $_GET['order_procurement'] == "asc" ? 'selected' : '' ?> value="asc"><?= lang('procurement_asc') ?> </option>
                               </select>


                
                </div>
            </div>

            
        </div>
        <div class="row">
        <?php
            if (!empty($products)) {
                foreach ($products as $product) {
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
</section>

<?php if ($links_pagination != '') { ?>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <?= $links_pagination ?>
            </div>
        </div>
    <?php } ?>

                             