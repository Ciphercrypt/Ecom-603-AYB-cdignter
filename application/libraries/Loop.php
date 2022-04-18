<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loop
{

    private static $CI;

    public function __construct()
    {
        self::$CI = & get_instance();
    }

    static function getCartItems($cartItems)
    { 
        if (!empty($cartItems['array'])) {
            ?>
            <li class="cleaner text-right">
                <a href="javascript:void(0);" class="btn-blue-round" onclick="clearCart()">
                    <?= lang('clear_all') ?>
                </a>
            </li>
            <li class="divider"></li>
            <?php
            foreach ($cartItems['array'] as $cartItem) {
                ?>
                <li class="shop-item" data-artticle-id="<?= $cartItem['id'] ?>">
                    <span class="num_added hidden"><?= $cartItem['num_added'] ?></span>
                    <div class="item">
                        <div class="item-in">
                            <div class="left-side">
                                <img src="<?= base_url('/attachments/shop_images/' . $cartItem['image']) ?>" alt="" />
                            </div>
                            <div class="right-side">
                                <a href="<?= LANG_URL . '/' . $cartItem['url'] ?>" class="item-info">
                                    <span><?= $cartItem['title'] ?></span>
                                    <span class="prices">
                                        <?=
                                        $cartItem['num_added'] == 1 ? $cartItem['price'] : '<span class="num-added-single">'
                                                . $cartItem['num_added'] . '</span> x <span class="price-single">'
                                                . $cartItem['price'] . '</span> - <span class="sum-price-single">'
                                                . $cartItem['sum_price'] . '</span>'
                                        ?>
                                    </span>
                                    <span class="currency"><?= CURRENCY ?></span>
                                </a>
                            </div>
                        </div>
                        <div class="item-x-absolute">
                            <button class="btn btn-xs btn-danger pull-right" onclick="removeProduct(<?= $cartItem['id'] ?>)">
                                x
                            </button>
                        </div>
                    </div>
                </li>
                <?php
            }
            ?>
            <li class="divider"></li>
            <li class="text-center">
                <a class="go-checkout btn btn-danger btn-sm" href="<?= LANG_URL . '/checkout' ?>">
                    <?=
                    !empty($cartItems['array']) ? '<i class="fa fa-check"></i> '
                            . lang('checkout') . ' - <span class="finalSum">' . $cartItems['finalSum']
                            . '</span>' . CURRENCY : '<span class="no-for-pay">' . lang('no_for_pay') . '</span>'
                    ?>
                </a>
            </li>
        <?php } else {
            ?>
            <li class="text-center"><?= lang('no_products') ?></li>
            <?php
        }
    }

    static public function getProducts($products, $classes = '', $carousel = false)
    {
        if ($carousel == true) {
            ?>
            
            <div class="carousel slide" id="small_carousel" data-ride="carousel" data-interval="3000" >
                <ol class="carousel-indicators">
                    <?php
                    $i = 0;
                    while ($i < count($products)) {
                        if ($i == 0)
                            $active = 'active';
                        else
                            $active = '';
                        ?>
                        <li data-target="#small_carousel" data-slide-to="<?= $i ?>" class="<?= $active ?>"></li>
                        <?php
                        $i++;
                    }
                    ?>
                </ol>
                <div class="card-group ">
                    <?php
                }
                $i = 0;
                
                foreach ($products as $article) {
                    if ($i == 0 && $carousel == true) {
                        $active = 'active';
                    } else {
                        $active = '';
                    }
                    if (strtolower(trim($article['title']))=="dudhai"||trim($article['title'])=="दुधाई"){?>
                        <a href="<?=base_url()?>Home/Showsubscription"> 
                        
                        <?php } else { ?> <a href="<?= $article['vendor_url'] == null ? LANG_URL . '/' . $article['url'] : LANG_URL . '/' . $article['vendor_url'] . '/' . $article['url'] ?>"> <?php } ?>
                    <div class="card" style="width: 20rem; text-align:center;display:inline-block;margin-top:20px; background-color:ivory;margin:20px 20px;position:relative;oveflow:hidden;  object-fit: cover;border-radius:20px;" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                    <img class="card-img-top" src="<?= base_url('/attachments/shop_images/' . $article['image']) ?>" alt="Card image cap" height="200" width="200" style="border-radius:.60rem;  object-fit: cover;
">
                    <div class="card-block">
                    <?php 
                    $stockprice=0;
                    if($article['quantity']<=0){$stockprice=2;}
                    else if ($article['quantity']>0){$stockprice=3;}
                   if ($article['old_price'] != '' && $article['old_price'] != 0 && $article['price'] != '' && $article['price'] != 0) {
                    $percent_friendly = number_format((($article['old_price'] - $article['price']) / $article['old_price']) * 100) . '%';
                    if ($article['old_price'] <= $article['price']|| $article['price']==0){ ?>
                        <h4 class="position-static" style="color:slateblue;">₹&nbsp<b><?=$article['price']?></b></h4>
                            <?php } else   if($article['old_price'] > $article['price']) {?>

                     
                            <h4 class="position-static" style="color:slateblue;"> <s style="color:black;">₹<?=$article['old_price']?></s>&nbsp₹<b><?=$article['price']?></b><sup><span class="badge badge-success" style="background-color:green ; color:black;"><b><?= $percent_friendly ?> OFF !</span></b></sup></h4>

                        <?php } } ?>
                        <div width="15px" height="10px">
                        <p class="card-text" style="overflow:hidden; max-height:100%; max-width:100%;"><?= character_limiter($article['title'], 55) ?></p> </div>
                        </a>
                        <?php if (strtolower(trim($article['title']))=="dudhai"||trim($article['title'])=="दुधाई"){?> 
                            <div style="color:green; " align="center"> <a  href="<?=base_url()?>Home/Showsubscription" class=" btn-add btn-success add-to-cart" ><label class="badge badge-success" style="background-color:#333 ; color:white; font-size:15px; display: inline-block; width: 280px; height:35px; margin:-5px -20px -5px -20px;" align="center"><span class="glyphicon glyphicon-flash"></span><?=lang('buy_now')?></label>

                            <?php } else {?>
                       <div style="color:green; " align="center">  <?php }?>
                      </a> </div>
                    </div>
                    </div>
                    <?php
                    $i++;
                }
                if ($carousel == true) {
                    ?>
                </div>
                <a class="left carousel-control" href="#small_carousel" role="button" data-slide="prev">
                    <i class="fa fa-5x fa-angle-left" aria-hidden="true"></i>
                </a>
                <a class="right carousel-control" href="#small_carousel" role="button" data-slide="next">
                    <i class="fa fa-5x fa-angle-right" aria-hidden="true"></i>
                </a>
            </div>
            <?php
        }
    }


    static public function getMax($products){
        $max=0;
        foreach ($products as $article) {

            if ($max < $article['price']) {
           $max = $article['price']; }

        }
        return $max;
 

    }
    static public function getMin($products){

        $max=0;
        foreach ($products as $article) {

            if ($max < $article['price']) {
           $max = $article['price']; }

        }
        $min=$max;
        foreach ($products as $article) {

            if ($min > $article['price']) {
           $min = $article['price']; }

        }
        return $min;
 

    }


}
