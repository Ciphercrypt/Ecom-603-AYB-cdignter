<?php 
include('header.php');
include('dbConnection.php');

?>

<div class="container mt-5">
    <h3 class="text-center text-primary pt-5 pb-3" style="border-bottom:1px solid red">Add Customer Details</h3>
    <center>
    <form action="" method="POST" class="col-lg-6 mt-5">
        <div class="form-group text-left">
            <label for="cname" class="font-weight-bolder">Customer Name</label>
            <input type="text" name="cname" id="cname" value="<?php if(isset($row['member_name'])){echo $row['member_name'];}?>"
            class="form-control" placeholder="Name">
        </div>
        <div class="form-group text-left">
            <label for="cemail" class="font-weight-bolder">Customer Email</label>
            <input type="email" name="cemail" id="cemail" value="<?php if(isset($row['member_email'])){echo $row['member_email'];}?>"
            class="form-control" placeholder="Email">
        </div>
        <div class="form-row">
        <div class="form-group text-left col-sm-6">
            <label for="cadd1" class="font-weight-bolder">Customer Address1</label>
            <input type="text" name="cadd1" id="cadd1" value="<?php if(isset($row['member_add1'])){echo $row['member_add1'];}?>"
            class="form-control" placeholder="Address 1">
        </div>
        <div class="form-group text-left col-sm-6">
            <label for="cadd2" class="font-weight-bolder">Customer Address2</label>
            <input type="text" name="cadd2" id="cadd2" value="<?php if(isset($row['member_add2'])){echo $row['member_add2'];}?>"
            class="form-control" placeholder="Address 2">
        </div>
        </div>
        <div class="form-group text-left">
            <label for="cmobile" class="font-weight-bolder">Customer Mobile No.</label>
            <input type="text" name="cmobile" id="cmobile" minlength=10 maxlength=10
            onkeypress="isInputNumber(event)" value="<?php if(isset($row['member_mobile'])){echo $row['member_mobile'];}?>"
            class="form-control" placeholder="Mobile No">
        </div>
        <div class="form-group text-left">
            <label for="caadhar" class="font-weight-bolder">Customer Aadhar No.</label>
            <input type="text" name="caadhar" id="caadhar" minlength=12 maxlength=12
            onkeypress="isInputNumber(event)" value="<?php if(isset($row['member_aadhar'])){echo $row['member_aadhar'];}?>"
            class="form-control" placeholder="Aadhar No">
        </div>
        <div class="form-group text-left">
            <label for="cquantity" class="font-weight-bolder">Milk Quantity</label>
            <input type="text" name="cquantity" id="cquantity" 
            value="<?php if(isset($row['member_milk_qty'])){echo $row['member_milk_qty'];}?>"
            class="form-control" placeholder="Milk Quantity">
        </div>
        <div class="form-group text-left">
            <label for="cprice" class="font-weight-bolder">Milk Price</label>
            <input type="text" name="cprice" id="cprice" 
            value="<?php if(isset($row['member_milk_pri'])){echo $row['member_milk_pri'];}?>"
            class="form-control" placeholder="Milk Price">
        </div>
        <div class="form-group text-left">
            <label for="totalprice" class="font-weight-bolder">Total Bill</label>
            <input type="text" name="totalprice" id="totalprice" 
            value="<?php if(isset($row['member_milk_pri'])){echo $row['member_milk_pri'];}?>"
            class="form-control" placeholder="Milk Total Bill">
        </div>
        <div class="form-group text-left">
            <label for="tprice" class="font-weight-bolder">Total Paid</label>
            <input type="text" name="tprice" id="tprice"
            value="<?php if(isset($row['member_milk_tpri'])){echo $row['member_milk_tpri'];}?>"
            class="form-control" placeholder="Total Paid">
        </div>
        <input type="submit" name="addcustomer" id="addcustomer" value="Add Customer" class="btn btn-outline-danger mr-2">
        <a href="admin.php" class="btn btn-outline-secondary">Back</a>
        
        
        <?php
            if(isset($_REQUEST['addcustomer']))
            {
                if(($_REQUEST['cname']=="")||($_REQUEST['cemail']=="")||($_REQUEST['cadd1']=="") ||
                ($_REQUEST['cadd2']=="")||($_REQUEST['cmobile']=="")||($_REQUEST['caadhar']=="") ||
                ($_REQUEST['cquantity']=="")||($_REQUEST['cprice']=="")||($_REQUEST['totalprice']=="")
                ||($_REQUEST['tprice']==""))
                {
                    $msg = '<div class="alert alert-warning mt-2">Fill all Fields</div>';
                }
                else
                {
                    
                    $mname = $_REQUEST['cname'];   $memail = $_REQUEST['cemail'];
                    $madd1 = $_REQUEST['cadd1'];   $madd2 = $_REQUEST['cadd2'];   
                    $mmobile = $_REQUEST['cmobile'];   $maadhar = $_REQUEST['caadhar'];
                    $mcquantity = $_REQUEST['cquantity'];   $mcprice= $_REQUEST['cprice'];
                    $mtotalprice = $_REQUEST['totalprice'];   $mtpaid = $_REQUEST['tprice'];

                   

                    $sql = "INSERT INTO membership_tb(member_name,member_email,member_add1,member_add2,
                    member_mobile,member_aadhar,member_milk_qty,member_milk_pri,member_milk_tpri,member_paid)
                    VALUES ('$mname','$memail','$madd1','$madd2','$mmobile','$maadhar','$mcquantity','$mcprice',
                    '$mtotalprice','$mtpaid')";
                                        
                    $result = $conn->query($sql);
                    if($result==TRUE)
                    {
                        $msg = '<div class="alert alert-success mt-2">Customer Add Successfully</div>';
                    }
                else
                    {
                        $msg = '<div class="alert alert-danger mt-2">Unable to add Customer</div>';
                    }
                }        
            }
            
        ?>
            <?php
            if(isset($msg)){
                echo $msg;
            }
            ?>
    </form>
    </center>
</div>

<?php 
include('footer.php');

?>