<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$data= $this->Public_model->getCoddetails();
$orderdata=$this->Public_model->getRequestdetails($_SESSION['logged_user']);
$subdata=$this->Public_model->getSubcspecificfororders($orderdata[0]['subscription_id']); 


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
                <div class="col-auto" align="center"><h4><b>मासिक सदस्यता</b></h4></div>

                <h5>
        <div style="color:black; font-family:helvetica;" align="center" ><span class="glyphicon glyphicon-apple"></span>  Date Joined: <b><?=date('l: d M Y',strtotime($orderdata[0]['start_date'])) ?></b></div>

        </h5>
        <h4 style="color:black; font-family:helvetica;" align="center"><b> Records of Month:  <?php if (isset($_GET['month_date'])){ echo date('M Y',strtotime($_GET['month_date'])); }else {echo date('M-Y');}?> </b></h4> 

                <div class="col"><hr style="height:2px;border-width:0;color:gray;background-color:gray"></div>
            </div>
                            
                
            </div>
        </div>
        










<hr>
<div class="form-group col" align="center">

<label for="dateform1" align="left">select month:</label>
 

                   <form action="<?=base_url()?>mysubscription/month" method="GET" id="dateform1">
                       <input type="hidden" name="user_id" value="<?=$_SESSION['logged_user']?>">
                       <input type="month" name="month_date" placeholder="<?=date("Y-m")?>" min="<?=date('Y-m',strtotime($orderdata[0]['start_date'])) ?>" max="<?=date("Y-m")?>">
                       <button  type="submit" class="btn btn-success">Delivery details</button>
                    </form>


<?php



   



   if (!empty($orders)) {
       ?>

       <div class="table-responsive">

       <h4 style="color:black; font-family:times new roman;" id="avi" align="left"><b><label for="avi"><span class="glyphicon glyphicon-saved"></span> Current Plan:</label> <b> <div class="alert alert-info" style="border-style:solid;border-color:orange;background-color:white;font-size:15px; color:black;" align="left"><span class="glyphicon glyphicon-flash"></span>  दुधाई  <?=$subdata[0]['milk_type']?> milk  (<?=$subdata[0]['quantity'] ?> लिटर) <br>
     <span class="glyphicon glyphicon-flash"></span>  किंमत: <i style="color:green;"> <?=$subdata[0]['rate_day']?> ₹ </i> &nbspप्रति  <?=$subdata[0]['quantity'] ?> लिटर<br> 
     <span class="glyphicon glyphicon-flash"></span>  <i style="color:green;">  <?=$subdata[0]['rate_month']?></i> रुपये &nbsp प्रति  महिना <br>
     <span class="glyphicon glyphicon-flash"></span>  <i style="color:green;">  <?=$subdata[0]['rate_pay_now']?> </i>रुपये  &nbspप्रति  महिना (महिन्याच्या सुरुवातीला भरल्यास ) <br></div> </b></h4>
           <table class="table table-condensed table-bordered table-striped table-responsive-lg table-hover " id="myTablereject">
               <thead class="thead-dark" style="background-color:black; color:white;">
                   <tr>
                        <th scope="col">Date</th>
                       <th scope="col">Status</th>
                       <th scope="col">Time</th>
                   </tr>
               </thead>
               <tbody >
                   <?php
                   foreach ($orders as $tr) {
                       
                      
                       ?>
                       <tr  data-toggle="modal" data-target="#myModal<?= $tr['sr_no'] ?>" style="margin-top:100px;">

                       <td scope="row" style="height:40px;">
                               <i class="glyphicon glyphicon-calendar" aria-hidden="true"></i> 
                               <?=date('d M y',strtotime($tr['date']))   ?>
                           </td>
                           
                               <td width="10px;" align="left" scope="row">
                                   <?php if ($tr['delivered']  == 0 ) { ?>
                                    <span class="label label-default" style="background-color:cyan; color:black;">Not delivered</span>
                                       
                                   <?php } else if ($tr['delivered']  == 1  ) { ?> 
                                    <span class="label label-default" style="background-color:#66CD00;color:black;">Delivered</span>✅
                                   <?php } else if($tr['delivered']  == 2){ ?>
                                    <span class="label label-default" style="background-color:red;color:black;">Rejected</span>❌
                                       <?php }else if($tr['delivered']  == 3){  ?> 
                                        <span class="label label-default" style="background-color:slateblue;color:black;">On leave</span>

                                     <?php }else if($tr['delivered']  == 4){  ?>
                                     

                                        <span class="label label-default" style="background-color:orange;color:black;">Missed</span>
                                               <?php }?>

                              

                               </td>
                          
                           
                           <td scope="row"> 
                           🕒<?=date("h:i a",strtotime($tr['time'])) ; ?></a>

                           </td>
                           
                           
                           
                           
                           
                            </tr>

                            <div id="myModal<?= $tr['sr_no'] ?>" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Modal Header</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Some text in the modal.data-toggle="modal" data-target="#myModal<?= $tr['sr_no'] ?>"
                                    
                                    <?php
                               if ($tr['plan_id']!=0) {
                               $subdata=$this->Public_model->getSubcspecificfororders($tr['plan_id']); ?>

                                 <?php if ($tr['plan_id']==$subdata[0]['id']){?>
                               <b> <div class="alert alert-info" style="border-style:solid;border-color:green;background-color:#e6ffe6;font-size:15px; color:black;" align="left"> <span class="glyphicon glyphicon-flash"></span> दुधाई  <?=$subdata[0]['milk_type']?> milk  (<?=$subdata[0]['quantity'] ?> लिटर) <br>
                                <span class="glyphicon glyphicon-flash"></span>  किंमत: <i style="color:green;"> <?=$subdata[0]['rate_day']?> ₹ </i> &nbspप्रति  <?=$subdata[0]['quantity'] ?> लिटर<br> 
                                <span class="glyphicon glyphicon-flash"></span> <i style="color:green;">  <?=$subdata[0]['rate_month']?></i> रुपये &nbsp प्रति  महिना <br>
                                <?php } else { ?>
                                 <b> <div class="alert alert-info" style="border-style:solid;border-color:green;background-color:#e6ffff;font-size:15px; color:black;" align="left"> <span class="glyphicon glyphicon-flash"></span> दुधाई  <?=$subdata[0]['milk_type']?> milk  (<?=$subdata[0]['quantity'] ?> लिटर) <br>
                                <span class="glyphicon glyphicon-flash"></span>  किंमत: <i style="color:green;"> <?=$subdata[0]['rate_day']?> ₹ </i> &nbspप्रति  <?=$subdata[0]['quantity'] ?> लिटर<br> 
                                <span class="glyphicon glyphicon-flash"></span> <i style="color:green;">  <?=$subdata[0]['rate_month']?></i> रुपये &nbsp प्रति  महिना <br>
                                  <?php } ?>
                             </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                                </div>

                            </div>
                            </div>

                   <?php } } ?>
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
?>


<script>
$(document).ready(function(){
 $("#myInput").on("keyup", function() {
   var value = $(this).val().toLowerCase();
   $("#myTable tr").filter(function() {
     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
   });
 });
});
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