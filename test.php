<?php

date_default_timezone_set ("Europe/Tallinn");
setlocale(LC_ALL, 'et_EE');

$timestamp = 1481628609;

$today = new DateTime(); // This object represents current date/time
$today->setTime( 0, 0, 0 ); // reset time part, to prevent partial comparison

$match_date = DateTime::createFromFormat( "U", $timestamp );
$match_date->setTime( 0, 0, 0 ); // reset time part, to prevent partial comparison

$diff = $today->diff( $match_date );
$diffDays = (integer)$diff->format( "%R%a" ); // Extract days count in interval

switch( $diffDays ) {
    case 0:
        echo "//Today";
        break;
    case -1:
        echo "//Yesterday";
        break;
    case +1:
        echo "//Tomorrow";
        break;
    default:
        echo "//Sometime";
}
?>