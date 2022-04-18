<?php
    include_once('dbConnection.php');
    //SESSION Varible
    $email = "Mayur@gmail.com";
?>
<?php
    include('header.php');
?>
    <div class="container-fluid mt-5" >
        <div class="row" style="margin-top:58px;">
        <?php
                    include('sidebar.php');
                ?>
            <div class="col-md-10 mt-4 content">
            <h2 class="text-center text-primary mb-5 mt-4">Your Monthly Consumption of Milk</h2>
            <div class="row">
                <div class="col-md-6">
                <?php 
                $sql = "SELECT * FROM viewdetail WHERE d_email = '{$email}' ORDER BY d_id DESC";
                $result = $conn->query($sql);
                if($result)
                {
                    if($result->num_rows > 0)
                    {
                ?>
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
                        <tbody width="100px" style="overflow:scroll;">
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
                        }}
                        
                        else
                        {
                            echo '<h1>No records Found</h1>';
                        }}?>
                            </tbody>
                    </table>
                    <div class="text-center"><a href="index.php" class="btn btn-primary mb-3">Back To Home</a></div>
                </div>

                <?php
                    if(isset($_REQUEST['cdoubt1']))
                    {
                        if($_REQUEST['cdoubt'])
                        {
                        $sql = "SELECT * FROM membership_tb WHERE member_email = '{$email}'";
                        $result = $conn->query($sql);
                        if($result == TRUE)
                        {
                            $row = $result->fetch_assoc();
                            $cemail = $row['member_email'];
                            $cname = $row['member_name'];
                        }
                            $cdoubt = $_REQUEST['cdoubt'];

                            $sql1 = "INSERT INTO query(q_email,q_name,q_doubt) VALUES ('$cemail','$cname','$cdoubt')";
                            if($conn->query($sql1))
                            {
                                $pass = '<div class="alert alert-success">Query Submitted</div>';
                            }
                            else
                            {
                                $pass = '<div class="alert alert-danger">Unable to submitted Submitted</div>';
                            }
                        
                        }
                        else
                            {
                                $pass = '<div class="alert alert-warning">Fill your Doubt</div>';
                            }}
                    
                ?>
                <div class="col-md-5">
                    <form action="" method="post" class="jumbotron mt-3">
                        <div class="form-group">
                            <label for="cdoubt" class="font-weight-bolder">Any Doubt</label>
                            <input type="text" name="cdoubt" id="cdoubt" class="form-control" placeholder="Doubt">
                        </div>
                        <input type="submit" name="cdoubt1" value="Place Your Doubt" class="btn btn-danger text-center">
                    </form>
                    <?php 
                       if(isset($pass)){echo $pass;}
                    ?>
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