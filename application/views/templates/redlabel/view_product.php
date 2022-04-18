<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container" id="view-product">
    <div class="row">
        <div class="col-sm-4">
            <div <?= $product['folder'] != null ? 'style="margin-bottom:20px;"' : '' ?>>
                <img id="homeimg" src="<?= base_url('/attachments/shop_images/' . $product['image']) ?>" style="width:auto; height:auto;" data-num="0" class="img-responsive img-sl the-image" alt="<?= str_replace('"', "'", $product['title']) ?>">
            </div>
            <?php
            if ($product['folder'] != null) {
                $dir = "attachments/shop_images/" . $product['folder'] . '/';
                ?>
                <div class="row">
                    <?php
                    if (is_dir($dir)) {
                        if ($dh = opendir($dir)) {
                            $i = 1;
                            while (($file = readdir($dh)) !== false) {
                                if (is_file($dir . $file)) {
                                    ?>
                                    <div class="col-xs-6 col-sm-6 col-md-6 text-center getimg">
                                        <img src="<?= base_url($dir . $file) ?>" data-num="<?= $i ?>" class="other-img-preview img-sl img-responsive img-thumbnail the-image" alt="<?= str_replace('"', "'", $product['title']) ?>">
                                    </div>
                                    <?php
                                    $i++;
                                }
                            }
                            closedir($dh);
                        }
                    }
                    ?>
                </div>
                <?php
            }
            ?>
        </div>        

        <div class="col-sm-8">
        <div class="col "><hr style="height:1px;border-width:0;color:gray;background-color:green"></div>
        <h2 class="lead " align="left"><span  style="font-family:helvetica; font-size:23px; margin-left:2px;" ><?= $product['title'] ?></span> <a href="https://" target="_self"><kbd style="background-color:white; border-style:solid;border-size:1px;border-color:green;"><small><img src="<?= base_url('assets/imgs/dudhaiim.png') ?>" alt="dudhai"> verified!<img src="<?= base_url('assets/imgs/verify.png') ?>" alt="verified"></small></kbd></a></h2>
        <div class="col"><hr style="height:1px;border-width:0;color:gray;background-color:green;"></div>
        <?php if ($product['price']<$product['old_price']){ 

            $percent_friendly = number_format((($product['old_price'] - $product['price']) / $product['old_price']) * 100) . '%';

            ?>
           <div> <span><s>  <?= CURRENCY ?> <span><?= $product['old_price'] != '' ? number_format($product['old_price'], 0)  : 0 ?></s></span>  
           <h5 align="left" class="font-weight-bold text-info" style="font-size: 25px;" > <span ><b> <?= CURRENCY ?> <?= $product['price'] != '' ? number_format($product['price'], 0) : 0 ?> </b><sup> <span class="badge badge-success" style="background-color:green ; color:white;"><b><?= $percent_friendly ?> OFF !</b></span></sup></span></h5>
        </div>
        <div>
        <?php if ($product['quantity']>0){
            ?>
        <div class="quantity" style="color:green; font-family:times new roman;">
        <B align="center"  ><?= lang('in_stock') ?><b>
        </div>
        <?php } else if($product['quantity']<=0) {
            ?>

      <div class="quantity" style="color:red;">
        <B align="center"  ><?= lang('out_of_stock') ?><b>
        </div>
        </div>

        

       <?php  } ?>
       
                <div align="left">
                      <span align="left"> <span><b><?= lang('in_category') ?>:&nbsp     </b></span><span class="badge badge-primary" style="background-color:green;padding:2px;"><a href="javascript:void(0);" class="badge badge-light" data-categorie-id="<?= $product['shop_categorie'] ?>" style="background-color:white;">
                      <i style="font-size:25px;color:blue;padding:10px;">  <?= $product['categorie_name'] ?></i>
                    </a>   </span></span> 
                </div>
            </div>
    
       <?php     }
       
       else  {?>
                <div>
                    <h5 align="left" class="font-weight-bold text-info" style="font-size: 25px;" > <span ><b> <?= CURRENCY ?> <?= $product['price'] != '' ? number_format($product['price'], 0) : 0 ?> </b></span></h5>
                    </div>
                    <div>
                    <?php if ($product['quantity']>0){
                    ?>
                    <div class="quantity" style="color:green; font-family:times new roman;">
                    <B align="center"  ><?= lang('in_stock') ?><b>
                    </div>
                    <?php } else if($product['quantity']<=0) {
                    ?>

                    <div class="quantity" style="color:red;">
                    <B align="center"  ><?= lang('out_of_stock') ?><b>

                    <div class="alert alert-info" style="border-style:solid;border-color:red;background-color:white; color:green;" align="center"><?= lang('out_of_stock_product') ?></div>

                    </div>
                    </div>

                    <?php  }?>
                    
                <div align="left">
                      <span align="left"> <span><b><?= lang('in_category') ?>:&nbsp     </b></span><span class="badge badge-primary" style="background-color:green;padding:2px;"><a href="javascript:void(0);" class="badge badge-light" data-categorie-id="<?= $product['shop_categorie'] ?>" style="background-color:white;">
                      <i style="font-size:25px;color:blue;padding:10px;">  <?= $product['categorie_name'] ?></i>
                    </a>   </span></span> 
                </div>
            </div>
                
                
                
                 <?php       } ?>

            
            
                
            
            <?php if ($publicDateAdded == 1) { ?>

                <div class="col"><hr style="height:1px;border-width:0;color:gray;background-color:blue;"></div>
                <div align="left" style="padding-top:4px;">
                      <span align="left"> <span><b><?= lang('added_on') ?>:&nbsp     </b></span><span class="badge badge-primary" style="background-color:black;padding:2px;"><a href="javascript:void(0);" class="badge badge-light" data-categorie-id="<?= $product['shop_categorie'] ?>" style="background-color:white;">
                      <i style="font-size:15px;color:black;padding:5px;">  <?= date('d M Y', $product['time']) ?></i>
                    </a>   </span></span> 
                </div>


                </div>
                
            <?php } ?>
            
           
            <div class="row row-info">
                <div class="col-sm-6"></div>
                <div class="col-sm-6 manage-buttons">
                    <?php if ($product['quantity'] > 0) { ?>
                        

                            <div class="btn btn-toolbar "  >
                                <div class=""  style="display:inline; ">
                                    <div class="btn btn-warning d-inline"  style="display:inline;margin-right:20px; margin-top: 20px;height:60px;">
                                    <span> <a href="javascript:void(0);" class=" btn btn-warning add-to-cart btn-add  " data-goto="<?= LANG_URL . '/shopping-cart' ?>" data-id="<?= $product['id'] ?>">
                                            <button class="btn btn-warning ml-2 rounded"><span class="glyphicon glyphicon-shopping-cart"></span> <?= lang('add_to_cart') ?></button> 
                                        </a>
                                    </span>
                                </div>
                            </div>

                              <div class="" style="display:inline;" >
                                <div class="btn btn-success "  style="display:inline; margin-top: 20px; height:60px;">
                                <span> <a href="javascript:void(0);" class=" btn-add btn-success add-to-cart" data-goto="<?= LANG_URL . '/checkout' ?>" data-id="<?= $product['id'] ?>">
                                    <span class="btn btn-success ml-2 rounded"><span class="glyphicon glyphicon-flash"></span> <?= lang('buy_now') ?></span>
                                </a></span>
                            </div>
                            </div>
                            </div>
                    </div>
                    <?php } else { ?>

                    <?php } ?>
                </div>
            </div>
            <div class="row row-info" align="left">  
                <div class="col "><hr style="height:1px;border-width:0;color:gray;background-color:gray"></div>
        <h2 class="lead " align="left"><span  style="font-family:helvetica; font-size:20px; margin-left:2px;" >&nbsp&nbsp&nbsp<b><span class="glyphicon glyphicon-cd font-weight-bold" ><?= lang('description') ?></b></span> </h2>
        <div class="col"><hr style="height:1px;border-width:0;color:gray;background-color:gray;"></div>

            </div>
            <div id="description" align="left">
             <div style="padding:10px;"><?= $product['description'] ?></span>
            </div>
        </div>
    </div>
    <div class="row orders-from-category" id="products-side">
    <div class="col "><hr style="height:1px;border-width:0;color:gray;background-color:gray"></div>

        <div class="filter-sidebar">
            <div class="title">
                <span><?= lang('order_from_category') ?></span>
            </div>
        </div>
        <?php
        if (!empty($sameCagegoryProducts)) {
            $load::getProducts($sameCagegoryProducts, 'col-sm-4 col-md-3', false);
        } else {
            ?>
            <div class="alert alert-info"><?= lang('no_same_category_products') ?></div>
            <?php
        }
        ?>
    </div>
</div>
<div id="modalImagePreview" class="modal">
    <div class="image-preview-container">
        <div class="modal-content">
            <div class="inner-prev-container">
                <img id="img01" alt="">
                <span class="close">&times;</span>
                <span class="img-series"></span>
            </div>
        </div>
        <a href="javascript:void(0);" class="inner-next"></a>
        <a href="javascript:void(0);" class="inner-prev"></a>
    </div>
    <div id="caption"></div>
</div>
<script src="<?= base_url('assets/js/image-preveiw.js') ?>"></script>


<!-- Script for images -->

<!-- NOTE : IMAGES ARE MORE THAN 8 please copy content and paste them and make some correction. -->
<script>
   $(document).ready(function(){
    $(function(){
        $(".getimg img").eq(0).on("click",function(){
            //console.log("clicked");
            var src1 = $("#homeimg").attr("src");
            $("#homeimg").attr({
                src:$(this).attr("src"),
            });
            $(".getimg img").eq(0).attr({
                src: src1,
            });
        });

        $(".getimg img").eq(1).on("click",function(){
            //console.log("clicked");
            var src2 = $("#homeimg").attr("src");
            $("#homeimg").attr({
                src:$(this).attr("src"),
            });
            $(".getimg img").eq(1).attr({
                src: src2,
            });
        });

        $(".getimg img").eq(2).on("click",function(){
            //console.log("clicked");
            var src3 = $("#homeimg").attr("src");
            $("#homeimg").attr({
                src:$(this).attr("src"),
            });
            $(".getimg img").eq(2).attr({
                src: src3,
            });
        });

        $(".getimg img").eq(3).on("click",function(){
            //console.log("clicked");
            var src4 = $("#homeimg").attr("src");
            $("#homeimg").attr({
                src:$(this).attr("src"),
            });
            $(".getimg img").eq(3).attr({
                src: src4,
            });
        });

        $(".getimg img").eq(4).on("click",function(){
            //console.log("clicked");
            var src5 = $("#homeimg").attr("src");
            $("#homeimg").attr({
                src:$(this).attr("src"),
            });
            $(".getimg img").eq(4).attr({
                src: src5,
            });
        });

        $(".getimg img").eq(5).on("click",function(){
            //console.log("clicked");
            var src6 = $("#homeimg").attr("src");
            $("#homeimg").attr({
                src:$(this).attr("src"),
            });
            $(".getimg img").eq(5).attr({
                src: src6,
            });
        });

        $(".getimg img").eq(6).on("click",function(){
            //console.log("clicked");
            var src7 = $("#homeimg").attr("src");
            $("#homeimg").attr({
                src:$(this).attr("src"),
            });
            $(".getimg img").eq(6).attr({
                src: src7,
            });
        });

        $(".getimg img").eq(7).on("click",function(){
            //console.log("clicked");
            var src8 = $("#homeimg").attr("src");
            $("#homeimg").attr({
                src:$(this).attr("src"),
            });
            $(".getimg img").eq(7).attr({
                src: src8,
            });
        });

    });
});
</script>