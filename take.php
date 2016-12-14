<?php
session_start();
if (isset ( $_SESSION ['jrkn'] ) && isset ( $_GET ['id'] )) {
	include 'c.php';
	$id = $_GET ['id'];
	$uid = $_SESSION ['jrkn'];
	$date = date("Y-m-d H:i");
	if(isset($_GET ['c']) && $_GET ['c'] == 1){
		$vaata = mysqli_query ( $con, "SELECT * FROM emails WHERE assigned='0' AND id='$id'" ) or die(mysqli_error($con));
		if(mysqli_num_rows($vaata) == 0) die("na");
	}
		
	$kontroll = mysqli_query ( $con, "UPDATE emails SET assigned='$uid',state='1' WHERE id='$id'" ) or die(mysqli_error($con));
	$logi = mysqli_query ( $con, "INSERT INTO log VALUES ('$uid','$id','võttis','$date')" ) or die(mysqli_error($con));
	die("success");
}
?>