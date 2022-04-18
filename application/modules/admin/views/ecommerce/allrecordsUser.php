<?php
//header("Refresh: 90");

$subdata=$this->Public_model->getSubcspecificfororders($data[0]['subscription_id']); 
$orderdata=$this->Public_model->getRequestdetails($data[0]['user_id']);
$userdata= $this->Public_model->getUserProfileInfo($data[0]['user_id']);
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
<h5>
<div style="color:black; font-family:helvetica;" align="left"> Records of :<br><span class="glyphicon glyphicon-user"></span> <b><?=$userdata['name']?></b></div>
<a  href="tel: <?=$userdata['phone']?>" style="color:slateblue; font-family:helvetica;" align="center"><span class="glyphicon glyphicon-phone"></span>  Phone: <b><?=$userdata['phone']?></b></a>
<div style="color:black; font-family:helvetica;" align="left"> Address :<strong><b><?=$userdata['city']?></strong>&nbsp</b><?=$userdata['detailed_address']?></div>

<div style="color:black; font-family:helvetica;" align="left" ><span class="glyphicon glyphicon-apple"></span>  Date Joined: <b><?=date('l: d M Y',strtotime($orderdata[0]['start_date'])) ?></b></div>

 </h5>

<h4 style="color:black; font-family:helvetica;" id="avi" align="left"><b><label for="avi"><span class="glyphicon glyphicon-saved"></span> Current Plan:</label> <b> <div class="alert alert-info" style="border-style:solid;border-color:orange;background-color:white;font-size:15px; color:black;" align="left"><span class="glyphicon glyphicon-flash"></span>  दुधाई  <?=$subdata[0]['milk_type']?> milk  (<?=$subdata[0]['quantity'] ?> लिटर) <br>
      <span class="glyphicon glyphicon-flash"></span>  किंमत: <i style="color:green;"> <?=$subdata[0]['rate_day']?> ₹ </i> &nbspप्रति  <?=$subdata[0]['quantity'] ?> लिटर<br> 
      <span class="glyphicon glyphicon-flash"></span>  <i style="color:green;">  <?=$subdata[0]['rate_month']?></i> रुपये &nbsp प्रति  महिना <br>
      <span class="glyphicon glyphicon-flash"></span>  <i style="color:green;">  <?=$subdata[0]['rate_pay_now']?> </i>रुपये  &nbspप्रति  महिना (महिन्याच्या सुरुवातीला भरल्यास ) <br></div> </b></h4>

<hr>
<h4 style="color:black; font-family:helvetica;" align="left"><b> Records of Month:  <?php if (isset($_GET['month_date'])){ echo date('M Y',strtotime($_GET['month_date'])); }?> </b></h4> 
<label for="dateform1">select month:</label>
<div class="form-group col">
  

                    <form action="<?=base_url("admin/subscriptionorders/userorder")?>" method="GET" id="dateform1">
                        <input type="hidden" name="user_id" value="<?=$data[0]['user_id']?>">
                        <input type="month" name="month_date" placeholder="<?=date("Y-m")?>" min="<?=date('Y-m',strtotime($orderdata[0]['start_date'])) ?>" max="<?=date("Y-m")?>">
                        <button  type="submit" class="btn btn-success">Delivery details</button>
                     </form>


<?php

 

    



    if (!empty($orders)) {
        ?>

        <div class="table-responsive">
            <table class="table table-condensed table-bordered table-striped table-responsive" id="myTablereject">
                <thead>
                    <tr>
                         <th>Date</th>
                        <th>Order no.</th>
                        <th>Status</th>
                        <th>Time</th>
                        <th>Plan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($orders as $tr) {
                        
                       
                        ?>
                        <tr >

                        <td>
                                <i class="glyphicon glyphicon-calendar" aria-hidden="true"></i> 
                                <?= $tr['date']  ?>
                            </td>
                            <td class="relative" id="order_id-id-<?= $tr['sr_no'] ?>">
                                # <?= $tr['sr_no'] ?>
                                <div >
                                </div>
                                </td> 
                                <td width="10px;" align="center">
                                    <?php if ($tr['delivered']  == 0 ) { ?>
                                        <span class="label label-info">Not delivered</span>
                                        
                                    <?php } else if ($tr['delivered']  == 1  ) { ?> 
                                        <button type="button" class="btn btn-success">Delivered <span class="badge badge-danger ml-2 "><span class="glyphicon glyphicon-ok-sign"></span></span></button>
                                    <?php } else if($tr['delivered']  == 2){ ?>
                                      <button type="button" class="btn btn-danger">Rejected <span class="badge badge-danger ml-2"><span class="glyphicon glyphicon-remove-sign"></span></span></button>
                                        <?php }else if($tr['delivered']  == 3){  ?> 
                                          <button type="button" class="btn btn-info">On leave <span class="badge badge-danger ml-2"></span></button>

                                      <?php }else if($tr['delivered']  == 4){  ?>
                                      

                                                <button type="button" class="btn btn-warning">Missed <span class="badge badge-danger ml-2"></span></button>
                                                <?php }?>

                               

                                </td>
                           
                            
                            <td><i class="glyphicon glyphicon-time" aria-hidden="true"></i> 
                            <?= $tr['time']; ?></a>

                            </td>
                            <td class="" width="30%;"><?php
                                if ($tr['plan_id']!=0) {
                                $subdata=$this->Public_model->getSubcspecificfororders($tr['plan_id']); ?>

                                  <?php if ($tr['plan_id']==$data[0]['subscription_id']){?>
                                <b> <div class="alert alert-info" style="border-style:solid;border-color:green;background-color:#e6ffe6;font-size:15px; color:black;" align="left"> <span class="glyphicon glyphicon-flash"></span> दुधाई  <?=$subdata[0]['milk_type']?> milk  (<?=$subdata[0]['quantity'] ?> लिटर) <br>
                                 <span class="glyphicon glyphicon-flash"></span>  किंमत: <i style="color:green;"> <?=$subdata[0]['rate_day']?> ₹ </i> &nbspप्रति  <?=$subdata[0]['quantity'] ?> लिटर<br> 
                                 <span class="glyphicon glyphicon-flash"></span> <i style="color:green;">  <?=$subdata[0]['rate_month']?></i> रुपये &nbsp प्रति  महिना <br>
                                 <?php } else { ?>
                                  <b> <div class="alert alert-info" style="border-style:solid;border-color:green;background-color:#e6ffff;font-size:15px; color:black;" align="left"> <span class="glyphicon glyphicon-flash"></span> दुधाई  <?=$subdata[0]['milk_type']?> milk  (<?=$subdata[0]['quantity'] ?> लिटर) <br>
                                 <span class="glyphicon glyphicon-flash"></span>  किंमत: <i style="color:green;"> <?=$subdata[0]['rate_day']?> ₹ </i> &nbspप्रति  <?=$subdata[0]['quantity'] ?> लिटर<br> 
                                 <span class="glyphicon glyphicon-flash"></span> <i style="color:green;">  <?=$subdata[0]['rate_month']?></i> रुपये &nbsp प्रति  महिना <br>
                                   <?php } ?>
                                </td>
                            
                            
                            
                            
                            
                             </tr>
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
<script>
  var startDate = new Date();
var fechaFin = new Date();
var FromEndDate = new Date();
var ToEndDate = new Date();




$('.from').datepicker({
    autoclose: true,
    minViewMode: 1,
    format: 'mm/yyyy'
}).on('changeDate', function(selected){
        startDate = new Date(selected.date.valueOf());
        startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
        $('.to').datepicker('setStartDate', startDate);
    }); 

$('.to').datepicker({
    autoclose: true,
    minViewMode: 1,
    format: 'mm/yyyy'
}).on('changeDate', function(selected){
        FromEndDate = new Date(selected.date.valueOf());
        FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
        $('.from').datepicker('setEndDate', FromEndDate);
    });



  
  </script>

<script type="text/javascript">
  document.getElementById('dateform').submit();
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
