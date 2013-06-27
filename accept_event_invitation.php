<?php 
//Include classes
include('./includes/header_classes.php');
//====

$event_id = '';
$member_id = '';
$action = '';

if(isset($_GET['event']) && $_GET['event'] != ''){
	$event_id = $_GET['event'];
}

if(isset($_GET['member']) && $_GET['member'] != ''){
	$member_id = $_GET['member'];
}


?>
