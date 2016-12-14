<?php
session_start();

if (isset ( $_SESSION ['jrkn'] )) {
	error_reporting(E_ALL & ~E_NOTICE);
	include 'planc.php';
	include 'c.php';
	$numberOfUsers = 8;
	
	if ( isset ( $_GET ['tab'] ) && isset ( $_GET ['box'] ) ){
		

		$tab = $_GET ['tab'];
		$box = $_GET ['box'];
		
		if ( $box != 0 ) {
			if ( $box != 1 ) die();
		}
		
		$uid = $_SESSION ['jrkn'];
		
		//Näita meile:
		
		if($box == 0)
			$query = mysqli_query($con,"SELECT * FROM emails WHERE assigned='$uid' AND state='$tab' ORDER BY stamp DESC") or die(mysqli_error($con));
		else
			$query = mysqli_query($con,"SELECT * FROM emails WHERE state='$tab' ORDER BY stamp DESC") or die(mysqli_error($con));
			
			
			
		//Näita päist
		echo '
			<thead>
				<tr>
					<th>Omanik</th>
					<th>Aeg</th>
					<th>Saatja</th>
					<th>Teemarida</th>
					<th>Valikud</th>
				</tr>
			</thead>
			<tbody>
		';
		
		while($array = mysqli_fetch_array($query)){
			$id = $array[0];
			$kellelt = $array[2];
			$teema = $array[3];
			$kuup2ev = $array[4];
			$assignedTo = $array[6];
			$state = $array[7];
			$stamp = $array[1];


		$today = new DateTime(); // This object represents current date/time
		$today->setTime( 0, 0, 0 ); // reset time part, to prevent partial comparison

		$match_date = DateTime::createFromFormat( "U", $stamp );
		$match_date->setTime( 0, 0, 0 ); // reset time part, to prevent partial comparison

		$diff = $today->diff( $match_date );
		$diffDays = (integer)$diff->format( "%R%a" ); // Extract days count in interval

		switch( $diffDays ) {
    		case 0:
    			$kuup2ev = "Täna, kell ".strftime('%H %M', $stamp);
        		break;
    		case -1:
    			$kuup2ev = "Eile, kell ".strftime('%H %M', $stamp);
        		break;
		}
		

			
			$leiaOmanik = mysqli_query($con,"SELECT * FROM users WHERE uid='$assignedTo'") or die(mysqli_error($con));
			if(mysqli_num_rows($leiaOmanik) == 1){
				while($omanikud = mysqli_fetch_array($leiaOmanik)){
					$omanik = $omanikud[1];
					$style = "style='background-color: #".$omanikud[3]."'";
				}
			}
			
			//KUI OLED OMANIK
			if($assignedTo == $uid){
				
				echo "
				
				<tr onclick='preview($id)' $style>
					<td>$omanik</td>
					<td>$kuup2ev</td>
					<td>$kellelt</td>
					<td>$teema</td>
					<td>
				";
				if($state == 1){
					echo "
					<button type='button' class='btn btn btn-primary' onclick='window.location=\"/meilid/$id.eml\"'>Avan</button>
					<button type='button' class='btn btn btn-info' onclick='update($id,2)'>Tellimisele</button>
					<button type='button' class='btn btn btn-success' onclick='update($id,3)'>Tehtud</button>
					<button type='button' class='btn btn btn-danger' onclick='loobu($id)'>Loobun</button>
													";	
				}else if($state == 2){
					echo "
					<button type='button' class='btn btn-outline btn-success' onclick='update($id,3)'>Tehtud</button>
					<button type='button' class='btn btn-outline btn-danger' onclick='loobu($id)'>Loobun</button>				
					<button type='button' class='btn btn-outline btn-primary' onclick='window.location=\"/meilid/$id.eml\"'>Avan</button>				
					";
				}else if($state == 3){
					echo "
					<button type='button' class='btn btn-outline btn-danger' onclick='loobu($id)'>Loobun</button>					
					<button type='button' class='btn btn-outline btn-primary' onclick='window.location=\"/meilid/$id.eml\"'>Avan</button>
					";
				}
				echo "
					</td>
				</tr>
				
				";
				
			//KUI EI OLE OMANIK
			}else{
				echo "
				
				<tr onclick='preview($id)' $style>
					<td>$omanik</td>
					<td>$kuup2ev</td>
					<td>$kellelt</td>
					<td>$teema</td>
					<td>
				";
				//VALMIS ÜLESANNET EI TOHI NAPSATA
				if($state != 3) echo "<button type='button' class='btn btn-outline btn-default' onclick='assign($assignedTo,$pre)'>Võtan</button>";
				
				echo "		
						<button type='button' class='btn btn-outline btn-primary' onclick='window.location=\"/meilid/$id.eml\"'>Avan</button>
					</td>
				</tr>
				
				";
			}
		}
		echo '</tbody>';
	}
}else{
	header("Location: /");
}
?>