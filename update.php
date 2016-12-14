<?php
session_start();
if (isset ( $_SESSION ['jrkn'] ) && isset ( $_GET ['id'] ) && isset ( $_GET ['state'] )) {
	include 'c.php';
	$id = $_GET ['id'];
	$uid = $_SESSION ['jrkn'];
	$state = $_GET ['state'];
	$date = date("Y-m-d H:i");
	$kontroll = mysqli_query ( $con, "UPDATE emails SET state='$state' WHERE id='$id'" ) or die(mysqli_error($con));
	$logi = mysqli_query ( $con, "INSERT INTO log VALUES ('$uid','$id','liigutas kausta $state','$date')" ) or die(mysqli_error($con));
	die("success");
}
?>