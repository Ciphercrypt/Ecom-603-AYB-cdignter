
    <div class="row">
        <div class="col-md-4">
        <div class="card shadow-lg mb-2 text-center">
            <div class="card-body">
                <img src="" alt="" width=75 height=75 class="img-fluid">
                <h4 class="card-title"><b>   <a  class="stretched-link" href="<?= $article['vendor_url'] == null ? LANG_URL . '/' . $article['url'] : LANG_URL . '/' . $article['vendor_url'] . '/' . $article['url'] ?>"><?= character_limiter($article['title'], 70) ?></a></b></h4>
                <?php
                    if ($article['old_price'] != '' && $article['old_price'] != 0 && $article['price'] != '' && $article['price'] != 0) {
                        $percent_friendly = number_format((($article['old_price'] - $article['price']) / $article['old_price']) * 100) . '%';
                        if (($article['old_price'] - $article['price'])>0){           
                ?>
                <div>
                    <span><s>  <?= CURRENCY ?> <span><?= $article['old_price'] != '' ? number_format($article['old_price'], 0)  : 0 ?></s></span>  
                </div>
                <div>
                    <h5 align="left" class="text-justify font-weight-bold badge badge-success" style="font-size: 20px;" > <span ><b> <?= CURRENCY ?> <?= $article['price'] != '' ? number_format($article['price'], 0) : 0 ?> </b> <span class="badge badge-success" style="background-color:orange ; color:black;"><b><?= $percent_friendly ?> OFF !</b></span></span></h5>
                </div>
                
                <?php }
                else { ?>
                    <div align="center">
                        <h5 class="text-justify font-weight-bold badge badge-success" style="font-size: 20px;" > <span align="center"><b> <?= CURRENCY ?> <?= $article['price'] != '' ? number_format($article['price'], 0) : 0 ?> </b> </span></h5>
                    </div>
                <?php   }
                } ?>

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
                    <a href="<?= $article['vendor_url'] == null ? LANG_URL . '/' . $article['url'] : LANG_URL . '/' . $article['vendor_url'] . '/' . $article['url'] ?>" class="info-btn gradient-color">
                        <span class="text-justify  badge badge-success" style="background-color: slateblue;"><u><span class="glyphicon glyphicon-info-sign"></span> <?= lang('info_product_list') ?></u> </span>
                    </a>
                <?php } 
                if (self::$CI->load->get_var('hideBuyButtonsOfOutOfStock') == 0 || (int)$article['quantity'] > 0) {
                    $hasRefresh = false;
                    if(self::$CI->load->get_var('refreshAfterAddToCart') == 1) {
                        $hasRefresh = true;
                    }
                ?>
                <div class="add-to-cart " align="center">
                    <div class="btn btn-warning">
                    <span> <a href="javascript:void(0);" class=" btn btn-warning add-to-cart btn-add  <?= $hasRefresh === true ? 'refresh-me' : '' ?>" data-goto="<?= LANG_URL . '/shopping-cart' ?>" data-id="<?= $article['id'] ?>">
                        <img class="loader" src="<?= base_url('assets/imgs/ajax-loader.gif') ?>" alt="Loding">
                        <button class="btn btn-warning ml-2 rounded"><span class="glyphicon glyphicon-shopping-cart"></span> <?= lang('add_to_cart') ?></button> 
                    </a>
                    </span>
                    </div>
                </div>
                    

                    <div class="add-to-cart " align="center">
                    <div class="btn btn-success">
                    <span> <a href="javascript:void(0);" class=" btn-add btn-success add-to-cart" data-goto="<?= LANG_URL . '/checkout' ?>" data-id="<?= $article['id'] ?>">
                        <img class="loader" src="<?= base_url('assets/imgs/ajax-loader.gif') ?>" alt="Loding">
                        <span class="btn btn-success ml-2 rounded"><span class="glyphicon glyphicon-flash"></span> <?= lang('buy_now') ?></span>
                    </a></span>
                </div>
                </div>
                <?php } else { ?>
                <div>
                    <div class="add-to-cart " align="center">
                    <div class="btn btn-secondary" style="background-color:gray;">
                    <span> <span  style="background-color:black;" class=" btn btn-secondary add-to-cart btn-add  " >
                        <button class="btn btn-secondary ml-2 rounded" style="background-color:gray;"><span class="glyphicon glyphicon-shopping-cart"  disabled></span> <s> <?= lang('add_to_cart') ?></s></button> 
                    </span>
                    </span>
                    </div>
                </div>

                <div class="add-to-cart " align="center">
                    <div class="btn btn-secondary" style="background-color:gray;">
                    <span> <span href="" class=" btn-add btn-secondary add-to-cart" style="background-color:black;">
                        <button class="btn btn-secondary ml-2 rounded" style="background-color:gray;" disabled><span class="glyphicon glyphicon-flash"></span> <s> <?= lang('buy_now') ?></s></button>
                    </span></span>
                </div>
                </div>
                    
                </div>
                <?php } ?>

               
            </div>
        </div>
        </div>
    </div>



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
                                <a href="<?= $article['vendor_url'] == null ? LANG_URL . '/' . $article['url'] : LANG_URL . '/' . $article['vendor_url'] . '/' . $article['url'] ?>" class="info-btn gradient-color">
                                    <span class="text-justify  badge badge-success" style="background-color: slateblue;"><u><span class="glyphicon glyphicon-info-sign"></span> <?= lang('info_product_list') ?></u> </span>
                                </a>
                            <?php } 
                            if (self::$CI->load->get_var('hideBuyButtonsOfOutOfStock') == 0 || (int)$article['quantity'] > 0) {
                                $hasRefresh = false;
                                if(self::$CI->load->get_var('refreshAfterAddToCart') == 1) {
                                    $hasRefresh = true;
                                }
                            ?>
                            <div class="add-to-cart " align="center">
                                <div class="btn btn-warning">
                               <span> <a href="javascript:void(0);" class=" btn btn-warning add-to-cart btn-add  <?= $hasRefresh === true ? 'refresh-me' : '' ?>" data-goto="<?= LANG_URL . '/shopping-cart' ?>" data-id="<?= $article['id'] ?>">
                                    <img class="loader" src="<?= base_url('assets/imgs/ajax-loader.gif') ?>" alt="Loding">
                                    <button class="btn btn-warning ml-2 rounded"><span class="glyphicon glyphicon-shopping-cart"></span> <?= lang('add_to_cart') ?></button> 
                                </a>
                              </span>
                              </div>
                            </div>
                              

                              <div class="add-to-cart " align="center">
                                <div class="btn btn-success">
                                <span> <a href="javascript:void(0);" class=" btn-add btn-success add-to-cart" data-goto="<?= LANG_URL . '/checkout' ?>" data-id="<?= $article['id'] ?>">
                                    <img class="loader" src="<?= base_url('assets/imgs/ajax-loader.gif') ?>" alt="Loding">
                                    <span class="btn btn-success ml-2 rounded"><span class="glyphicon glyphicon-flash"></span> <?= lang('buy_now') ?></span>
                                </a></span>
                            </div>
                            </div>
                            

                            <?php } else { ?>
                            <div>
                                <div class="add-to-cart " align="center">
                                <div class="btn btn-secondary" style="background-color:gray;">
                               <span> <span  style="background-color:black;" class=" btn btn-secondary add-to-cart btn-add  " >
                                    <button class="btn btn-secondary ml-2 rounded" style="background-color:gray;"><span class="glyphicon glyphicon-shopping-cart"  disabled></span> <s> <?= lang('add_to_cart') ?></s></button> 
                                </span>
                              </span>
                              </div>
                            </div>

                            <div class="add-to-cart " align="center">
                                <div class="btn btn-secondary" style="background-color:gray;">
                                <span> <span href="" class=" btn-add btn-secondary add-to-cart" style="background-color:black;">
                                    <button class="btn btn-secondary ml-2 rounded" style="background-color:gray;" disabled><span class="glyphicon glyphicon-flash"></span> <s> <?= lang('buy_now') ?></s></button>
                                </span></span>
                            </div>
                            </div>
                              
                            </div>
                            <?php } ?>