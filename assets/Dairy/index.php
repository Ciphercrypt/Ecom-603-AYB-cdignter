<?php
    include_once('dbConnection.php');
    if(isset($_REQUEST['leaverequest']))
    {
        if($_REQUEST['cname'] && $_REQUEST['cdate'] && $_REQUEST['cdesc'])
        {
            $cname = $_REQUEST['cname'];
            $cdate = $_REQUEST['cdate'];
            $cdesc = $_REQUEST['cdesc'];
            $sql = "INSERT INTO leaverequest_tb (lr_name, lr_date, lr_reason) VALUES ('$cname','$cdate','$cdesc')";
            if($conn->query($sql) == TRUE)
            {
                $msg = '<div class="alert alert-success mt-3">Leave Request Submit Successfully</div>';
            }
            else
            {
                $msg = '<div class="alert alert-danger mt-3">Unable to submit Leave Request</div>';
            }
        }
        else
        {
            $msg = '<div class="alert alert-warning mt-3">Unable to submit Leave Request</div>';
        }
    }
?>
<?php
    include('header.php');
?>

    <!-- Start Side Bar-->
        <div class="container-fluid mt-5 myclass" >
            <div class="row" style="margin-top:58px;">
                <?php
                    include('sidebar.php');
                ?>
                <?php 
                $email = "Mayur@gmail.com";
                $sql = "SELECT * FROM membership_tb WHERE member_email='{$email}'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $name = $row['member_name'];
                $paid = $row['member_paid'];
                $active =$row['member_active'];
                
                if($row['member_active'] == 1)
                {
                ?>
                <div class="col-md-10 mt-2 myclass1 content">
                    <div class="jumbotron bg-warning myclass2">
                        <h2 class="text-center text-white">Choose a Membership Plans</h2>
                        <div class="container myclass3">
                            <div class="row mt-5 myclass4">

                            <?php 
                                $sql = "SELECT * FROM milk_price ORDER BY p_capacity";
                                $result = $conn->query($sql);
                                if($conn->query($sql)==TRUE)
                                {
                                    if($result->num_rows > 0)
                                    {
                                        while($row = $result->fetch_assoc()){
                                    
                            ?>
                            <a href="membersignup.php?pid=<?php echo $row['p_id'];?>" class="col-lg-3 col-sm-6 nav-link">
                                <div class="myclass5">
                                    <div class="card shadow-lg mb-2 text-center myclass6">
                                        <div class="card-body">
                                            <img src="image/<?php if(isset($row['p_desc'])){echo $row['p_desc'];}?>.jpg" alt="<?php if(isset($row['p_desc'])){echo $row['p_desc'];}?>" width=75 height=75 class="img-fluid rounded-circle" style="border-radius: 100px;">
                                            <h4 class="card-title mt-4 mb-4"><?php if(isset($row['p_capacity'])){echo $row['p_capacity'];}?> Litre</h4>
                                            <h1 class="card-title">&#8377 <?php if(isset($row['p_price'])){echo $row['p_price'];}?></h1>
                                            <p class="card-text">
                                            <?php if(isset($row['p_desc'])){echo $row['p_desc'];}?>
                                            </p>
                                            <form action="membersignup.php" method="GET">
                                                <input type="hidden" name="pid" value="<?php if(isset($row['p_id'])){ echo $row['p_id'];}?>">
                                                <input type="submit" name="submit" value="Become a member" class="btn btn-outline-primary btn-sm">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php }}}?>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
                <?php
                }
                else
                {
                    $sql = "SELECT * FROM viewdetail WHERE d_email = '{$email}'";
                    $result = $conn->query($sql);
                    $days = $result->num_rows;
                    if($days == 30 && $active == 1)
                    {
                        $sql1 = "UPDATE membership_tb SET member_active = '0' WHERE member_email = '{$email}'";
                        if($conn->query($sql1) == TRUE)
                        {
                            //echo '<script> location.href = 'index.php'; </script>';
                            echo '<meta http-equiv = "refresh" content="0"/>';
                        }
                    }
                    $sub_day = 30;
                    if($days)
                    {
                        $sub_day = 30 - $days;
                    }
                    $litre =0;
                    $bill = 0;
                    while($row = $result->fetch_assoc())
                    {
                        $litre = $litre + $row['d_quantity']; 
                        $bill = $bill + $row['d_price'];
                    }
                ?>
                <div class="col-md-10 mt-5">
                    <h1 class="text-center text-primary pb-3" style="border-bottom:1px solid"><?php if(isset($name)){echo $name;}?>, Your Membership expired in
                     <?php if(isset($sub_day)){echo $sub_day;}else {echo '30';}?> Days</h1>
                    <div class="row">
                        <div class="card shadow-lg m-2 ml-5 col-sm-3 text-center">
                            <div class="card-body">
                                <h1 class="card-title"><i class="fas fa-shopping-cart"></i> </h1>
                                <p class="card-text"><h2><?php if(isset($litre)){echo $litre;}else {echo '0';}?> Litre</h2>
                                </p>               
                            </div>
                        </div>
                        <div class="card shadow-lg m-2 col-sm-3 text-center">
                            <div class="card-body">
                                <h1 class="card-title">Bill </h1>
                                <p class="card-text"><h2>&#8377 <?php if(isset($bill)){echo $bill;}else {echo '0';}?></h2>
                                </p>               
                            </div>
                        </div>
                        <div class="card shadow-lg m-2 col-sm-3 text-center">

                            <div class="card-body">
                                <h1 class="card-title">Paid </h1>
                                <p class="card-text"><h2>&#8377 <?php if(isset($paid)){echo $paid;}else {echo '0';}?></h2>
                                </p>               
                        </div>
                    </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-5 text-center">
                            <div>
                                <h2>Your Last Transaction</h2>
                                <?php 
                        $sql = "SELECT * FROM viewdetail WHERE d_email = '{$email}' ORDER BY d_id DESC LIMIT 5 ";
                        $result = $conn->query($sql);
                        if($result)
                        {
                            echo '<script>console.log('.$result->num_rows.')</script>';
                            if($result->num_rows > 0)
                            {
                    ?>
                                <table class="table mt-3 table-hover">
                                    <thead>
                                        <tr>
                                        <th scope="col" class="text-center">Sr No.</th>
                                        <th scope="col" class="text-center">Date</th>
                                        <th scope="col" class="text-center">Quantity</th>
                                        <th scope="col" class="text-center">Delivered</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $count = 1;
                                        while($row = $result->fetch_assoc()){
                                    ?>
                                        <tr>
                                        <th scope="row" class="text-center"><?php if(isset($count)){echo $count ;}?></th>
                                        <td><?php if(isset($row['d_date'])){ echo $row['d_date'];}?></td>
                                        <td><?php if(isset($row['d_quantity'])){ echo $row['d_quantity'];}?> Litre</td>
                                        <td class="text-center"><?php if(isset($row['d_delivered'])){
                                            if($row['d_delivered']=='YES'){echo '<i class="fas fa-check-circle text-success fa-2x"></i>';}
                                            else{echo '<i class="fas fa-times-circle text-danger fa-2x"></i>' ;} }?></td>
                                        </tr>
                                        <?php $count = $count +1;
                                    }
                                ?>
                                        </tbody>
                                </table>
                                <a href="viewall.php" class="btn btn-primary mb-5">View All</a>
                                <?php
                            }
                            else
                                {
                                    echo '<div>No Transaction Found</div>';
                                }

                            }
                            else
                            {
                                echo '<script>console.log(error)</script>';
                            }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-6 ml-5 mb-5">
                        <form action="" method="post" class="p-4 shadow-lg mt-4">
                            <div class="form-group">
                                <label for="cname" class="font-weight-bolder">Customer Name</label>
                                <input type="text" name="cname" id="cname" readonly value="Mayur<?php if(isset($row[''])){echo $row[''];}?>"
                                class="form-control" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="cdate" class="font-weight-bolder">Date</label>
                                <input type="date" name="cdate" id="cdate" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="cdesc" class="font-weight-bolder">Reason : </label>
                                <input type="text" name="cdesc" id="cdesc" 
                                class="form-control" placeholder="Reason">
                            </div>
                            <input type="submit" value="Leave Request" name="leaverequest" class="btn btn-outline-success">
                            <input type="reset" class="btn btn-outline-secondary">
                            <?php
                                if(isset($msg))
                                {
                                    echo $msg;
                                }
                            ?>
                        </form>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
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