<?php
// open MySQL connection
$con = mysqli_connect ( "localhost", "gorilla", "SgUHKE1jBMsQUQWe", "gorilla_database" );
if (! $con) {
	echo 'Could not connect: ' . mysqli_error ( $con );
} else {
	mysqli_set_charset ( $con, 'utf8' );
}

?>