<?php
session_start();
if (isset ( $_SESSION ['jrkn'] ) && isset ( $_GET ['id'] )) {
	include 'c.php';
	$id = $_GET ['id'];
	$uid = $_SESSION ['jrkn'];
	$date = date("Y-m-d H:i");
	$kontroll = mysqli_query ( $con, "UPDATE emails SET state='0',assigned='0' WHERE id='$id'" ) or die(mysqli_error($con));
	$logi = mysqli_query ( $con, "INSERT INTO log VALUES ('$uid','$id','loobus','$date')" ) or die(mysqli_error($con));
	die("success");
}
?>