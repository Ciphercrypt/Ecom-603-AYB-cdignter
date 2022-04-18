<?php 
    include_once('dbConnection.php');
    include('header.php');
    
?>
<style>
  #addtocard {
    display: none;
  }
  #addtocard:hover {
    display: inline;
    visibility: visible;
  }
</style>

<div class="container" style="background-image: url('image/sky.jpeg');
background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">
  <div class="row mt-5">
    <div class="col-sm-4">
      <!-- Tujh Je asel Te taak yaa madhye -->
    </div>
    <div class="col-sm-8">
      <div class="row">
        <div class="card shadow-lg m-3 text-center col-md-5">
          <div class="card-body">
            <img src="image/Cows Milk.jpg" alt="" class="img-fluid" >
            <h5 class="card-title mt-4 mb-3">Tujh Description Taak Retrieve karun</h5>
            
            <div class="text-center">&#8377 <s class=" text-center mr-2">10000</s><span class="h4 btn btn-success">&#8377 700  <span class="badge badge-warning ml-2">90% Off</span></span></div>

            <?php $key = 1;
            if($key==1)
            { echo '<b><p class="text-center text-success">In Stock</p></b>';
            }else{ 
            echo '<b><p class="text-center text-danger">Out of  Stock</p></b>';
            }?>
            <button class="btn btn-warning text-light btn-sm mr-1" onmouseover="myFunction()"><i class="fas fa-shopping-cart mr-1"></i> <b id="addtocard">ADD TO CART</b> </button>
            <button class="btn btn-success text-light btn-sm"><i class="fas fa-bolt mr-1"></i> <b>BUY NOW</b> </button>
            <div class="text-left mt-3"><a href="#" >See more</a></div>
          </div>
        </div>
        <div class="card shadow-lg m-3 text-center col-sm-5">
          <div class="card-body">
            <img src="image/Cows Milk.jpg" alt="" class="img-fluid" >
            <h5 class="card-title mt-4 mb-2">Tujh Description Taak Retrieve karun</h5>
            
            <div class="card-title "> <span class="h5"><s class="text-center">&#8377 10000</s></span> <span class="h4 btn btn-success">&#8377  700</span>  <span class="badge badge-warning ml-2">90% Off</span> </div>
            <?php $key = 2;
            if($key==1)
            { echo '<b><p class="text-center text-success">In Stock</p></b>';
            }else{ 
            echo '<b><p class="text-center text-danger">Out of  Stock</p></b>';
            }?>
            <button class="btn btn-warning text-light btn-sm mr-1"><i class="fas fa-shopping-cart mr-1"></i> <b>ADD TO CART</b> </button>
            <button class="btn btn-success text-light btn-sm"><i class="fas fa-bolt mr-1"></i> <b>BUY NOW</b> </button>
          </div>
        </div>
        <div class="card shadow-lg m-3 text-center col-sm-5">
          <div class="card-body">
            <img src="image/Cows Milk.jpg" alt="" class="img-fluid" >
            <h5 class="card-title mt-4 mb-2">Tujh Description Taak Retrieve karun</h5>
            <h5>
            <s class="d-block text-center">&#8377 10000</s>
            </h5>
            <div class="card-title btn btn-success"> <span class="h4"> 700</span>  <span class="badge badge-warning ml-2">90% Off</span> </div>
            <?php $key = 1;
            if($key==1)
            { echo '<b><p class="text-center text-success">In Stock</p></b>';
            }else{ 
            echo '<b><p class="text-center text-danger">Out of  Stock</p></b>';
            }?>
            <button class="btn btn-warning text-light btn-sm mr-1"><i class="fas fa-shopping-cart mr-1"></i> <b>ADD TO CART</b> </button>
            <button class="btn btn-success text-light btn-sm"><i class="fas fa-bolt mr-1"></i> <b>BUY NOW</b> </button>
          </div>
        </div>
        <div class="card shadow-lg m-3 text-center col-sm-5">
          <div class="card-body">
            <img src="image/Cows Milk.jpg" alt="" class="img-fluid" >
            <h5 class="card-title mt-4 mb-2">Tujh Description Taak Retrieve karun</h5>
            <h5>
            <s class="d-block text-center">&#8377 10000</s>
            </h5>
            <div class="card-title btn btn-success"> <span class="h4"> 700</span>  <span class="badge badge-warning ml-2">90% Off</span> </div>
            <?php $key = 1;
            if($key==1)
            { echo '<b><p class="text-center text-success">In Stock</p></b>';
            }else{ 
            echo '<b><p class="text-center text-danger">Out of  Stock</p></b>';
            }?>
            <button class="btn btn-warning text-light btn-sm mr-1"><i class="fas fa-shopping-cart mr-1"></i> <b>ADD TO CART</b> </button>
            <button class="btn btn-success text-light btn-sm"><i class="fas fa-bolt mr-1"></i> <b>BUY NOW</b> </button>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  function myFunction() {
  var x = document.getElementById("addtocard");
  if (x.style.display === "none") {
    x.style.display = "inline";
  } else {
    x.style.display = "none";
  }
}
</script>
<?php
include('footer.php');
?>