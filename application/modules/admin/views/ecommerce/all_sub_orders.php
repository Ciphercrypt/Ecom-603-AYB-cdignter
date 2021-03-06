<?php
//header("Refresh: 90");
?>

<link href="<?= base_url('assets/css/bootstrap-toggle.min.css') ?>" rel="stylesheet">


  <style>
  em
{
	background-color:#1C1C1C;
	text-align:center;
	font-family:helvetica;
}
h1
{
	margin:0px;
	margin-top:40px;
	color:#8181F7;
	font-size:45px;
}
#date
{
	margin-top:-5px;
	color:silver;
	font-size:15px;
	border:2px dashed #2E9AFE;
	padding:10px;
	width:200px;
    height:50px;
	margin-left:50px;
}
#time
{
	margin-top:20px;
	font-size:20px;
	color:silver;
	border:2px dashed #2E9AFE;
	padding:10px;
	width:200px;
    height:50px;

	margin-left:50px;
}    
  </style>

<div align="center"><p  > <em id="date"></em> <div></div> <em id="time" ></em></p>
</div>

<h3 style="color:black; font-family:helvetica;" align="center"><b> All Orders till today</b></h3>



<a href="<?= base_url('admin/subscriptionorders/incomplete_orders') ?>" class="btn btn-warning " style="margin-left:0px;" role="button"><b style="color:black;">Orders not delivered today</b>
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
                        <th>Order no.</th>
                        <th>Phone</th>
                        <th>Address</th>
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
                            <td class="relative" id="order_id-id-<?= $tr['sr_no'] ?>">
                                # <?= $tr['sr_no'] ?>
                                <?php if ($tr['delivered'] == 0) { ?>
                                    <div id="new-order-alert-<?= $tr['sr_no'] ?>">
                                        <img src="<?= base_url('assets/imgs/new-blinking.gif') ?>" style="width:100px;" alt="blinking">
                                    </div>
                                <?php } ?>
                                <div >
                                </div>
                                <div class="confirm-result">
                                    <?php if ($tr['delivered']  == 0 ) { ?>
                                        <span class="label label-info">Not delivered</span>
                                    <?php } else if ($tr['delivered']  == 1  ) { ?> 
                                        <span class="label label-success">Delivered</span> 
                                    <?php } else if($tr['delivered']  == 2){ ?>
                                        <span class="label label-danger">Rejected</span> 
                                        <?php }else if($tr['delivered']  == 3){  ?> 
                                            <span class="label label-warning">On leave</span> 

                                            <?php }else if($tr['delivered']  == 4){  ?>
                                                <span class="label label-danger">Missed</span> 
                                                <?php }?>

                                </div>
                            </td>
                            
                            <td><i class="fa fa-phone" aria-hidden="true"></i> 
                            <a href="tel:<?= $data['phone']; ?>"><?= $data['phone']; ?></a>

                            </td>
                            <td>
                                <i class="glyphicon glyphicon-home" aria-hidden="true"></i> 
                                <b><?= $data['city']  ?></b>&nbsp<?= $data['detailed_address']  ?>
                            </td>
                            
                            
                            <td class="text-center"><?php
                                if ($tr['plan_id']!=0){
                                $subdata=$this->Public_model->getSubcspecificfororders($tr['plan_id']); ?>


                                <b> <div class="alert alert-info" style="border-style:solid;border-color:orange;background-color:white;font-size:15px; color:black;" align="left"> <span class="glyphicon glyphicon-flash"></span> ???????????????  <?=$subdata[0]['milk_type']?> milk  (<?=$subdata[0]['quantity'] ?> ????????????) <br>
       <span class="glyphicon glyphicon-flash"></span>  ???????????????: <i style="color:green;"> <?=$subdata[0]['rate_day']?> ??? </i> &nbsp???????????????  <?=$subdata[0]['quantity'] ?> ????????????<br> 
      </div> 
                                    <?php } else {?>
                                    No data found , please contact admin!
                                    <?php }?>
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

<script type="text/javascript">
    window.onload = setInterval(clock,1000);

    function clock()
    {
	  var d = new Date();
	  
	  var date = d.getDate();
	  
	  var month = d.getMonth();
	  var montharr =["Jan","Feb","Mar","April","May","June","July","Aug","Sep","Oct","Nov","Dec"];
	  month=montharr[month];
	  
	  var year = d.getFullYear();
	  
	  var day = d.getDay();
	  var dayarr =["Sun","Mon","Tues","Wed","Thurs","Fri","Sat"];
	  day=dayarr[day];
	  
	  var hour =d.getHours();
      var min = d.getMinutes();
	  var sec = d.getSeconds();
	
	  document.getElementById("date").innerHTML=day+" "+date+" "+month+" "+year;
	  document.getElementById("time").innerHTML=hour+":"+min+":"+sec;
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
