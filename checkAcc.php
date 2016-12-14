<?php
session_start ();
include 'c.php';
if (! empty ( $_POST ['username'] ) && ! empty ( $_POST ['pwd'] )) {
	$username = strtolower ( mysqli_real_escape_string ( $con, $_POST ['username'] ) );
	$password = $_POST ['pwd'];
	$result = mysqli_query ( $con, "SELECT * FROM users WHERE username='$username' AND password='$password'") or die ( mysqli_error ( $con ) );
	if (mysqli_num_rows ( $result ) == 1) {
		while ( $row = mysqli_fetch_array ( $result ) ) {
			$_SESSION ['jrkn'] = $row ['uid'];
		}
		print 'success';
	}else{
		die("0");
	}
}else if(isset($_SESSION['jrkn'])){
	header("Location: ../");
}else{
	die("0");
}
?>