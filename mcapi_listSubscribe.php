<?php

require_once 'MCAPI.class.php';
require_once 'config.inc.php'; //contains apikey

$api = new MCAPI($apikey);

$merge_vars = array('FNAME'=>$FNAME);

// By default this sends a confirmation email - you will not see new members
// until the link contained in it is clicked!

$subscriberemailID = $_POST["EMAIL"];
$subscriberschoolID = $_POST['SCHOOL'];


$retval = $api->listSubscribe( $listId, $subscriberemailID, $subscriberschoolID);

if ($api->errorCode){
	echo "Unable to load listSubscribe()!\n";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
    header('Location: index.php');
    echo "Subscribed!\n";
}

?>
