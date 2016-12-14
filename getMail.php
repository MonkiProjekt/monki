<?php
session_start();

if (isset ( $_SESSION ['jrkn'] )) {
	error_reporting(E_ALL & ~E_NOTICE);
	include 'planc.php';
	include 'c.php';
	
	$kasutaja = $_SESSION ['jrkn'];
	
	//Näita meile:
	$query = mysqli_query($con,"SELECT * FROM emails WHERE assigned='0' AND state !='10' ORDER BY stamp DESC") or die(mysqli_error($con));
		
		
		
		
	//Näita päist
	echo '
		<thead>
            <tr>
                <th>Aeg</th>
                <th>Saatja</th>
                <th>Teemarida</th>
				<th>Valikud</th>
            </tr>
        </thead>
		<tbody>
	';
	
	while($array = mysqli_fetch_array($query)){

		//VÕTAME ANDMED
		$id = $array[0];
		$kellelt = $array[2];
		$teema = $array[3];
		$kuup2ev = $array[4];
		$stamp = $array[1];


		$today = new DateTime(); // This object represents current date/time
		$today->setTime( 0, 0, 0 ); // reset time part, to prevent partial comparison

		$match_date = DateTime::createFromFormat( "U", $stamp );
		$match_date->setTime( 0, 0, 0 ); // reset time part, to prevent partial comparison

		$diff = $today->diff( $match_date );
		$diffDays = (integer)$diff->format( "%R%a" ); // Extract days count in interval

		switch( $diffDays ) {
    		case 0:
    			$kuup2ev = "Täna, kell ".strftime('%H:%M', $stamp);
        		break;
    		case -1:
    			$kuup2ev = "Eile, kell ".strftime('%H:%M', $stamp);
        		break;
		}
		
		echo "
		
		<tr onclick='preview($id)'>
            <td>$kuup2ev</td>
            <td>$kellelt</td>
            <td>$teema</td>
            <td>
				<a href='#' onclick='window.location=\"/meilid/$id.eml\"'>Avan</a>
				<a href='#' onclick='take_check($id)'>Võtan</a>
				<a href='#' onclick='spam($id)'>Spam</a>
			</td>
        </tr>
		
		";
		
	}
	echo '</tbody>';
}
?>