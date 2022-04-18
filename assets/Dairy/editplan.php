<?php
    
    include_once('dbConnection.php');
    include('header.php');
    
        $sql = "SELECT * FROM milk_price ORDER BY p_capacity";
        $result = $conn->query($sql);
        if($conn->query($sql)==TRUE)
        {
            $srno = 1;
            
?>

    <div class="container-fluid mt-5" >
        <div class="row">
            <div class="col-md-6 mt-5">
                <h3 class="text-center text-primary mb-3">Your Milk Details</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Sr No.</th>
                            <th scope="col" class="text-center">Milk Quantity</th>
                            <th scope="col" class="text-center">Milk Price</th>
                            <th scope="col" class="text-center">Milk Description</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $result->fetch_assoc())
                            {
                        ?>
                        <tr>
                            <th scope="row" class="text-center"><?php if(isset($srno)){echo $srno;
                            $srno = $srno +1;} ?></th>
                            <td class="text-center"><?php if(isset($row['p_capacity'])){echo $row['p_capacity'];}?> Litre</td>
                            <td class="text-center">&#8377 <?php if(isset($row['p_price'])){echo $row['p_price'];} ?></td>
                            <td class="text-center"><?php if(isset($row['p_desc'])){echo $row['p_desc'];} ?></td>
                            <td>
                                <form method="POST" action="" class="d-inline">
                                    <input type="hidden" name="id" value="<?php if(isset($row['p_id'])){echo $row['p_id'];} ?>">
                                    <button type="submit" class="btn btn-success mr-2" name="view" value="View">
                                    <i class="fas fa-pen"></i>
                                    </button>
                                </form>

                                <form method="POST" class="d-inline">
                                    <input type="hidden" name="id" value="<?php if(isset($row['p_id'])){echo $row['p_id'];} ?>">
                                    <button type="submit" class="btn btn-danger" name="delete" value="Delete">
                                    <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php
                            }}$result->close();
                        ?>
                    </tbody>
                </table>
            </div>
<?php
 if(isset($_REQUEST['view']))
 {
     $sql = "SELECT * FROM milk_price WHERE p_id ={$_REQUEST['id']}";
     $result = $conn->query($sql);
     $row = $result->fetch_assoc();
     $milk_id = $row['p_id'];
     $milk_Qty = $row['p_capacity'];
     $milk_price = $row['p_price'];
     $milk_desc = $row['p_desc'];
 }
?>

            <div class="col-md-5 mt-5">
                <h3 class="text-center text-primary mb-3">Edit milk Details</h3>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="milk_id" class="font-weight-bolder">Milk ID</label>
                        <input type="text" class="form-control" id="milk_id" name="milk_id" readonly value="<?php if(isset($milk_id)){echo $milk_id;} ?>">
                    </div>
                    <div class="form-group">
                        <label for="milk_quantity">Milk Quantity in Litre</label>
                        <input type="text" class="form-control" id="milk_quantity" name="milk_quantity"  value="<?php if(isset($milk_Qty)){echo $milk_Qty;} ?>">
                    </div>
                    <div class="form-group">
                        <label for="milk_price">Milk Price</label>
                        <input type="text" class="form-control" id="milk_price" name="milk_price"  value="<?php if(isset($milk_price)){echo $milk_price;} ?>">
                    </div>
                    <div class="form-group">
                        <label for="milk_desc">Milk Description</label>
                        <select name="milk_desc" id="milk_desc" class="form-control">
                            <option value="Cows Milk">Cow Milk</option>
                            <option value="Buffalos Milk">Buffalow Milk</option>
                        </select>
                    </div>
                    <input type="submit" name="milkupdate" id="milkupdate" value="Update" class="btn btn-warning">
                    <a href="admin.php" class="btn btn-outline-secondary">Back To Home</a>
                    
                    <?php
                        if(isset($_REQUEST['milkupdate']))
                        {
                            if(($_REQUEST['milk_quantity']=="")||($_REQUEST['milk_price']=="")||($_REQUEST['milk_desc']==""))
                            {
                                $msg = '<div class="alert alert-warning  mt-2">Fill All Fields...</div>';
                            }
                            else
                            {
                                $emilk_id = $_REQUEST['milk_id'];
                                $emilk_price = $_REQUEST['milk_price'];
                                $emilk_Qty = $_REQUEST['milk_quantity'];
                                $emilk_desc = $_REQUEST['milk_desc'];

                                $sql = "UPDATE milk_price SET  p_price = '$emilk_price',
                                p_capacity = '$emilk_Qty', p_desc = '$emilk_desc' WHERE p_id = '$emilk_id'";
                                
                                $result = $conn->query($sql);
                                if($result==TRUE)
                                {
                                    $msg = '<div class="alert alert-success mt-2">Update Successfully</div>';
                                    echo '<meta http-equiv = "refresh" content="0;URL=?deleted"/>';
                                }
                                else
                                {
                                   $msg = '<div class="alert alert-danger mt-2">Unable to Update</div>';
                                }
                            }
                        }
                        if(isset($_REQUEST['delete']))
                        {
                            $sql = "DELETE FROM milk_price WHERE p_id={$_REQUEST['id']}";
                            if($conn->query($sql) == TRUE){
                                echo'<meta http-equiv = "refresh" content="0;URL=?deleted"/>';
                            }
                            else{
                                echo 'Unable to Delete Data';
                            }
                        }
                    ?>
                        <?php
                        if(isset($msg)){
                            echo $msg;
                        }
                        ?>
                </form>
            </div>
        </div>
        <a href="addmilk.php" class="btn btn-danger button_new rounded-circle"><i class="fas fa-plus fa-2x" ></i></a>
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