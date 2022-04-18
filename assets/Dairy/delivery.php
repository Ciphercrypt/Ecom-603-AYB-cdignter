<?php
    include_once('dbConnection.php');
?>

<?php
    include('header.php');
?>
<div class="container-fluid mt-5" >
<div class="row" style="margin-top:58px;">
<?php
                    include('sidebar.php');
                ?>
    <div class="col-md-10 content">
        <div class="row" style="margin-top:20px;">
            <div class="col-md-6">
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
                    </td>
                </tr>
                <?php 
                    $count = $count+1;
                    }
                ?>
            </table>
            <?php
                    }}
            ?>
            </div>
<?php 
    if(isset($_REQUEST['view']))
    {
        $sql = "SELECT * FROM membership_tb WHERE member_id = {$_REQUEST['id']}";
        $result = $conn->query($sql);
        if($result == TRUE)
        {
            $row = $result->fetch_assoc();
            $email = $row['member_email'];
        }
    }
?>

            <div class="col-md-6">
                <form action="" method="post" class="jumbotron">
                <h3 class="text-center text-primary">Add New Delivery</h3>
                <div class="form-group">
                        <label for="cname" class="font-weight-bolder">Customer Name</label>
                        <input type="text" name="cname" id="cname" value="<?php if(isset($row['member_name'])){echo $row['member_name'];}?>"
                        class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="date" class="font-weight-bolder">Date</label>
                        <input type="date" name="date" id="date" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="time" class="font-weight-bolder">Time</label>
                        <input type="time" name="time" id="time" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="cmobile" class="font-weight-bolder">Milk Quantity</label>
                        <input type="text" name="cquantity" id="cquantity" 
                        value="<?php if(isset($row['member_milk_qty'])){echo $row['member_milk_qty'];}?>"
                        class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="cprice" class="font-weight-bolder">Milk Price</label>
                        <input type="text" name="cprice" id="cprice" 
                        value="<?php if(isset($row['member_milk_pri'])){echo $row['member_milk_pri'];}?>"
                        class="form-control">
                    </div>
                    <input type="hidden" name="email" value="<?php if(isset($row['member_email'])){echo $row['member_email'];}?>">
                    
                    <div class="form-group">
                        <label for="tdelivered" class="font-weight-bolder">Milk Delivered</label>
                        
                        <div class="">
                        <input type="radio" name="tdelivered" class="form-check-input ml-5" id="yes" value="YES"> <label for="yes" class="form-check-label">Yes </label><br>
                        <input type="radio" name="tdelivered" class="form-check-input ml-5" id="no" value="NO">
                        <label for="no" class="form-check-label">No </label>
                        </div>
                        
                    </div>
                    <input type="submit" name="update" id="update" Value="Add Delivery" class="btn btn-outline-primary">
                    <input type="reset" class="btn btn-secondary">
                    <?php
                        if(isset($_REQUEST['update']))
                        {
                            if($_REQUEST['cname'] && $_REQUEST['date'] && $_REQUEST['time'] && $_REQUEST['cquantity'] && $_REQUEST['cprice'] && $_REQUEST['tdelivered'])
                            {
                                $email = $_REQUEST['email'];
                                $delivered = $_REQUEST['tdelivered']; $date = $_REQUEST['date']; $price = $_REQUEST['cprice'];
                                $time = $_REQUEST['time']; $quantity = $_REQUEST['cquantity']; 
                                $sql = "INSERT INTO viewdetail (d_price, d_date, d_time, d_quantity, d_delivered,d_email) VALUES
                                ('$price', '$date', '$time', '$quantity', '$delivered','$email');";
                                if($conn->query($sql))
                                {
                                    $msg = '<div class="alert alert-success mt-3">Delivery Add successfully</div>';
                                }
                                else
                                {
                                    $msg = '<div class="alert alert-danger mt-3">Unable to  Request</div>';
                                }
                            }
                            else
                            {
                                $msg = '<div class="alert alert-warning mt-3">Fill All Fields</div>';
                            }

                        }

                       if(isset($msg)){ echo $msg;}
                    ?>
                   
                </form>
            </div>
        </div>
    </div>
</div>
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