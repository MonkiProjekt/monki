<?php
session_start();

if (isset ( $_SESSION ['jrkn'] ) && isset( $_GET['id'] ) && is_numeric($_GET['id'])) {
	include 'c.php';
	$id = $_GET['id'];
	$query = mysqli_query($con,"SELECT * FROM emails WHERE id='$id'") or die(mysqli_error($con));
	while($array = mysqli_fetch_array($query)){
		echo urldecode($array[5]);
	}
}

?>