<?php
    if(!isset($_REQUEST['email']))
    {
        echo '<script> location.href = "admin.php"</script>';
    }
    $email = $_REQUEST['email'];
    
    include_once('dbConnection.php');
    if(isset($_REQUEST['update']))
    {
        if($_REQUEST['cname'] && $_REQUEST['date'] && $_REQUEST['time'] && $_REQUEST['cquantity'] && $_REQUEST['cprice'] && $_REQUEST['tdelivered'])
        {
            $delivered = $_REQUEST['tdelivered']; $date = $_REQUEST['date']; $price = $_REQUEST['cprice'];
            $time = $_REQUEST['time']; $quantity = $_REQUEST['cquantity']; 
            $sql = "INSERT INTO viewdetail (d_price, d_date, d_time, d_quantity,d_email, d_delivered) VALUES
             ('$price', '$date', '$time', '$quantity','$email', '$delivered');";
             if($conn->query($sql))
             {
                 echo '<meta http-equiv = "refresh" content="0">';
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
    
?>
<?php
    include('header.php');
?>
    <div class="container-fluid mt-5">
        <div class="row"  >
        <div class="col-md-6 mt-5" >
        <?php 

            //Session Variable
            $email = $_REQUEST['email'];
            //$sql = "SELECT * FROM membership_tb WHERE member_email = 'Mayur@gmail.com'";
            $sql = "SELECT * FROM membership_tb WHERE member_email = '{$email}'";
            $result =$conn->query($sql);
            if($result == TRUE)
            {
                if($result->num_rows >= 1)
                {
                    $row = $result->fetch_assoc();
                    $name = $row['member_name'];
                }
                else{
                    $msg = "ERORR";
                }
            }

            $sql = "SELECT * FROM viewdetail WHERE d_email = '{$email}' ORDER BY d_id DESC";
            $result = $conn->query($sql);
            if($result)
            {
                if($result->num_rows > 0)
                {
        ?>
        <h3 class="text-center text-primary mb-4"><?php if(isset($name)){echo $name;}?>'s Consumption of Milk</h3>
                    <table class="table mt-3 table-hover">
                        <thead>
                            <tr>
                            <th scope="col" class="text-center">Sr No.</th>
                            <th scope="col" class="text-center">Date</th>
                            <th scope="col" class="text-center">Time</th>
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
                            <td><?php if(isset($row['d_time'])){echo $row['d_time'] ;}?></td>
                            <td><?php if(isset($row['d_quantity'])){ echo $row['d_quantity'];}?> Litre</td>
                            <td class="text-center"><?php if(isset($row['d_delivered'])){
                                if($row['d_delivered']=='YES'){echo '<i class="fas fa-check-circle text-success fa-2x"></i>';}
                                else{echo '<i class="fas fa-times-circle text-danger fa-2x"></i>' ;} }?></td>
                            </tr>
                            <?php $count = $count +1;
                        }}}?>
                            </tbody>
                    </table>
                    <div class="text-center"><a href="admin.php" class="btn btn-primary">Back To Home</a></div>
        </div>
        <div class="col-md-6 mt-5">
        <h3 class="text-center text-primary">Add new Delivery</h3>

        <?php 
            $email = $_REQUEST['email'];
            //$sql = "SELECT * FROM membership_tb WHERE member_email = 'Mayur@gmail.com'";
            $sql = "SELECT * FROM membership_tb WHERE member_email = '{$email}'";
            $result =$conn->query($sql);
            if($result == TRUE)
            {
                if($result->num_rows >= 1)
                {
                    $row = $result->fetch_assoc();
                }
                else{
                    $msg = "ERORR";
                }
            }
            else
            {
                $msg = "Query Error";
            }
        ?>
        <form action="" method="post" class="p-4 shadow-lg m-4">
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
                    
                    <div class="form-group">
                        <label for="tdelivered" class="font-weight-bolder">Milk Delivered</label>
                        
                        <div class="">
                        <input type="radio" name="tdelivered" class="form-check-input ml-5" id="yes" value="YES"> <label for="yes" class="form-check-label">Yes </label><br>
                        <input type="radio" name="tdelivered" class="form-check-input ml-5" id="no" value="NO">
                        <label for="no" class="form-check-label">No </label>
                        </div>
                        
                    </div>
                    <input type="submit" name="update" id="update" Value="Add Delivery" class="btn btn-outline-primary">
                    <?php
                       if(isset($msg)){ echo $msg;}
                    ?>
                </form>
        </div>
        </div>
    </div>
    
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