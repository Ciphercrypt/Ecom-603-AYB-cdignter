<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data= $this->Public_model->getSubscriptiondetails(); 

?>

<div class="container" id="view-product">
    <div class="row">
        <div class="col-sm-4">
            <div  style="margin-bottom:20px;">
                <img id="homeimg" src="<?= base_url('/attachments/site_logo/imagefordudhai.jpg') ?>" style="width:auto; height:auto;" data-num="0" class="img-responsive img-sl the-image" alt="Dudhai milk">
            </div>
        
          
        </div>        

        <div class="col-sm-8">
        <div class="col "><hr style="height:1px;border-width:0;color:gray;background-color:green"></div>
        <h2 class="lead " align="left"><span  style="font-family:helvetica; font-size:23px; margin-left:2px;" >दुधाई मासिक सदस्यता </span> <a href="<?= base_url('/assets/Dairy/index.php') ?>" target="_self"><kbd style="background-color:white; border-style:solid;border-size:1px;border-color:green;"><small><img src="<?= base_url('assets/imgs/dudhaiim.png') ?>" alt="dudhai"> verified!<img src="<?= base_url('assets/imgs/verify.png') ?>" alt="verified"></small></kbd></a></h2>
        <div class="col"><hr style="height:1px;border-width:0;color:gray;background-color:green;"></div>
        
       
            
            
           
           <!--  <div class="row row-info">
                <div class="col-sm-6"></div>
                <div class="col-sm-6 manage-buttons">
                   <?php if (true) { ?>
                        

                            <div class="btn btn-toolbar "  >
                                <div class=""  style="display:inline; ">
                                    <div class="btn btn-warning d-inline"  style="display:inline;margin-right:20px; margin-top: 20px;height:60px;">
                                    <span> <a href="javascript:void(0);" class=" btn btn-warning add-to-cart btn-add  ">
                                            <button class="btn btn-warning ml-2 rounded"><span class="glyphicon glyphicon-shopping-cart"></span> <?= lang('add_to_cart') ?></button> 
                                        </a>
                                    </span>
                                </div>
                            </div>

                              <div class="" style="display:inline;" >
                                <div class="btn btn-success "  style="display:inline; margin-top: 20px; height:60px;">
                                <span> <a href="javascript:void(0);" class=" btn-add btn-success add-to-cart" >
                                    <span class="btn btn-success ml-2 rounded"><span class="glyphicon glyphicon-flash"></span> <?= lang('buy_now') ?></span>
                                </a></span>
                            </div>
                            </div>
                            </div>
                    </div>
                    <?php } else { ?>

                    <?php } ?> 
                </div>
            </div>-->
            <div class="row row-info" align="left">  

            </div>
            <div id="description" align="left">
             <div style="padding:10px;"><b><?=lang('monthlyformdesc')?>.</b> </span>
            </div>
        </div>
    </div>
    <hr>
</div>
<div class="col"><hr style="height:1px;border-width:0;color:gray;background-color:green;"></div>

  <?php foreach ($data as $article) {
                    
                    ?> <a data-toggle="modal" data-target="#myModal<?=$article['id']?>">
                    <div class="card" style="width: 20rem; text-align:center;display:inline-block;margin-top:20px; background-color:white;margin:20px 20px;">
                    <?php if(strtolower($article['milk_type'])=="cow") {?>
                    <img class="card-img-top" src="<?= base_url('/attachments/site_logo/cow_image.jpg') ?>" alt="Card image cap" height="200" width="200" style="border-radius:.60rem;"> 
                    <?php } else if(strtolower($article['milk_type'])=="buffalo") {?>
                    <img class="card-img-top" src="<?= base_url('/attachments/site_logo/buff_image.jpg') ?>" alt="Card image cap" height="200" width="200" style="border-radius:.60rem;"> 
                    <?php } else if(strtolower($article['milk_type'])=="goat"){?>
                    <img class="card-img-top" src="<?= base_url('/attachments/site_logo/goat_image.jpg') ?>" alt="Card image cap" height="200" width="200" style="border-radius:.60rem;"> 
                    <?php }?>

                    <div class="card-block">
                    <?php 
                   if (true) {
                    if (true){ ?>
                        <h4 class="position-static" style="color:slateblue;">&nbsp<b><?=$article['quantity']?>&nbspलिटर</b></h4>
                            <?php } else   if(true) {?>

                     
                            <h4 class="position-static" style="color:slateblue;"> <s style="color:black;">₹<?=$article['rate_month']?></s>&nbsp₹<b><?=$article['rate_day']?></b><sup><span class="badge badge-success" style="background-color:green ; color:black;"><b></span></b></sup></h4>

                        <?php } } ?>
                        <div width="15px" height="10px">
                        <?php if (strtolower($article['milk_type'])=="cow"){?>
                        <p class="card-text" style="overflow:hidden; max-height:100%; max-width:100%;"><b>गाईचे दूध </b></p> </div>
                        <?php } else if (strtolower($article['milk_type'])=="buffalo"){?>
                        <p class="card-text" style="overflow:hidden; max-height:100%; max-width:100%;"><b>म्हशीचे दूध</b> </p> </div>
                        <?php } else if(strtolower($article['milk_type'])=="goat"){?>
                        <p class="card-text" style="overflow:hidden; max-height:100%; max-width:100%;"><b>शेळीचे दूध</b> </p> </div>
                            <?php } ?>
                        </a>
                       <div style="color:green; " align="center"> <a  href="javascript:void(0);" class=" btn-add btn-success " ><button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal<?=$article['id']?>"><b style="color:black;">अधिक जाणून घ्या</b> <span class="glyphicon glyphicon-info-sign"></span></button>
                      </a> </div>
                      <div id="myModal<?=$article['id']?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><b style="color:black;">दुधाई मासिक सदस्यता</b></h4>
                            </div>
                            <div class="modal-body">
                                <p>
                                <?php if (strtolower($article['milk_type'])=="cow"){?>
                                    <p  style="color:green;"><b>दुधाई मासिक सदस्यते अंतर्गत  <b style="color:red; font-size:16px;">गाईचे <?=$article['quantity']?> लिटर दूध </b>
                                    मिळवा फक्त <i style="font-size:18px;color:black;"> <?= $article['rate_day'] ?> रुपयांत </i> , ते हि घरपोच . आपण खाली दिलेल्या बटन वर  क्लिक करून दुधाई चे मासिक सभासद होऊ शकता . आम्ही लगेच च तुम्हाला  संपर्क करू . 
                                    </b></p> 
                                    <?php } else if (strtolower($article['milk_type'])=="buffalo"){?>
                                    <p  style="color:green;"><b>दुधाई मासिक सदस्यते अंतर्गत  <b style="color:red;font-size:16px;">म्हशीचे <?=$article['quantity']?> लिटर दूध</b> 
                                    मिळवा फक्त <i style="font-size:18px;color:black;"><?= $article['rate_day'] ?>  रुपयांत </i>, ते हि घरपोच . आपण खाली दिलेल्या बटन वर  क्लिक करून दुधाई चे मासिक सभासद होऊ शकता . आम्ही लगेच च तुम्हाला  संपर्क करू . </b></p> 
                                    <?php } else if(strtolower($article['milk_type'])=="goat"){?>
                                    <p style="color:green;"><b>दुधाई मासिक सदस्यते अंतर्गत  <b style="color:red;font-size:16px;">शेळीचे <?=$article['quantity']?> लिटर दूध</b>
                                    मिळवा फक्त  <i style="font-size:18px;color:black;"><?= $article['rate_day'] ?>  रुपयांत </i>, ते हि घरपोच . आपण खाली दिलेल्या बटन वर  क्लिक करून दुधाई चे मासिक सभासद होऊ शकता . आम्ही लगेच च तुम्हाला  संपर्क करू .</b>  </p>
                                        <?php } ?></p>

                                <form action="<?=base_url()?>Subform/getUserresponse" method=POST>
                                <input type="hidden" name="id" value="<?=$article['id']?>">
                                <button class="btn btn-info"type="submit" ><b style=" color:black;"><span class="glyphicon glyphicon-fire"></span> दुधाई चे मासिक सभासद व्हा !</b></button>
                                </form>


                            </div>
                            <div class="modal-footer">
                            </div>
                            </div>

                        </div>
                        </div>
                    </div>
                    </div>
                    <?php
                    
                }?>


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




<div class="modal fade" id="am23412434" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><b>सदस्यता विनंती यशस्वी</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      आपली सदस्यता विनंती यशस्वीरीत्या नोंदली गेली आहे . आम्ही लवकर च तुम्हाला संपर्क करू.😇 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php if(isset($statinfo)){
 if ($statinfo=="avi"){
    ?> 
    <script>
    $(document).ready(function(){
        $("#am23412434").modal('show');
    });
</script>
    <?php
} }?>
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