<?php
    include_once('dbConnection.php');
    include('header.php');
?>


<div class=" mt-2 myclass1 ">
    <div class="jumbotron bg-warning myclass2 text-center">
        <h2 class="text-center text-white">Your Plans</h2>
        <div class="container myclass3">
            <div class="row mt-2 myclass4">

            <?php 
                $sql = "SELECT * FROM milk_price ORDER BY p_capacity";
                $result = $conn->query($sql);
                if($conn->query($sql)==TRUE)
                {
                    if($result->num_rows > 0)
                    {
                        while($row = $result->fetch_assoc()){
                    
            ?>
            
                <div class="myclass5">
                    <div class="card shadow-lg m-2 text-center myclass6">
                        <div class="card-body">
                            <img src="image/<?php if(isset($row['p_desc'])){echo $row['p_desc'];}?>.jpg" alt="<?php if(isset($row['p_desc'])){echo $row['p_desc'];}?>" width=75 height=75 class="img-fluid rounded-circle" style="border-radius: 100px;">
                            <h4 class="card-title mt-4 mb-4"><?php if(isset($row['p_capacity'])){echo $row['p_capacity'];}?> Litre</h4>
                            <h1 class="card-title">&#8377 <?php if(isset($row['p_price'])){echo $row['p_price'];}?></h1>
                            <p class="card-text">
                            <?php if(isset($row['p_desc'])){echo $row['p_desc'];}?>
                            </p>
                            <!--<form action="membersignup.php" method="GET">
                                <input type="hidden" name="pid" value="<?php if(isset($row['p_id'])){ echo $row['p_id'];}?>">
                                <input type="submit" name="submit" value="Become a member" class="btn btn-outline-primary btn-sm">
                            </form>-->
                        </div>
                    </div>
                </div>
                <?php }}}?>
            </div>
           
        </div><a href="admin.php" class="btn btn-danger mt-5">Back To Home</a>
    </div>
    
</div>

<?php
include('footer.php');
?>