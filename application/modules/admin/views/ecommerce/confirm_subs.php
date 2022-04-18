<?php
//header("Refresh: 90");
?>

<link href="<?= base_url('assets/css/bootstrap-toggle.min.css') ?>" rel="stylesheet">
<h1 style="color:green;">Confirmed orders</h1>
<a href="<?= base_url('admin/subscriptionorders/rejected_orders') ?>" style="margin-left:50px;"  class="btn btn-warning" role="button"><b style="color:black;">Rejected orders</b>
</a>
<a href="<?= base_url('admin/subscriptionorders') ?>" class="btn btn-success " style="margin-left:0px;" role="button"><b style="color:black;">New orders</b>
</a>
<hr>

<?php
if (true) {
    if (!empty($orders)) {
        ?>
        <input type="text" id="myInputconfirm" onkeyup="myFunction()" placeholder="Search for name..">

        <div class="table-responsive">
            <table class="table table-condensed table-bordered table-striped" id="myTablereject">
                <thead>
                    <tr>
                         <th>Name</th>
                        <th>Order ID</th>
                        <th>Request date</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Plan details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($orders as $tr) {
                        $data= $this->Public_model->getUserProfileInfo($tr['user_id']);
                        
                       
                        ?>
                        <tr>

                        <td>
                                <i class="fa fa-user" aria-hidden="true"></i> 
                                <?= $data['name']  ?>
                            </td>
                            <td class="relative" id="order_id-id-<?= $tr['order_id'] ?>">
                                # <?= $tr['order_id'] ?>
                                <?php if ($tr['confirm_status'] == 1) { ?>
                                    <div id="new-order-alert-<?= $tr['order_id'] ?>">
                                        <img src="<?= base_url('assets/imgs/new-blinking.gif') ?>" style="width:100px;" alt="blinking">
                                    </div>
                                <?php } ?>
                                <div >
                                </div>
                                <div class="confirm-result">
                                    <?php if ($tr['confirm_status']  == 1 ) { ?>
                                        <span class="label label-danger">Not Confirmed</span>
                                    <?php } else if ($tr['confirm_status']  == 2  ) { ?> 
                                        <span class="label label-success">Confirmed</span> 
                                    <?php } else if ( $tr['confirm_status']  == 3 ) { ?>
                                        <span class="label label-danger">Rejected</span> 
                                        <?php }?>

                                </div>
                            </td>
                            <td><?= $tr['request_date']; ?></td>
                            
                            <td><i class="fa fa-phone" aria-hidden="true"></i> 
                            <a href="tel:<?= $data['phone']; ?>"><?= $data['phone']; ?></a>

                            </td>
                            <td>
                                <i class="fa fa-user" aria-hidden="true"></i> 
                                <?= $data['detailed_address']  ?>
                            </td>
                            
                            <td class="text-center" >

                            <?php 
                        if ($tr['confirm_status']  == 0 || $tr['confirm_status']  == 1  ){ ?>

                                <button type="button" class="btn btn-success btn-block" style="margin-bottom:10px;" data-toggle="modal" data-target="#myModal<?=$tr['order_id']?>">
                                Confirm
                                </button>

                                <div class="modal" id="myModal<?=$tr['order_id']?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                            <form action="<?=base_url('admin/subscriptionorders/confirm')?>" method="POST" id="confirmform<?= $data['id']?>">
                                <input type="hidden" name="order_id" value="<?= $tr['order_id'] ?>">
                                <input type="hidden" name="user_id" value="<?= $data['id'] ?>">
                                     <div class="form-group">
                                    <label for="date">Select Start date for subscription of <?= $data['name']  ?></label>
                                    <input type="date" class="form-control" placeholder="Select start date" id="date" name="start_date" required>
                                    </div>
                                <button type="submit" class="btn btn-primary">Confirm subscription</button>
                                
                                </form>                                       
                                     </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                            </div>

                                            </div>
                                        </div>
                                        </div>



                                
                                <form action="<?=base_url('admin/subscriptionorders/reject')?>" method="POST" id="rejectform<?= $data['id']?>">
                                <input type="hidden" name="order_id" value="<?= $tr['order_id'] ?>">
                                <div style="margin-bottom:4px;"><a href="javascript:void(0);" onclick="document.getElementById('rejectform<?= $data['id'] ?>').submit()" class="btn btn-danger btn-sm active btn-block" role="button" aria-pressed="true">Reject</a></div>
                                </form>
                            </td>
                            <?php } 
                            else if ($tr['confirm_status']  == 2 || $tr['confirm_status']  == 3 ){ ?>
                                <form action="<?=base_url('admin/subscriptionorders/edit')?>" method="POST" id="editform<?= $data['id']?>">
                                <input type="hidden" name="order_id" value="<?= $tr['order_id'] ?>">
                                <div style="margin-bottom:4px;"><a href="javascript:void(0);" onclick="document.getElementById('editform<?= $data['id'] ?>').submit()" class="btn btn-primary btn-sm active btn-block" role="button" aria-pressed="true">Edit </a></div>
                                </form>


                         <?php   }  ?>
                            
                            
                            <td class="text-center"><?php
                                $subdata=$this->Public_model->getSubcspecificfororders($tr['subscription_id']); ?>
                                <b> <div class="alert alert-info" style="border-style:solid;border-color:orange;background-color:#120321;font-size:15px; color:white;" align="left"> <span class="glyphicon glyphicon-flash"></span> दुधाई  <?=$subdata[0]['milk_type']?> milk  (<?=$subdata[0]['quantity'] ?> लिटर) <br>
       <span class="glyphicon glyphicon-flash"></span>  किंमत: <i style="color:green;"> <?=$subdata[0]['rate_day']?> ₹ </i> &nbspप्रति  <?=$subdata[0]['quantity'] ?> लिटर<br> 
       <span class="glyphicon glyphicon-flash"></span> <i style="color:green;">  <?=$subdata[0]['rate_month']?></i> रुपये &nbsp प्रति  महिना <br>
       <span class="glyphicon glyphicon-flash"></span> <i style="color:green;">  <?=$subdata[0]['rate_pay_now']?> </i>रुपये  &nbspप्रति  महिना (महिन्याच्या सुरुवातीला भरल्यास ) <br></div>

                            </td>
                            <td class="hidden" id="order-id">
                                <div class="table-responsive">
                                    <table class="table more-info-purchase">
                                        <tbody>
                                            <tr>
                                                <td><b>Email</b></td>
                                                <td><a href="mailto:<?= $tr['email'] ?>"><?= $tr['email'] ?></a></td>
                                            </tr>
                                            <tr>
                                                <td><b>City</b></td>
                                                <td><?= $tr['city'] ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Address</b></td>
                                                <td><?= $tr['address'] ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Postcode</b></td>
                                                <td><?= $tr['post_code'] ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Notes</b></td>
                                                <td><?= $tr['notes'] ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Come from site</b></td>
                                                <td>
                                                    <?php if ($tr['referrer'] != 'Direct') { ?>
                                                        <a target="_blank" href="<?= $tr['referrer'] ?>" class="orders-referral">
                                                            <?= $tr['referrer'] ?>
                                                        </a>
                                                    <?php } else { ?>
                                                        Direct traffic or referrer is not visible                       
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Payment Type</b></td>
                                                <td><?= $tr['payment_type'] ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Discount</b></td>
                                                <td><?= $tr['discount_type'] == 'float' ? '-' . $tr['discount_amount'] : '-' . $tr['discount_amount'] . '%' ?></td>
                                            </tr>
                                            <?php if ($tr['payment_type'] == 'PayPal') { ?>
                                                <tr>
                                                    <td><b>PayPal Status</b></td>
                                                    <td><?= $tr['paypal_status'] ?></td>
                                                </tr>
                                            <?php } ?>
                                            <tr>
                                                <td colspan="2"><b>Products</b></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <?php
                                                    $arr_products = unserialize($tr['products']);
                                                    foreach ($arr_products as $product) {
                                                        $total_amount = 0;
                                                        $total_amount += str_replace(' ', '', str_replace(',', '.',$product['product_info']['price']));
                                                        ?>
                                                        <div style="word-break: break-all;">
                                                            <div>
                                                                <img src="<?= base_url('attachments/shop_images/' . $product['product_info']['image']) ?>" alt="Product" style="width:100px; margin-right:10px;" class="img-responsive">
                                                            </div>
                                                            <a data-toggle="tooltip" data-placement="top" title="Click to preview" target="_blank" href="<?= base_url($product['product_info']['url']) ?>">
                                                                <?= base_url($product['product_info']['url']) ?>
                                                                <div style=" background-color: #f1f1f1; border-radius: 2px; padding: 2px 5px;">
                                                                    <b>Quantity:</b> <?= $product['product_quantity'] ?> / 
                                                                    <b>Price: <?= $product['product_info']['price'].' '.$this->config->item('currency') ?></b>
                                                                </div>
                                                            </a>
                                                            <div class="">
                                                                <b>Vendor:</b>
                                                                <a href=""><?= $product['product_info']['vendor_name'] ?></a>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div style="padding-top:10px; font-size:16px;">Total amount of products: <?= $total_amount.' '.$this->config->item('currency') ?></div>
                                                        <hr>
                                                    <?php }
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?= $links_pagination ?>
    <?php } 
    
    else { ?>
        <div class="alert alert-info">No orders to the moment!</div>
    <?php }
    ?>        
    <hr>
    <?php
} ?>


<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInputconfirm");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTablereject");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

<!-- Modal for more info buttons in orders -->
<div class="modal fade" id="modalPreviewMoreInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Preview <b id="client-name"></b></h4>
            </div>
            <div class="modal-body" id="preview-info-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/js/bootstrap-toggle.min.js') ?>"></script>
