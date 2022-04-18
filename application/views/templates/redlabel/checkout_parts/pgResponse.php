<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");



$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo "<b>Transaction status is success</b>" . "<br/>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}
	
	if (isset($_POST) && count($_POST)>0 )
	{  ?> <form method="POST" action="<?=base_url()?>Checkout/paytm_result" id="avi" name="avi"> 
	<?php if (isset($_SESSION['logged_user'])){ ?> 
		<input type="text" name="Cust_id" value="<?=$_SESSION['logged_user']?>"><?php }
		foreach($_POST as $paramName => $paramValue) {
				echo "<br/>" . $paramName . " = " . $paramValue;
				?> <input type="text" name="<?=$paramName?>" value="<?=$paramValue?>"> <?php
		} ?>
		<script type="text/javascript">
    window.onload=function(){ 
        window.setTimeout(document.avi.submit(), 10000);
    };
</script>
		 <?php

	 ?>	</form> <?php
	}
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>