<?php
if(isset($_POST['login'])){
	
	
	// Authorisation details.
	$username = "aungnainghtwe9415@gmail.com";
	$hash = "a7b42b2a9eaf8398594d66cbde6008093c5cdd4257618d8a06dae53431641b85";

	// Config variables. Consult http://api.txtlocal.com/docs for more info.
	$test = "0";
	$name =$_POST['name'];
	// Data for text message. This is the text message data.
	$sender = "Aroma Tazeen"; // This is who the message appears to be from.
	$numbers = $_POST['num']; // A single number or a comma-seperated list of numbers
	
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$otp=mt_rand(100000,999999);
		setcookie("otp", $otp);
		$message = "Hey ".$name. " your OTP IS ".$otp;
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.txtlocal.com/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the re00sult from the API
	echo("OTP SEND Successfully!");
	curl_close($ch);
}
if(isset($_POST['ver'])){
$verotp=$_POST['otp'];
if($verotp==$_COOKIE['otp']){
echo("logined successfully");

}else{
echo("otp worng");
}
}
?>