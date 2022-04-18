<?php
    include_once('dbConnection.php');
    include('header.php');
?>

<?php 
    $sql = "SELECT * FROM leaverequest_tb";
    $result = $conn->query($sql);
    if($conn->query($sql)==TRUE)
    {
        if($result->num_rows > 0)
        {       
?>

    <!-- Start Side Bar-->
        <div class="container-fluid mt-5" >
            <div class="row" style="margin-top:58px;">
            <?php
                    include('sidebar.php');
                ?>
                <div class="col-md-10 mt-3 content">
                    <div class="row">
                    <?php
                        while($row = $result->fetch_assoc()){
                    ?>
                        <div class="col-lg-4">
                        <div class="card mb-3">
                            <div class="card-header"><!-- Request ID : -->Leave Request <?php// if(isset($row['lr_id'])){echo $row['lr_id'];}*?></div>
                                <div class="card-body">
                                <h5 class="card-title">Requester Info : <?php if(isset($row['lr_name'])){echo $row['lr_name'];}?></h5>
                                <p class="card-text"><?php if(isset($row['lr_reason'])){echo $row['lr_reason'];}?></p>
                                <p class="card-text"><?php if(isset($row['lr_date'])){echo $row['lr_date'];}?></p>
                                <div class="float-right">
                                    <form action="" method="POST">
                                    <input type="hidden" name="id" value="<?php if(isset($row['lr_id'])){echo $row['lr_id'];}?>">
                                    <input type="submit" class="btn btn-secondary" name="close" value="Close">
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>

                        <?php 
                        }}
                        else
                        echo "No Request Found";
                    }

                    if(isset($_REQUEST['close']))
                    {
                        $sql = "DELETE FROM leaverequest_tb WHERE lr_id={$_REQUEST['id']}";
                        if($conn->query($sql) == TRUE){
                            echo'<meta http-equiv = "refresh" content="0;URL=?deleted"/>';
                        }
                        else{
                            $msg = '<div class="alert alert-danger mt-2">Unable to Delete</div>';
                        }
                    }
                        ?>
                        </div>
                    </div>
                </div>
                
                <?php if(isset($msg)){echo $msg;}?>
                
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