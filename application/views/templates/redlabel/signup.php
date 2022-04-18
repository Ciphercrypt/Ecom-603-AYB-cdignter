<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data= $this->Public_model->getCoddetails();

?>
 <div class="inner-nav">

    <div class="container">
        <a href="<?= LANG_URL ?>" class="btn btn-info"><?= lang('home') ?></a> <span class="active"> 
        <span ><i class="glyphicon glyphicon-arrow-left"></i></span>
        <?= lang('user_login') ?></span>
</div>
</div>
<div class="container user-page">
<div class="row">
<div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
<div class="loginmodal-container">
<div class="row ">
                <div class="col "><hr style="height:2px;border-width:0;color:gray;background-color:gray"></div>
                <div class="col-auto" align="center"><h4><b><?= lang('user_register') ?></b></h4></div>
                <div class="col"><hr style="height:2px;border-width:0;color:gray;background-color:gray"></div>
        <form method="POST" action="">


                <div class="input-group" style="padding:2px 2px;" >
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input  type="text" class="form-control" name="name" placeholder="Name" required>
                </div>
                <div class="input-group" style="padding:2px 2px;">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input  type="tel" class="form-control" name="phone" placeholder="Phone" required>
                </div>
                <div class="input-group" style="padding:2px 2px;" >
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input  type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                
                <div class="form-group" style="padding:2px 2px;">
                    <span  class="glyphicon glyphicon-map-marker"><label for="citydrop">city</label></span>
                        <select  class="form-control" id="citydrop" name="city" required>
                        <php  ?>
                        
                        <?php if (!empty($data)) { ?>
                        <option selected disabled>-select city-</option>
                        <?php  
                        for ($x = 0; $x < sizeof($data); $x++) {
                         ?>
                        <option><?php echo  $data[$x]['city'] ;?></option>
                            <?php  }}?>
                        </select>
                </div>

                <div class="input-group" style="padding:2px 2px;" >
                    <span class="input-group-addon"><i class="glyphicon glyphicon-record"></i></span>
                    <input  type="number" class="form-control" name="pincode" placeholder="pincode" required>
                </div>

                <div class="input-group" style="padding:2px 2px;" >
                    <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
                    <textarea  type="text" class="form-control" name="detailed_address" placeholder="Your detailed address ...." required></textarea>
                </div>


                <div class="input-group" style="padding:2px 2px;" >
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input  type="password" class="form-control" name="pass" placeholder="Password" required>
                </div>
                <div class="input-group" style="padding:2px 2px;" >
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input  type="password" class="form-control" name="pass_repeat" placeholder="Confirm password" required>
                </div>
                <div class="col text-center" style="padding:2px 2px;">     
                    <input type="submit" name="signup" class="btn btn-success" value="<?= lang('register_me') ?>">
                    </div>
  


</form>
</div>
</div>
</div>
</div>

234 345 123
