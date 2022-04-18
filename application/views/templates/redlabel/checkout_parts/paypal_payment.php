<?php
defined('BASEPATH') OR exit('No direct script access allowed');


?>
<div class="container">
    <?php
    $sandbox = '.';
    if ($paypal_sandbox == 1) {
        $sandbox = '.sandbox.';
    }
    if (!empty($cartItems['array'])) {
        if (isset($_SESSION['order_id']) && isset($_SESSION['final_amount'])) {            
        
        ?>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <img src="<?= base_url('template/imgs/paypal.png') ?>" class="img-responsive paypal-image">
            </div>
        </div>
        <div class="alert alert-info text-center"><?= lang('you_choose_paypal') ?></div>
        <hr>


        <form method="post" action="<?=base_url()?>Checkout/paytm_process" class="paypal-form text-center">
		<table border="1">
			<tbody>
				<tr>
					<th>S.No</th>
					<th>Label</th>
					<th>Value</th>
				</tr>
				<tr>
					<td>1</td>
					<td><label>ORDER_ID::*</label></td>
					<td><input id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?= $_SESSION['order_id'] ?>">
					</td>
				</tr>
				<tr>
					<td>2</td>
					<td><label>CUSTID ::*</label></td>
					<td><input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?= $_SESSION['logged_user'] ?>"></td>
				</tr>
				<tr>
					<td>3</td>
					<td><label>INDUSTRY_TYPE_ID ::*</label></td>
					<td><input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail"></td>
				</tr>
				<tr>
					<td>4</td>
					<td><label>Channel ::*</label></td>
					<td><input id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
					</td>
				</tr>
				<tr>
					<td>5</td>
					<td><label>txnAmount*</label></td>
					<td><input title="TXN_AMOUNT" tabindex="10"
						type="text" name="TXN_AMOUNT"
						value="<?= $_SESSION['final_amount'] ?>">
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
				</tr>
			</tbody>
		</table>

            <a href="<?= base_url('checkout/paypal_cancel') ?>" class="btn btn-lg btn-danger btm-10"><?= lang('cancel_payment') ?></a>
            <button type="submit"  onclick="" class="btn btn-lg btn-success btm-10"><?= lang('go_to_paypal') ?> <i class="fa fa-cc-paypal" aria-hidden="true"></i></button>
        </form>
        <?php
    } }else { ?>
        <b> <div class="alert alert-info" style="border-style:solid;border-color:red;background-color:white; color:red;" align="center">Aw,Snap😞! Some error occured, We will investigate it soon!</b></div>
        <a href="<?= base_url() ?>" class="btn btn-lg btn-danger btm-10">Return Home</a>

        
  <?php 
   }
    ?>





</div>