<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(isset($_SESSION['logged_user'])){
    $userInfo= $this->Public_model->getUserProfileInfo($_SESSION['logged_user']);

?>

<div class="container" id="view-product">
    <div class="row">
        <div class="col-sm-4">
            <div style="margin-bottom:20px;">

            <?php if(strtolower($data[0]['milk_type'])=="cow") {?>
                <img src="<?= base_url('/attachments/site_logo/cow_image.jpg') ?>" style="width:auto; height:auto;" data-num="0" class="img-responsive img-sl the-image" alt="<?= str_replace('"', "'", $data[0]['milk_type']) ?>">
                    <?php } else if(strtolower($data[0]['milk_type'])=="buffalo") {?>
                        <img src="<?= base_url('/attachments/site_logo/buff_image.jpg')?>" style="width:auto; height:auto;" data-num="0" class="img-responsive img-sl the-image" alt="<?= str_replace('"', "'", $data[0]['milk_type']) ?>">
                    <?php } else if(strtolower($data[0]['milk_type'])=="goat"){?>
                        <img src="<?= base_url('/attachments/site_logo/goat_image.jpg') ?>" style="width:auto; height:auto;" data-num="0" class="img-responsive img-sl the-image" alt="<?= str_replace('"', "'", $data[0]['milk_type']) ?>">
                    <?php }?>






            </div>
            
        </div>        

        <div class="col-sm-8">
        <div class="col "><hr style="height:1px;border-width:0;color:gray;background-color:green"></div>
        <?php $avi="";
              if (strtolower($data[0]['milk_type'])=="cow"){
                        $avi= "चे गाईचे दूध";
                         } else if (strtolower($data[0]['milk_type'])=="buffalo"){
                            $avi= "चे म्हशीचे दूध";
                         } else if(strtolower($data[0]['milk_type'])=="goat"){
                            $avi= "चे शेळीचे दूध";
                         }?>
                         
        <h2 class="lead " align="left"><span  style="font-family:helvetica; font-size:23px; margin-left:2px;" ><img src="<?= base_url('assets/imgs/dudhaiim.png') ?>" alt="dudhai">&nbsp<b><?= $avi ?> (<?=$data[0]['quantity'] ?> लिटर) </b> </span> </h2>
        <div class="col"><hr style="height:1px;border-width:0;color:gray;background-color:green;"></div>
        <?php if (true){ 

            $percent_friendly = number_format((((30* $data[0]['rate_day']) -$data[0]['rate_pay_now']  )/ (30* $data[0]['rate_day']))* 100) . '%';

            ?>
           <div> <span style="font-size:17px;"><b>आता संपूर्ण महिण्यासाठी रोज घरपोच दूध  मिळवा फक्त </b> <s>  <?= CURRENCY ?> <span><b style="color:slateblue;"> 30 X <?=$data[0]['rate_day']?>=<?= (30* $data[0]['rate_day']) != '' ?  number_format((30* $data[0]['rate_day']), 0)  : 0 ?></b></s></span>  
           <h5 align="left" class="font-weight-bold text-info" style="font-size: 25px;" > <span ><b> <?= CURRENCY ?> <?= $data[0]['rate_pay_now'] != '' ? number_format($data[0]['rate_pay_now'], 0) : 0 ?>  मध्ये </b><sup> <span class="badge badge-success" style="background-color:green ; color:white;"><b><?= $percent_friendly ?> सूट  !</b></span></sup></span></h5>
        </div>
        <div>
        
        <div class="quantity" >
        <b> <div class="alert alert-info" style="border-style:solid;border-color:red;background-color:white; color:green;" align="center">तुम्ही महिन्याच्या  सुरुवातीला किंवा शेवटी  हि बिलाचा भरणा करू शकता . आत्ताच पेमेंट   करून मासिक  सदस्यत्व मिळवा  फक्त <b style="color:black;"> <?= $data[0]['rate_pay_now']?> </b>रुपयांत ! 🥰</b></div>
        </div>
    
       
                <div align="left">
                <b> <div class="alert alert-info" style="border-style:solid;border-color:blue;background-color:white; color:green;" align="center">महिन्याच्या शेवटी  पेमेंट   करून मासिक  सदस्यत्व मिळवा  फक्त     <b style="color:black;"><?= $data[0]['rate_month']?> </b> रुपयांत ! 🥰</b></div>
                   
                </div>
                <?php if ( $userInfo['subscribed']!=1){ ?>
                <button type="button" class="btn btn-info btn-lg btn-block" data-toggle="modal" data-target="#avi987676"><span style="color:black;"><b>दुधाई  चे सदस्य व्हा </b> </span></button>
                    <?php } else{?>
                        <b> <div class="alert alert-info" style="border-style:solid;border-color:black;background-color:white; color:orange;" align="center">तुम्ही या आधीच दुधाई चे सदस्य आहात . जर तुम्हाला तुमचा प्लॅन बदलायचा असेल तर आमच्या डिलिव्हरी बॉय किंवा दुधाई शी  Whatsapp  वर संपर्क साधा. Whatsapp  वर संपर्क करण्यासाठी खालील बटनावर क्लिक करा . <br>
                        <a href="https://api.whatsapp.com/send?phone=919689303602&text=Hi%20%E0%A4%A6%E0%A5%81%E0%A4%A7%E0%A4%BE%E0%A4%88%20,%20%E0%A4%AE%E0%A4%B2%E0%A4%BE%20%E0%A4%AE%E0%A4%BE%E0%A4%9D%E0%A4%BE%20%E0%A4%AE%E0%A4%BE%E0%A4%B8%E0%A4%BF%E0%A4%95%20%E0%A4%AA%E0%A5%8D%E0%A4%B2%E0%A5%85%E0%A4%A8%20%E0%A4%AC%E0%A4%A6%E0%A4%B2%E0%A4%BE%E0%A4%AF%E0%A4%9A%E0%A4%BE%20%20%E0%A4%86%E0%A4%B9%E0%A5%87%20.%20%E0%A4%AE%E0%A4%BE%E0%A4%9D%E0%A4%BE%20%E0%A4%A8%E0%A4%B5%E0%A5%80%E0%A4%A8%20%E0%A4%AA%E0%A5%8D%E0%A4%B2%E0%A5%85%E0%A4%A8%20%E0%A4%85%E0%A4%B8%E0%A4%BE%20%E0%A4%86%E0%A4%B9%E0%A5%87%20.%20." target="_blank"class="btn btn-success btn-lg btn-block"><span class="fa fa-whatsapp" aria-hidden="true" style="color:black;"><b> Whatsapp  वर संपर्क साधा  </b> </span></a>


                        </b></div>
<?php }?>
            </div>
    
       <?php     } } else { ?>

        <div class="alert alert-danger " align='center'>तुम्हाला हे पेज पाहण्यासाठी लॉगिन करावे लागेल . जर आपण नवीन ग्राहक असल्यास रजिस्टर करा </div>
        <div>
        <div class="container">
                <div class="row">
                      <div class="col text-center">

                    <a href="<?= LANG_URL . '/login' ?>" class=" btn btn-primary btn-lg active " role="button" aria-pressed="true" ><?= lang('login') ?></a>
                    <a href="<?= LANG_URL . '/register' ?>" class="btn btn-info btn-lg active align-self-center" role="button" aria-pressed="true" ><?= lang('register') ?></a>
            </div>

        </div> <?php } ?>
       
     
</div>
<script src="<?= base_url('assets/js/image-preveiw.js') ?>"></script>



<div id="avi987676" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">दुधाई मासिक सभासदत्व</h4>
      </div>
      <div class="modal-body">
      <b> <div class="alert alert-info" style="border-style:solid;border-color:orange;background-color:#120321;font-size:15px; color:white;" align="left"> <span class="glyphicon glyphicon-flash"></span> दुधाई  <?=$avi?>  (<?=$data[0]['quantity'] ?> लिटर) <br>
       <span class="glyphicon glyphicon-flash"></span>  किंमत: <i style="color:green;"> <?=$data[0]['rate_day']?> ₹ </i> &nbspप्रति  <?=$data[0]['quantity'] ?> लिटर<br> 
       <span class="glyphicon glyphicon-flash"></span> <i style="color:green;">  <?=$data[0]['rate_month']?></i> रुपये &nbsp प्रति  महिना <br>
       <span class="glyphicon glyphicon-flash"></span> <i style="color:green;">  <?=$data[0]['rate_pay_now']?> </i>रुपये  &nbspप्रति  महिना (महिन्याच्या सुरुवातीला भरल्यास ) <br></div>

      <p>तुमची संपर्क माहिती :काही बदल  करायचे असल्यास तुम्ही कधीही तुमच्या profile मध्ये जाऊन बदलू शकता.  </p>
        <p><div class="input-group"  >
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <span   class="form-control" ><?=lang('name')?>:<?= $userInfo['name'] ?></span>
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                    <span  class="form-control"  ><?=lang('phone')?>: <?= $userInfo['phone'] ?> </span>
                </div>
                
                <div class="input-group"  >
                    <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                    <span   class="form-control"  ><?=lang('city')?>: <?= $userInfo['city'] ?></span>

                </div>
                <div class="input-group"  >
                    <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
                    <span   class="form-control"  ><?=lang('address')?>: <?= $userInfo['detailed_address'] ?></span>

                </div>
                <form action="<?=base_url()?>Subform/setOrder" method="POST" align="left" style="margin-top:15px;">
                <input type="hidden" name="user_id" value="<?=$_SESSION['logged_user']?>">
                <input type="hidden" name="request_date" value="<?=date("Y-m-d")?>">
                <input type="hidden" name="subscription_id" value="<?=$data[0]['id']?>">
                         
                <button class="btn btn-info btn-block"type="submit" ><b style=" color:black;"><span class="glyphicon glyphicon-fire"></span> सभासद व्हा !</b></button>
                </form>
                
                </p>
      </div>
      <div class="modal-footer">
      <b> <div class="alert alert-info" style="border-style:solid;border-color:black;background-color:ivory; color:green;" align="center">आपली सदस्यतेसाठी ची विनंती ची पुष्टी करण्यासाठी आम्ही तुमच्याशी संपर्क साधू . आपल्या सदस्यते ची पुष्टी झाल्यावर आपल्याला आपल्या प्रोफाइल शेजारी सदस्यतेचा पर्याय दिसेल ,ज्यात तुमच्या सदस्यतेची सगळी माहिती असेल . 😇</b></div>
      </div>
    </div>

  </div>
</div>



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