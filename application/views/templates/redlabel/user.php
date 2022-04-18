<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data= $this->Public_model->getCoddetails();


?>
<div class="inner-nav">
    <div class="container">
        <a href="<?= LANG_URL ?>" class="btn btn-info"><?= lang('home') ?></a> <span class="active"> 
        <span ><i class="glyphicon glyphicon-arrow-left"></i></span>
 Profile</span>
    </div>
</div>

<div class="container user-page">
    <div class="row">
        <div class="col-sm-4">
            <div class="loginmodal-container">
                <div class="row ">
                <div class="col "><hr style="height:2px;border-width:0;color:gray;background-color:gray"></div>
                <div class="col-auto" align="center"><h4><b><?= lang('my_acc') ?></b></h4></div>
                <div class="col"><hr style="height:2px;border-width:0;color:gray;background-color:gray"></div>
            </div>
                            
                <form method="POST" action="">
                <div >
                <img src="<?= base_url('attachments/shop_images/single_user.png') ?> " class="img-circle img-responsive center-block" alt="user image">

                </div>
                    




                    <div class="input-group"  >
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <span   class="form-control" ><?=lang('name')?>:<?= $userInfo['name'] ?></span>
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <span  class="form-control"  ><?=lang('phone')?>: <?= $userInfo['phone'] ?> </span>
                </div>
                <div class="input-group"  >
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <span   class="form-control"  ><?=lang('email')?>: <?= $userInfo['email'] ?> </span>

                </div>
                <div class="input-group"  >
                    <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                    <span   class="form-control"  ><?=lang('city')?>: <?= $userInfo['city'] ?></span>

                </div>
                <div class="input-group"  >
                    <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
                    <span   class="form-control"  ><?=lang('address')?>: <?= $userInfo['detailed_address'] ?></span>

                </div>
                <div class="input-group"  >
                    <span class="input-group-addon"><i class="glyphicon glyphicon-record"></i></span>
                    <span   class="form-control"  >Pincode: <?= $userInfo['pincode'] ?></span>

                </div>
                <div class="col text-center">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"> <?=lang('update_user')?></button>
                </div>
                </form>
            </div>
        </div>
        

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><?=lang('update_user')?></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form method="POST" action="">
                <div >
                <img src="<?= base_url('attachments/shop_images/single_user.png') ?> " class="img-circle img-responsive center-block" alt="user image">

                </div>
                    




                <div class="input-group"  >
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input  type="text" class="form-control" name="name" value="<?= $userInfo['name'] ?>" required>
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input  type="tel" class="form-control" name="phone" value="<?= $userInfo['phone'] ?>" required>
                </div>
                <div class="input-group"  >
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input  type="email" class="form-control" name="email" value="<?= $userInfo['email'] ?>" readonly>
                </div>
                <div class="form-group" style="padding:2px 2px;">
                    <span  class="glyphicon glyphicon-map-marker"><label for="citydrop"><?=lang('city')?>(<?=lang('incasecity')?>)</label></span>
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

                <div class="input-group"  >
                    <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
                    <textarea  type="text" class="form-control" name="detailed_address"   required ><?= $userInfo['detailed_address'] ?></textarea>
                </div>
                <div class="input-group"  >
                    <span class="input-group-addon"><i class="glyphicon glyphicon-record"></i></span>
                    <input  type="number" class="form-control" name="pincode" placeholder="pincode:" value="<?= $userInfo['pincode'] ?>" required>
                </div>
                <div class="input-group"  >
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input  type="password" class="form-control" name="pass" placeholder="Password (leave blank if no change)" >
                </div>
                <div class="col text-center">
                <input type="submit" name="update" class="btn btn-primary" value="<?= lang('update') ?>">

                </div>
                </form>      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
        <div class="col-sm-8">
            <?= lang('user_order_history') ?>
            <div class="">
                <table class="table table-condensed table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col"><?= lang('usr_order_id') ?></th>
                            <th scope="col"><?= lang('usr_order_date') ?></th>
                            <th scope="col"><?= lang('user_order_products') ?></th>
                            <th scope="col">Order status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($orders_history)) {
                            foreach ($orders_history as $order) {
                                ?>
                                <tr>
                                    <td scope="row"><?= $order['order_id'] ?></td>
                                    <td><?= date('d.m.Y', $order['date']) ?></td>
                                    <td>    
                                        <?php
                                        $arr_products = unserialize($order['products']);
                                        foreach ($arr_products as $product) {
                                            ?>
                                            <div style="word-break: break-all;">
                                                <div>
                                                    <img src="<?= base_url('attachments/shop_images/' . $product['product_info']['image']) ?>" alt="Product" style="width:200px; margin-right:10px;" class="img-responsive">
                                                </div> 
                                                <div style=" background-color: #f1f1f1; border-radius: 2px; padding: 2px 5px;"><b><?= lang('user_order_quantity') ?></b> <?= $product['product_quantity']; ?></div>

                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                                                                Know more
                                                </button>
                                                <div class="clearfix"></div>
                                            </div>
                                            <hr>
                                        <?php }
                                        ?>
                                    </td>
                                    <td><?php if ($order['processed']==1){
                                        ?>
                                        <div class="progress" >
                                        <div class="progress-bar " role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="background-color:red;" align="center"><label class="badge badge-primary">rejected</label></div>
                                        </div>
                                 <?php   }  if($order['processed']==2){
                                     ?>
                                     <div class="progress" style="color:red;">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50% ;color:red;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><label class="badge badge-primary" style="color:red;">confirmed</label></div>
                                    </div>
                                    <?php
                                      }  if($order['processed']==3){
                                          ?>
                                          <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">Processing</div>
                                        </div>

                                      <?php   }   if($order['processed']==4){
                                          ?>
                                          <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Completed</div>
                                        </div>
                                  <?php    }  if($order['processed']==0){ ?>
                                    <div class="progress">
                                    <div class="progress-bar bg-default" role="progressbar" style="width: 100%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">order arrived</div>
                                    </div>  
                               <?php   } ?>
                                  </td>
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="5"><?= lang('usr_no_orders') ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?= $links_pagination ?>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Scroll down</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="embed-responsive embed-responsive-4by3">
          <iframe class="embed-responsive-item" src="<?= base_url($product['product_info']['url']) ?>"></iframe>
            </div> 
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>