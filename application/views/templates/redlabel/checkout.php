<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?> 
<?php 
     if (isset($_SESSION['logged_user'])) {    
        $data= $this->Public_model->getUserProfileInfo($_SESSION['logged_user']);
        $data1= $this->Public_model->getCoddetails();
        $data2['shippingOrder'] = $this->Home_admin_model->getValueStore('shippingOrder');


              ?>
                   
<div class="container" id="checkout-page">
    <?php

    if ($cartItems['array'] != null) {
        ?>
        <?= purchase_steps(1) ?>
        <div class="row">
            <div class="col-sm-9 left-side">
                <form method="POST" id="goOrder">
                    <div class="title alone">
                        <span><?= lang('checkout') ?></span>
                    </div>
                    
                    <?php
                    if ($this->session->flashdata('submit_error')) {
                        ?>
                        <hr>
                        <div class="alert alert-danger">
                            <h4><span class="glyphicon glyphicon-alert"></span> <?= lang('finded_errors') ?></h4>
                            <?php
                            foreach ($this->session->flashdata('submit_error') as $error) {
                                echo $error . '<br>';
                            }
                            ?>
                        </div>
                        <hr>
                        <?php
                    }
                    ?>
                    
                    <div class="row" style="border-style:solid; border-color:black;">
                        <h5>Address details</h5>



                        <div class="input-group"  >
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i><label ><?=lang('name')?></span>
                    <input  type="text" class="form-control" name="first_name" id="firstNameInput" value="<?= $data['name'] ?>" required>
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i><label ><?=lang('phone')?></span>
                    <input  type="tel" class="form-control" name="phone" id="phoneInput" value="<?= $data['phone'] ?>" required>
                </div>
                
                <div class="input-group">
                    <input  type="hidden" class="form-control" name="city"  value="<?= $data['city'] ?>" required>
                </div>
                <div class="form-group" style="padding:2px 2px;">
                    <span  class="glyphicon glyphicon-map-marker"><label for="cityInput"><?=lang('city')?></label></span>
                        <select  class="form-control" id="cityInput"  disabled>
                        <php  ?>
                        
                        <?php if (!empty($data1)) { ?>
                        <option selected disabled><?=$data['city']?> (If you want to change it ,update your profile details!)</option>
                        <?php  
                        for ($x = 0; $x < sizeof($data1); $x++) {
                         ?>
                        <option><?php echo  $data1[$x]['city'] ;?></option>
                            <?php  }}?>
                        </select>
                </div>


                <div class="input-group"  >
                    <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i><label ><?=lang('address')?></span>
                    <textarea  type="text" class="form-control" name="address" id="addressInput"  required ><?= $data['detailed_address'] ?></textarea>
                </div>
                <div class="input-group"  >
                    <span class="input-group-addon"><i class="glyphicon glyphicon-record"></i><label ><?=lang('post_code')?></span>
                    <input  type="number" class="form-control" name="post_code" id="postInput"placeholder="pincode:" value="<?= $data['pincode'] ?>" required>
                </div>

                       
                        <div style="padding:5px 5px;" >
                        <span  class="glyphicon glyphicon-time"><label for="notesInput"><?= lang('notes') ?></label></span>
                        <select  class="selectpicker payment-type" data-style="btn btn-info" id="notesInput" name="notes" >
                        <option value="none" selected   style="color:white;"><b style="color:white"> Select timing </b></option>
                        <option > <b>1. HOME : delivery between 8 am to 8 pm.</b></option>
                        <option ><b>2. OFFICE: delivery between 10 am to 6 pm. </b></option> 
                        </select>
                        </div>
                    <div class="form-group col-sm-6">
                            <input id="lastNameInput" class="form-control" name="last_name" value=" ." type="hidden" placeholder="<?= lang('last_name') ?>">
                        </div>
                        <div class="form-group col-sm-6">
                            <input id="emailAddressInput" class="form-control" name="email" value="<?= $data['email'] ?>" type="hidden" placeholder="<?= lang('email_address') ?>">
                        </div>

                    </div>


                    <?php if ($codeDiscounts == 1) { ?>
                        <div class=" border border-info" style="border-style:double; border-color:slateblue; padding: 10px 10px;">
                            <label><?= lang('discount_code') ?></label>
                            <input class="form-control" name="discountCode" value="<?= @$_POST['discountCode'] ?>" placeholder="<?= lang('enter_discount_code') ?>" type="text">
                            <a href="javascript:void(0);" class="btn btn-primary" onclick="checkDiscountCode()" style="padding:3px 3px;"><?= lang('check_code') ?></a>
                        </div>
                    <?php } ?>
                    <div class="table-responsive" style="padding:15px 15px;">
                        <table class="table table-bordered table-products table-hover table-condensed" >
                            <thead>
                                <tr>
                                    <th scope="col"><?= lang('product') ?></th>
                                    <th scope="col"><?= lang('quantity') ?></th>
                                    <th scope="col"><?= lang('price') ?></th>
                                    <th scope="col"><?= lang('total') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($cartItems['array'] as $item) { ?>
                                    <tr>
                                        <td class="relative" scope="row">
                                            <input type="hidden" name="id[]" value="<?= $item['id'] ?>">
                                            <input type="hidden" name="quantity[]" value="<?= $item['num_added'] ?>">
                                           <div align="center"> <img class="product-image" src="<?= base_url('/attachments/shop_images/' . $item['image']) ?>" alt="product image"> </div>
                                            <div align="center"><a href="<?= LANG_URL . '/' . $item['url'] ?>" align="center"><?= $item['title'] ?></div>
                                            <a href="<?= base_url('home/removeFromCart?delete-product=' . $item['id'] . '&back-to=checkout') ?>" class="btn btn-xs btn-danger remove-product">
                                                <span class="glyphicon glyphicon-remove"></span>
                                            </a>
                                        </td>
                                        <td scope="row">
                                            <a class="btn btn-xs btn-primary refresh-me add-to-cart <?= $item['quantity'] <= $item['num_added'] ? 'disabled' : '' ?>" data-id="<?= $item['id'] ?>" href="javascript:void(0);">
                                                <span class="glyphicon glyphicon-plus"></span>
                                            </a>
                                            <span class="quantity-num">
                                                <?= $item['num_added'] ?>
                                            </span>
                                            <a class="btn  btn-xs btn-danger" onclick="removeProduct(<?= $item['id'] ?>, true)" href="javascript:void(0);">
                                                <span class="glyphicon glyphicon-minus"></span>
                                            </a>
                                        </td>
                                        <td scope="row"><?= $item['price'] . CURRENCY ?></td>
                                        <td scope="row"><?= $item['sum_price'] . CURRENCY ?></td>
                                    </tr>
                                    </tbody>
                                <?php } ?>

                                <table class="table table-bordered table-hover">
  
                                    <tr>
                                        <td><?= lang('total') ?></td>
                                        <td><?php  $cod_amount=0;
                                 for ($i=1;$i<sizeof($data1);$i++){
                                     if ($data1[$i]['city']=$data['city']){
                                        $cod_amount= $data1[$i]['amount'];
                                         break;
                                     } } 
                                        if ($cartItems['finalSum']<$data2['shippingOrder'] && $cod_amount!=0){
                                           $final_total= $cartItems['finalSum']+$cod_amount ;?>
                                        
                                        <span class="final-amount"><?= $cartItems['finalSum'] ?>+<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModalcheck">
                                        <?=$cod_amount ?>&nbsp<span class="glyphicon glyphicon-info-sign"></span></button></span><?= CURRENCY ?> =<span style="color:slateblue;font-size:20px;font-weight:bold;"><?=$final_total?></span> 
                                        <input type="hidden" class="final-amount" name="final_amount" value="<?= $final_total ?>">
                                        <input type="hidden" name="amount_currency" value="<?= CURRENCY ?>">
                                        <input type="hidden" name="discountAmount" value="">
                                        <?php } else if($cartItems['finalSum']>=$data2['shippingOrder'] && $cod_amount!=0) {?>
                                        <span class="final-amount"><?= $cartItems['finalSum'] ?>+<label class="badge badge success" style="background-color:green;"> free delivery</label>
                                        </span><?= CURRENCY ?> =<span style="color:slateblue;font-size:20px;font-weight:bold;"><?=$cartItems['finalSum']?></span> 
                                        <input type="hidden" class="final-amount" name="final_amount" value="<?=$cartItems['finalSum']  ?>">
                                        <input type="hidden" name="amount_currency" value="<?= CURRENCY ?>">
                                        <input type="hidden" name="discountAmount" value=""> 
                                        <?php }else if ($cod_amount==0){
                                            ?>
                                            <div class="quantity" style="color:red;">
            

            <b> <div class="alert alert-info" style="border-style:solid;border-color:red;background-color:white; color:red;" align="center">We are currently unavailable in your area ,but we will cover you soon!</b></div>

             </div>
                                            <?php }?>
                                            </td>
                                    </tr>
                                    
                                    <table>
                                
                           
                                     </table>
                                     
                    <?php if ($cod_limit > $cartItems['finalSum']) { ?>
                        <div class="quantity" style="color:red;">
            

                   <b> <div class="alert alert-info" style="border-style:solid;border-color:red;background-color:white; color:green;" align="center"><?php echo $cod_limit?>₹&nbsp<?= lang('cod_warning') ?></b></div>

                    </div> <?php
                 } if ($data2['shippingOrder'] > $cartItems['finalSum']){?><div class="quantity" style="color:red;">
                            <b> <div class="alert alert-info" style="border-style:solid;border-color:red;background-color:white; color:green;" align="center"><?php echo $data2['shippingOrder'];?> ₹&nbsp<?= lang('delivery_warning') ?></b></div>
                            </div>
                <div> <?php }?>

                <div class="payment-type-box">
                        <span class="top-header text-center"><?= lang('choose_payment') ?></span>

                        <div class="form-check" name="payment_type">
                            <?php if ($cashondelivery_visibility == 1) { if ($cod_limit<=$cartItems['finalSum']){ ?>
                            <div>
                                <input type="radio" name="payment_type" value="cashOnDelivery" class="form-check-input" id="avi"></input>
                                <label class="form-check-label" for="avi" style="color:slateblue;">Cash On delivery </label>
                                </div>
                            <?php } } if (true) { ?>
                                <div>
                                <input type="radio" name="payment_type" value="PayPal" id="debit" class="form-check-input"></input>
                                <label class="form-check-label" for="debit" style="color:slateblue;"> Debit/credit cards </label></div>
                            <?php } if (true) { ?>
                                <div>
                                <input type="radio" name="payment_type" id="upi" value="Bank" class="form-check-input"></input>
                                <label class="form-check-label" for="upi" style="color:slateblue;">Phone pay/Google pay/BHIM UPI </label></div>

                            <?php } ?>
                        </div>
                        <span class="top-header text-center"><?= lang('choose_payment') ?></span>
                    </div>
                    </div>
              </form>  


                
                    <a href="<?= LANG_URL ?>" class="btn btn-primary go-shop">
                        <span class="glyphicon glyphicon-circle-arrow-left"></span>
                        <?= lang('back_to_shop') ?>
                    </a>
                    <a href="javascript:void(0);" class="btn btn-primary go-order" onclick="document.getElementById('goOrder').submit();" class="pull-left">
                        <?= lang('custom_order') ?> 
                        <span class="glyphicon glyphicon-circle-arrow-right"></span>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>


            
            
        </div>
    </div>
<?php } else { ?>
    <div class="alert alert-info"><?= lang('no_products_in_cart') ?></div>
    <?php
}
if ($this->session->flashdata('deleted')) {
    ?>
    <script>
        $(document).ready(function () {
            ShowNotificator('alert-info', '<?= $this->session->flashdata('deleted') ?>');
        });
    </script>
<?php } if ($codeDiscounts == 1 && isset($_POST['discountCode'])) { ?>
    <script>
        $(document).ready(function () {
            checkDiscountCode();
        });
    </script>
<?php } ?>
<?php 
     }
     else{ ?>
        <div class="alert alert-danger " align='center'><?= lang('login_not_found') ?></div>
        <div>
        <div class="container">
                <div class="row">
                      <div class="col text-center">

                    <a href="<?= LANG_URL . '/login' ?>" class=" btn btn-primary btn-lg active " role="button" aria-pressed="true" ><?= lang('login') ?></a>
                    <a href="<?= LANG_URL . '/register' ?>" class="btn btn-info btn-lg active align-self-center" role="button" aria-pressed="true" ><?= lang('register') ?></a>
            </div>

        </div>
  </div>
</div>

        <?php
    }
?> 
  
  <div class="modal" id="myModalcheck">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Delivery tax information</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <?=lang('why_cod_warning') ?>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>