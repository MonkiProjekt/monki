<?php

include 'planc.php';
include 'c.php';

$server = "{mail.hot.ee:143}";
$username = "Vanameez007@online.ee";
$password = "Koljat123";
$mbox = imap_open ( $server, $username, $password ) or die ( imap_last_error () );

$message_count = imap_num_msg($mbox);

//MÄRGIME KEELE JA AJA
date_default_timezone_set ("Europe/Tallinn");
setlocale(LC_ALL, 'et_EE');

	//Kui on meile, siis uuenda neid:
		
if ($message_count > 0) {
			
	$i = 1;
			
	while($i <= $message_count){
				
		//VÕTAME MEILI ETTE
		$headers = imap_fetchheader($mbox, $i, FT_PREFETCHTEXT);
				
		//ANNAME MEILIE NIME
		$stamp = time().rand(0,999);
		$name = $stamp.".eml";
		
		echo "Laen alla meili numbriga $i";		
		//SALVESTAME MEILI KATALOOGI
		file_put_contents("./meilid/".$name, $headers . "\n" . imap_body($mbox, $i)) or die();
				
		//ANNAME MEILI PROGRAMMILE
		$emailParser = new PlancakeEmailParser(file_get_contents("./meilid/".$name));
		
		//KONTROLLIME, KAS ON MANUS
		$bodycheck = urlencode($emailParser->getHTMLBody());


				//KUI ON, LÕIKAME VÄLJA
				if (strpos($bodycheck, 'Content-Disposition') !== false) {
					$arr = explode("Content-Disposition", $bodycheck, 2);
					$body = $arr[0];
					$subjecta = $emailParser->getSubject();
					$subject = '✉ ' . $subjecta;
				} else {
					$body = $bodycheck;
					$subject = $emailParser->getSubject();
				}

		//$body = imap_qprint(imap_fetchbody($inbox,$email_number,2));

				
		$header = imap_headerinfo ( $mbox, $i );
		$from = $header->from;
		
		foreach ( $from as $id => $object ) {
			$fromaddress = $object->mailbox . "@" . $object->host;
		}
				
		$aeg = strtotime($header->date);
		$date = strftime('%a %d. %b %Y %H %M', $aeg);
				
		$txt = "INSERT INTO emails (id, stamp, fromaddress, subject, kuup, body, assigned, state) VALUES ('$stamp',$aeg, '$fromaddress', '$subject', '$date', '$body', '0', '0')";

		$query = mysqli_query($con,$txt) or die(mysqli_error($con));
		imap_delete($mbox,$i);
		imap_expunge($mbox);
		$i++;
	}
}
imap_close($mbox);
echo "Meilid edukalt laetud \n";
?>