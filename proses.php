<?php
require("routeros_api.class.php");
$API = new routeros_api();
$API->debug = false;
$username_mikrotik  = "user mikrotiknya";
$password_mikrotik  = "password mikrotiknya";
$iphost_mikrotik    = "ip mikrotiknya";

if($API->connect($iphost_mikrotik, $username_mikrotik, $password_mikrotik)){
$voucher		= $_POST['voucher'];
$comment		= $_POST['comment'];
	try {
	$cekuser = $API->comm('/ip/hotspot/user/print',array(
			"?name"     => $username,
			));
	if(count($cekuser)>0){
		echo "<script>window.location='http://internet.highlandcamp.co.id/gagal.html'</script>";
	}else{
    $API->comm("/ip/hotspot/user/add", array(
			"server"		=> "all",
			"profile"		=> "untuk-tamu",
			"name"     		=> $voucher,
			"password"		=> $voucher,
			"comment"		=> $comment,
			"limit-uptime"	=> "00:15:00",
			));
    echo "<script>window.location='http://internet.highlandcamp.co.id'</script>";
		}
		$API->disconnect();
	} 
	catch (Exception $ex) {
	echo "Caught exception from router: " . $ex->getMessage() . "\n";
	}	
 
} else {
  echo " Router Not Connected";
  }
?>
