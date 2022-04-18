<?php
    
    include_once('dbConnection.php');
    include('header.php');
    //SESSION_EMAIL
    $email = "Mayur@gmail.com";
    try{
    if(isset($_GET['pid']))
    {
        $id = $_GET['pid'];
        $sql = "SELECT * FROM milk_price WHERE p_id={$id}";
        $result = $conn->query($sql);
        $row1 = $result->fetch_assoc();
    }
    else
    {
        echo '<script> location.href = "index.php"</script>';
    }
    }
    catch(Exception $e){
        echo '<script> location.href = "./index.php";</script>';
    }

    $sql1 = "SELECT * FROM membership_tb WHERE member_email = '{$email}'";
    $result1 = $conn->query($sql1);
    $row = $result1->fetch_assoc();
?>

    <!-- Start Side Bar-->
        <div class="container-fluid mt-5" >
            <div class="row" style="margin-top:58px;">
            <?php
                    include('sidebar.php');
                ?>
                <div class="col-md-10 mb-5 offset content">
                <h3 class="text-center mb-3 mt-3">Get 30 Days Membership</h3>
                <form action="" method="post" class="p-4 shadow-lg mt-4">
                    <div class="form-group">
                        <label for="cname" class="font-weight-bolder">Customer Name</label>
                        <input type="text" name="cname" id="cname" value="<?php if(isset($row['member_name'])){echo $row['member_name'];}?>"
                        class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="cemail" class="font-weight-bolder">Customer Email</label>
                        <input type="email" name="cemail" id="cemail" readonly value="<?php if(isset($row['member_email'])){echo $row['member_email'];}?>"
                        class="form-control" placeholder="Email">
                    </div>
                    <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label for="cadd1" class="font-weight-bolder">Customer Address1</label>
                        <input type="text" name="cadd1" id="cadd1" value="<?php if(isset($row['member_add1'])){echo $row['member_add1'];}?>"
                        class="form-control" placeholder="Address 1">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="cadd2" class="font-weight-bolder">Customer Address2</label>
                        <input type="text" name="cadd2" id="cadd2" value="<?php if(isset($row['member_add2'])){echo $row['member_add2'];}?>"
                        class="form-control" placeholder="Address 2">
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="cmobile" class="font-weight-bolder">Customer Mobile No.</label>
                        <input type="text" name="cmobile" id="cmobile" minlength=10 maxlength=10
                        onkeypress="isInputNumber(event)" value="<?php if(isset($row['member_mobile'])){echo $row['member_mobile'];}?>"
                        class="form-control" placeholder="Mobile No">
                    </div>
                    <div class="form-group">
                        <label for="caadhar" class="font-weight-bolder">Customer Aadhar No.</label>
                        <input type="text" name="caadhar" id="caadhar" minlength=12 maxlength=12
                        onkeypress="isInputNumber(event)" value="<?php if(isset($row['member_aadhar'])){echo $row['member_aadhar'];}?>"
                        class="form-control" placeholder="Aadhar No">
                    </div>
                    <div class="form-group">
                        <label for="cquantity" class="font-weight-bolder">Milk Quantity</label>
                        <input type="text" name="cquantity" id="cquantity" readonly
                        value="<?php if(isset($row1['p_capacity'])){echo $row1['p_capacity'];}?>"
                        class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="cprice" class="font-weight-bolder">Milk Price per Litre</label>
                        <input type="text" name="cprice" id="cprice" readonly
                        value="<?php if(isset($row1['p_price'])){echo $row1['p_price'];}?>"
                        class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="tprice" class="font-weight-bolder">Total Price</label>
                        <input type="text" name="tprice" id="tprice" readonly
                        value="<?php if(isset($row1['p_price'])){echo $row1['p_price']*30;}?>"
                        class="form-control" >
                    </div>
                    <a href="checkout.php" class="btn btn-success">Pay Now</a>
                    <input type="submit" name="membersubmit" class="btn btn-outline-success" value="Pay at End of Month">
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </form>
                </div>
            </div>
         </div>
         <?php

         if(isset($_REQUEST['membersubmit']))
         {
             if($_REQUEST['cname'] &&$_REQUEST['cemail'] 
             &&$_REQUEST['cadd1'] &&$_REQUEST['cadd2'] &&
             $_REQUEST['cmobile'] &&$_REQUEST['caadhar'] &&
             $_REQUEST['cquantity'] &&$_REQUEST['cprice'] &&
             $_REQUEST['tprice'] )
             {
                $member_name = $_REQUEST['cname'];  $member_email = $_REQUEST['cemail'];
                $member_add1 = $_REQUEST['cadd1'];  $member_add2 = $_REQUEST['cadd2'];
                $member_mobile = $_REQUEST['cmobile'];  $member_aadhar = $_REQUEST['caadhar'];
                $member_quantity = $_REQUEST['cquantity'];  $member_price = $_REQUEST['cprice'];
                $member_tprice= 0; 

                $sql = "SELECT * FROM membership_tb WHERE member_email = '{$email}'";
                $result = $conn->query($sql);
                $yes = $result->num_rows;

                if($yes == 0)
                {
                    $sql = "INSERT INTO membership_tb (member_name, member_email, member_add1, member_add2,
                    member_mobile,member_aadhar,member_milk_qty,member_milk_pri,member_milk_tpri,member_active,member_paid)
                    VALUES ('$member_name','$member_email','$member_add1','$member_add2','$member_mobile',
                    '$member_aadhar','$member_quantity','$member_price','$member_tprice','1','0')";
                    $result = $conn->query($sql);
                    if($result == TRUE)
                    {
                        echo '<script>location.href = "index.php";</script>';
                    }
                    else{
                        echo 'Error';
                    }
                }
                else
                {
                    $sql = "UPDATE membership_tb SET member_active ='1', member_paid='0', member_name='$member_name',
                    member_add1='$member_add1',member_add2 = '$member_add2',member_mobile='$member_mobile',
                    member_aadhar='$member_aadhar' WHERE member_email = '{$email}'";
                    $result = $conn->query($sql);
                    if($result == TRUE)
                    {
                        $sql2 = "DELETE FROM viewdetail WHERE d_email = '{$email}'";
                        $result2 = $conn->query($sql2);
                        echo '<script>location.href = "index.php";</script>';
                    }
                    else
                    {
                        echo '<script>console.log(1)</script>';
                    }
                }
             }
             else
             {
                echo 'Tujse Na Ho payega';
             }
         }
         ?>

    <script>
        function isInputNumber(evt){
            var ch = String.fromCharCode(evt.which);
            if(!(/[0-9]/.test(ch))){
                evt.preventDefault();
            }
        }
    </script>
    <!-- JQuery-->
    <script src="js/jquery.min.js"></script>

    <!-- popper-->
    <script src="js/pooper.min.js"></script>

    <!-- Bootstrap JS-->
    <script src="js/custom.js"></script>

    <!--font Awesome -->
    <script src="js/all.min.js"></script>
</body>
</html>