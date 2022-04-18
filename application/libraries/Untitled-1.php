<div class="card" style="height:0rem; width: 80rem; ">
                    <div class="  product-list <?= $carousel == true ? 'item' : '' ?> <?= $classes ?> <?= $active ?> " style="padding:5px;" >

                        <div class="inner" >
                        <div class="media">
                            <div class=" img-container " align="center" >
                                <a href="<?= $article['vendor_url'] == null ? LANG_URL . '/' . $article['url'] : LANG_URL . '/' . $article['vendor_url'] . '/' . $article['url'] ?>">
                                    <img src="<?= base_url('/attachments/shop_images/' . $article['image']) ?>" alt="<?= str_replace('"', "'", $article['title']) ?>" class="img-responsive">
                                </a> 
                            </div>
                            <div  class="media-body" >
                            
                            <h4 align="center"><b>   <a  class="stretched-link" href="<?= $article['vendor_url'] == null ? LANG_URL . '/' . $article['url'] : LANG_URL . '/' . $article['vendor_url'] . '/' . $article['url'] ?>"><?= character_limiter($article['title'], 70) ?></a></b></h4>

                            </div>
                            </div>
                            <div >
                                <?php
                                if ($article['old_price'] != '' && $article['old_price'] != 0 && $article['price'] != '' && $article['price'] != 0) {
                                    $percent_friendly = number_format((($article['old_price'] - $article['price']) / $article['old_price']) * 100) . '%';
                                    if (($article['old_price'] - $article['price'])>0){
                                    
                                    ?>
                                    <div>
                                  <span><s>  <?= CURRENCY ?> <span><?= $article['old_price'] != '' ? number_format($article['old_price'], 0)  : 0 ?></s></span>  
                                    </div>
                                <div  >
                    
                    <h5 align="left" class="text-justify font-weight-bold badge badge-success" style="font-size: 20px;" > <span ><b> <?= CURRENCY ?> <?= $article['price'] != '' ? number_format($article['price'], 0) : 0 ?> </b> <span class="badge badge-success" style="background-color:orange ; color:black;"><b><?= $percent_friendly ?> OFF !</b></span></span></h5>
                                </div>

                                <?php }else { ?>
                                    <div align="center">

                                <h5 class="text-justify font-weight-bold badge badge-success" style="font-size: 20px;" > <span align="center"><b> <?= CURRENCY ?> <?= $article['price'] != '' ? number_format($article['price'], 0) : 0 ?> </b> </span></h5>
                                </div>
                             <?php   }
                            } ?>

                            </div>
                            

                            
                            <?php  if (self::$CI->load->get_var('publicQuantity') == 1 && $article['quantity']>0) { ?>
                                <div class="quantity" style="color:green;">
                                 <B align="center"  ><?= lang('in_stock') ?><b>
                                </div>
                            <?php } else if ($article['quantity']==0){
                                ?>
                                <div class="quantity" style="color:red;" align="center">
                                    <b align="center"><?= lang('out_of_stock') ?><b>
                                </div>
                                <?php

                            }
                        
                            if (self::$CI->load->get_var('moreInfoBtn') == 1) { ?>
                                <a href="<?= $article['vendor_url'] == null ? LANG_URL . '/' . $article['url'] : LANG_URL . '/' . $article['vendor_url'] . '/' . $article['url'] ?>" class="info-btn ">
                                    <span class="text-justify  badge badge-success" style="background-color: slateblue;"><u><span class="glyphicon glyphicon-info-sign"></span> <?= lang('info_product_list') ?></u> </span>
                                </a>
                            <?php } 
                            if (self::$CI->load->get_var('hideBuyButtonsOfOutOfStock') == 0 || (int)$article['quantity'] > 0) {
                                $hasRefresh = false;
                                if(self::$CI->load->get_var('refreshAfterAddToCart') == 1) {
                                    $hasRefresh = true;
                                }
                            ?>
                            
                            

                            <?php } else { ?>
                            <div>
                                

                            
                              
                            </div>
                            <?php } ?>
                        </div>
                    </div>

                    </div>


                    <a href="<?= $article['vendor_url'] == null ? LANG_URL . '/' . $article['url'] : LANG_URL . '/' . $article['vendor_url'] . '/' . $article['url'] ?>">
                    <div class="card" style="width: 20rem; text-align:center;display:inline-block;margin-top:20px;">
                    <img class="card-img-top" src="<?= base_url('/attachments/shop_images/' . $article['image']) ?>" alt="Card image cap" height="200" width="200" style="border-radius:.60rem;">


                    <div class="row">
                            <div class="col-sm-6 left-side">
                          
                                <a href="<?= LANG_URL . '/' . $article['url'] ?>">
                                    <img src="<?= base_url('attachments/shop_images/' . $article['image']) ?>" class="img-responsive" alt="">
                                </a>
                            </div>
                            <div class="col-sm-6 right-side">
                                <h3 class="text-right">
                                    <a href="<?= LANG_URL . '/' . $article['url'] ?>">
                                        <?= character_limiter($article['title'], 100) ?>
                                    </a>
                                </h3>
                                <div class="description text-right">
                                    <?= character_limiter(strip_tags($article['basic_description']), 150) ?>
                                </div>
                                <div class="price text-right"><?= $article['price'] . CURRENCY ?></div>
                                <div class="xs-center">
                                    <?php if ($hideBuyButtonsOfOutOfStock == 0 || (int)$article['quantity'] > 0) { ?>
                                    <a class="option add-to-cart" data-goto="<?= base_url('checkout') ?>" href="javascript:void(0);" data-id="<?= $article['id'] ?>">
                                        <img src="<?= base_url('template/imgs/shopping-cart-icon-515.png') ?>" alt="">
                                        <?= lang('buy_now') ?>
                                    </a>
                                    <?php } ?>
                                    <a class="option right-5" href="<?= LANG_URL . '/' . $article['url'] ?>">
                                        <img src="<?= base_url('template/imgs/info.png') ?>" alt="">
                                        <?= lang('details') ?>
                                    </a>
                                </div>
                            </div>
                        </div>