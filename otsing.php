<?php
session_start();
if (isset ( $_SESSION ['jrkn'] ) && isset ( $_GET ['q'] ) && isset ( $_GET ['type'] )) {
	include 'c.php';
	$q = $_GET ['q'];
	$type = $_GET ['type'];
	$uid = $_SESSION ['jrkn'];
	$otsi = mysqli_query($con,"SELECT * FROM emails WHERE fromaddress LIKE '%$q%' OR subject LIKE '%$q%' AND state='$type' ORDER BY kuup DESC") or die ("Ei saanud otsida :(");


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
		
		while($array = mysqli_fetch_array($otsi)){
			$id = $array[0];
			$kellelt = $array[1];
			$teema = $array[2];
			$kuup2ev = $array[3];
			$assignedTo = $array[5];
			$state = $array[6];
			if($assignedTo != 0){
				$leiaOmanik = mysqli_query($con,"SELECT * FROM users WHERE uid='$assignedTo'") or die(mysqli_error($con));
				if(mysqli_num_rows($leiaOmanik) == 1){
					while($omanikud = mysqli_fetch_array($leiaOmanik)){
						$omanik = $omanikud[1];
						$style = "style='background-color: #".$omanikud[3]."'";
					}
				}
			}else{
				$style = "style='background-color: #FFFFFF'";
				$omanik = "";
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
?>