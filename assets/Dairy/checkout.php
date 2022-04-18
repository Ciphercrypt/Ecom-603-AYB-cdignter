<?php 
$email = "Mayur@gmail.com";
$price = 500;
include('dbConnection.php');
?>
<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="GENERATOR" content="Evrsoft First Page">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OSMS</title>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="css/all.min.css">

    <!-- Custom CSS-->
    <link rel="stylesheet" href="css/style.css">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300&display=swap" rel="stylesheet">

</head>
<body>

    <!-- Top Nav Bar -->
    <nav class="navbar navbar-dark fixed-top bg-primary flex-md-nowrap p-0 shadow">
            <a href="index.php" class="navbar-brand col-sm-3 col-md-2 mr-0">Dairy Management System</a>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mt-5">
                <h3 class="mb-3 text-primary">Welcome TO Dairy Management Page</h3>
                <form method="post" action="./PaytmKit/pgRedirect.php">
                    <div class="form-group row">
                        <label for="ORDER_ID" class="col-sm-4 col-form-label">Order ID</label>
                        <div class="col-sm-8">
                            <input id="ORDER_ID" class="form-control" tabindex="1" maxlength="20" readonly size="20" name="ORDER_ID" autocomplete="off" value="<?php echo "ORDS".rand(10000,99999999);?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="CUST_ID" class="col-sm-4 col-form-label">Customer Email</label>
                        <div class="col-sm-8">
                            <input id="CUST_ID" class="form-control" tabindex="2" maxlength="12" readonly size="12" name="CUST_ID" autocomplete="off" value="<?php if(isset($email)){echo $email;}?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="TXN_AMOUNT" class="col-sm-4 col-form-label">Amount</label>
                        <div class="col-sm-8">
                            <input id="TXN_AMOUNT" class="form-control" tabindex="10" readonly name="TXN_AMOUNT" autocomplete="off" value="<?php if(isset($price)){echo $price;}?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <!--<label class="col-sm-4 col-form-label" for="INDUSTRY_TYPE_ID">INDUSTRY_TYPE_ID </label>-->
                        <input id="INDUSTRY_TYPE_ID" type="hidden" class="form-control" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail"></td>
                    </div>
                    <!--<label>Channel ::*</label>-->
					<input id="CHANNEL_ID" type="hidden" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
					
                    <div class="text-center">
                        <input value="CheckOut" type="submit" class="btn btn-primary" onclick=""></td>
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                    </div>
                    
                </form>
                <small class="form-text text-muted">Note : Complete Payment By clicking CheckOut Button
                </small>
            </div>
        </div>
    </div>

<?php 
include('footer.php');

?>