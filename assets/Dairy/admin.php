<?php
    include_once('dbConnection.php');
    include('header.php');
?>

    <!-- Start Side Bar-->
        <div class="container-fluid mt-5" >
            <div class="row" style="margin-top:58px;">
                <?php
                    include('sidebar.php');
                ?>
                <div class="col-md-10 content">
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <h2 class='text-center text-primary'>Customers</h2>
                            <?php
                                $sql = "SELECT member_id,member_name FROM membership_tb";
                                $result = $conn->query($sql);
                                if($result == TRUE)
                                {
                                    if($result->num_rows > 0)
                                    {
                            ?>
                            <table class="table table-hover mt-3">
                                <tr>
                                    <th scope="col" class="text-center">Sr. No</th>
                                    <th scope="col" class="text-center">Name</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                                <?php
                                    $count = 1;
                                    while($row = $result->fetch_assoc())
                                    {
                                ?>
                                <tr>
                                    <th scope="row" class="text-center"><?php if(isset($count)){echo $count;}?></th>
                                    <td scope="row"><?php if(isset($row['member_name'])){echo $row['member_name'];}?></td>
                                    <td scope="row">
                                    <form method="POST" action=""class="d-inline">
                                        <input type="hidden" name="id" value="<?php if(isset($row['member_id'])){echo $row['member_id'];}?>">
                                        <button type="submit" class="btn btn-success mr-2" name="view" value="View">
                                        <i class="fas fa-pen"></i>
                                        </button>
                                    </form>

                                    <form method="POST" class="d-inline">
                                        <input type="hidden" name="id" value="<?php if(isset($row['member_id'])){echo $row['member_id'];}?>">
                                        <button type="submit" class="btn btn-danger" name="delete" value="Delete">
                                        <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                    </td>
                                </tr>
                                <?php 
                                    $count = $count+1;
                                    }
                                ?>
                            </table>
                            <?php
                                    }
                                else
                            {
                                echo'<h1>No customers</h1>';
                            }}
                            ?>
                        </div>

<?php
    if(isset($_REQUEST['updatedetail']))
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
            $mid = $_REQUEST['id'];
            $mname = $_REQUEST['cname'];   $memail = $_REQUEST['cemail'];
            $madd1 = $_REQUEST['cadd1'];   $madd2 = $_REQUEST['cadd2'];   
            $mmobile = $_REQUEST['cmobile'];   $maadhar = $_REQUEST['caadhar'];
            $mcquantity = $_REQUEST['cquantity'];   $mcprice= $_REQUEST['cprice'];
            $mtotalprice = $_REQUEST['totalprice'];   $mtpaid = $_REQUEST['tprice'];

            $sql = "UPDATE membership_tb SET member_name ='$mname',
            member_email = '$memail',member_add1 = '$madd1', member_add2 = '$madd2',
            member_mobile = '$mmobile', member_aadhar = '$maadhar', 
            member_milk_qty = '$mcquantity', member_milk_pri = '$mcprice', 
            member_milk_tpri = '$mtotalprice', member_paid = '$mtpaid'
            WHERE member_id={$mid}";
                                
            $result = $conn->query($sql);
            if($result==TRUE)
            {
                $msg = '<div class="alert alert-success mt-2">Update Successfully</div>';
            }
        else
            {
                $msg = '<div class="alert alert-danger mt-2">Unable to Update</div>';
            }
        }        
    }
    if(isset($_REQUEST['delete']))
    {
        $sql = "DELETE FROM membership_tb WHERE member_id={$_REQUEST['id']}";
        if($conn->query($sql) == TRUE){
            echo'<meta http-equiv = "refresh" content="0;URL=?deleted"/>';
        }
        else{
            $msg = '<div class="alert alert-danger mt-2">Unable to Delete</div>';
        }
    }
    if(isset($_REQUEST['view']))
    {
        $sql = "SELECT * FROM membership_tb WHERE member_id = {$_REQUEST['id']}";
        $result = $conn->query($sql);
        if($result)
        {
            $row = $result->fetch_assoc();
        }
    }
?>
                        <div class="col-md-6 mt-3">
                            <form action="" method="post" class="jumbotron">
                            <h3 class="text-center text-primary">Edit Details</h3>
                                <div class="form-group">
                                    <label for="cname" class="font-weight-bolder">Customer Name</label>
                                    <input type="text" name="cname" id="cname" value="<?php if(isset($row['member_name'])){echo $row['member_name'];}?>"
                                    class="form-control" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="cemail" class="font-weight-bolder">Customer Email</label>
                                    <input type="email" name="cemail" readonly id="cemail" value="<?php if(isset($row['member_email'])){echo $row['member_email'];}?>"
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
                                    <input type="text" name="cquantity" id="cquantity" 
                                    value="<?php if(isset($row['member_milk_qty'])){echo $row['member_milk_qty'];}?>"
                                    class="form-control" placeholder="Milk Quantity">
                                </div>
                                <div class="form-group">
                                    <label for="cprice" class="font-weight-bolder">Milk Price</label>
                                    <input type="text" name="cprice" id="cprice" 
                                    value="<?php if(isset($row['member_milk_pri'])){echo $row['member_milk_pri'];}?>"
                                    class="form-control" placeholder="Milk Price">
                                </div>
                                <div class="form-group">
                                    <label for="totalprice" class="font-weight-bolder">Total Bill</label>
                                    <input type="text" name="totalprice" id="totalprice" readonly
                                    value="<?php if(isset($row['member_milk_tpri'])){echo $row['member_milk_tpri'];}?>"
                                    class="form-control" placeholder="Milk Total Bill">
                                </div>
                                <div class="form-group">
                                <label for="tprice" class="font-weight-bolder">Total Paid</label>
                                    <div class="form-row">
                                    <div class="col-sm-11">
                                    <input type="text" name="tprice" id="tprice"
                                    value="<?php if(isset($row['member_paid'])){echo $row['member_paid'];}?>"
                                    class="form-control" placeholder="Total Paid"></div>
                                    <div class="col-sm-1">
                                    <?php if(isset($row['member_milk_tpri']) && isset($row['member_paid']))
                                    {
                                        if($row['member_milk_tpri'] <= $row['member_paid']){
                                        echo '<i class="fas fa-check-circle text-success fa-2x"></i>';
                                        }
                                        else
                                        {
                                            echo '<i class="fas fa-times-circle text-danger fa-2x"></i>';
                                        }
                                    }
                                    ?>
                                    </div>
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="<?php if(isset($row['member_id'])){echo $row['member_id'];}?>">
                                <input type="submit" class="btn btn-success" name="updatedetail"value="Update">
                                <?php if(isset($row['member_email'])){ ?>
                                <a href="viewdetail.php?email=<?php if(isset($row['member_email'])){echo $row['member_email'];}?>" class="btn btn-primary">View Detail</a><?php } ?>
                                <!-- <a href="index.php" class="btn btn-danger">Cancel</a> -->
                            </form>
                            <?php 
                                if(isset($msg))
                                {
                                    echo $msg;
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <a href="addcustomer.php" class="btn btn-danger button_new rounded-circle"><i class="fas fa-plus fa-2x" ></i></a>
         </div>
    
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