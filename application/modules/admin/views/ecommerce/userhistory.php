
<h1><img src="<?= base_url('assets/imgs/dudhaiim.png') ?>" class="header-img" style="margin-top:-3px;">User details</h1>
<hr>
<form class="form-inline active-purple-4">
  <input class="form-control form-control-sm mr-3 w-75" id="myInput" onkeyup="myFunction()"  type="text" placeholder="Search for name"
    aria-label="Search">
  <i class="glyphicon glyphicon-search" aria-hidden="true"></i>
</form>

<div style="margin-bottom: 20px;" >
<div class="">
    <div class="col-sm-12 col-md-12">        
        <div class="table-responsive"  >
                <table class="table table-responsive table-bordered " id="myTable">
                 <thead>
                         <tr> 
                              <th>name</th>
                            <th>phone</th>
                            <th>email</th>
                            <th>city</th>
                             <th></th>
                             <th></th>
                            </tr>
                </thead>
                <tbody>
        
            <?php if (!empty($user_details)) {
            ?>      <?php
                foreach ($user_details as $cod) {
                    ?>
                    
                    <tr>
                    <td >
                        <?= $cod['name'] ?>
                    </td>
                    <td  type="tel">
                        <?= $cod['phone'] ?>
                    </td>
                    <td >
                        <?= $cod['email'] ?>
                    </td>
                    <td >
                        <?= $cod['city'] ?>
                    </td>
                    <td ><button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal<?= $cod['id'] ?>">
                                            order history
                                            </button>

                                            <!-- The Modal -->
                                            
                                            <div class="modal" id="myModal<?= $cod['id'] ?>">
                                            <div id="GFG">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Order history of <?= $cod['name'] ?></h4>
                                                    <br>phone: <?= $cod['phone'] ?><br>city: <?= $cod['city'] ?><br>address:<?= $cod['detailed_address'] ?><br>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                <input class=" btn btn-warning" type="button" value="print"
                                                                 onclick="printDiv()">  
                                                <?php   $orders_history = $this->Public_model->getUserOrdersHistory($cod['id'], 15, 0);?>
                                               
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
                                                                                <td><?= date('d.M.Y', $order['date']) ?></td>
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

                                                                                            <button type="button" class="btn btn-success" onclick="location.href='<?= base_url($product['product_info']['url']) ?>'" data-toggle="modal" data-target="#exampleModal">
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
                                                                                    <div class="progress" align="center" style="background-color:red;color:black;">
                                                                                    <div class="progress-bar " role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="background-color:red;" align="center"><b style="color:black;">Rejected</b></div>
                                                                                    </div>
                                                                            <?php   }  if($order['processed']==2){
                                                                                ?>
                                                                                <div class="progress" style="background-color:orange;color:black;">
                                                                                <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><b style="color:black;">Confirmed</b></div>
                                                                                </div>
                                                                                <?php
                                                                                }  if($order['processed']==3){
                                                                                    ?>
                                                                                    <div class="progress" style="background-color:slateblue;color:black;">
                                                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><b style="color:black;">Processing</b></div>
                                                                                    </div>

                                                                                <?php   }   if($order['processed']==4){
                                                                                    ?>
                                                                                    <div class="progress" style="background-color:green;color:black;">
                                                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><b style="color:black;">Completed</b></div>
                                                                                    </div>
                                                                            <?php    }  if($order['processed']==0){ ?>
                                                                                <div class="progress" style="background-color:yellow;color:black;">
                                                                                <div class="progress-bar bg-default" role="progressbar" style="width: 100%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"><b style="color:black;">arrived</b></div>
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
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>

                                                </div>
                                            </div>
                                            </div>
                                            </div>
                    </td>
                    <td>
                    <?php if($cod['subscribed']==1){ ?>
                        <form action="<?=base_url("admin/subscriptionorders/userorder")?>" method="GET">
                        <input type="hidden" name="user_id" value="<?=$cod['id']?>">
                        <input type="hidden" name="month_date" value="<?=date("Y-m")?>">
                        <button  type="submit" class="btn btn-warning">Daily delivery details</button>
                        </form>

                        
                <?php    } else { ?>
                 ---.-- Not subscribed
                 <?php }?>
                    </td>
                    </tr>
                <?php }
                ?>
        <?php } else {
        ?>
		<tr colspan="5"> No users found!</tr>
		<?php } ?>
        </tbody>

</div>


<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

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


function printDiv() { 
            var divContents = document.getElementById("GFG").innerHTML; 
            var a = window.open('', '', 'height=500, width=500'); 
            a.document.write('<html>'); 
            a.document.write(divContents); 
            a.document.write('</body></html>'); 
            a.document.close(); 
            a.print(); 
        } 
</script>