<?php 
include('header.php');
include('dbConnection.php');

?>

<div class="container mt-5">
    <h3 class="text-center text-primary pt-5 pb-3" style="border-bottom:1px solid red">Add milk Details</h3>
    <center>
    <form action="" method="POST" class="col-md-6 mt-5">
        <div class="form-group text-left">
            <label for="milk_quantity" class="font-weight-bolder ">Milk Quantity in Litre</label>
            <input type="text" class="form-control" id="milk_quantity" name="milk_quantity">
        </div>
        <div class="form-group text-left">
            <label for="milk_price" class="font-weight-bolder">Milk Price</label>
            <input type="text" class="form-control" id="milk_price" name="milk_price">
        </div>
        <div class="form-group text-left">
            <label for="milk_desc" class="font-weight-bolder">Milk Description</label>
            <select name="milk_desc" id="milk_desc" class="form-control">
                <option value="Cows Milk">Cow Milk</option>
                <option value="Buffalos Milk">Buffalow Milk</option>
            </select>
        </div>
        <input type="submit" name="additem" id="additem" value="Add Item" class="btn btn-outline-danger mr-2">
        <a href="editplan.php" class="btn btn-outline-secondary">Back</a>
        
        
        <?php
            if(isset($_REQUEST['additem']))
            {
                if(($_REQUEST['milk_quantity']=="")||($_REQUEST['milk_price']=="")||($_REQUEST['milk_desc']==""))
                {
                    $msg = '<div class="alert alert-warning  mt-2">Fill All Fields...</div>';
                }
                else
                {
                    $emilk_price = $_REQUEST['milk_price'];
                    $emilk_Qty = $_REQUEST['milk_quantity'];
                    $emilk_desc = $_REQUEST['milk_desc'];

                    $sql = "INSERT INTO milk_price (p_price,p_capacity,p_desc,p_alt) VALUES ('$emilk_price',
                     '$emilk_Qty', '$emilk_desc','$emilk_desc')";
                    
                    $result = $conn->query($sql);
                    if($result==TRUE)
                    {
                        $msg = '<div class="spinner-border text-success p-2" role="status">
                        <span class="sr-only">Loading...</span>
                      </div><script>setTimeout(()=>{
                        window.location.href = "editplan.php";
                    }, 1000);</script>';
                    }
                    else
                    {
                        $msg = '<div class="alert alert-danger mt-2">Unable to Update</div>';
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