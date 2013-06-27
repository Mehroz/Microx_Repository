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

if(isset($_GET['act']) && $_GET['act'] != ''){
	$action = $_GET['act'];
}

if($event_id == '' || $member_id == '' || $action == ''){
	$redirectURL = BASE_PATH;
	echo '<meta http-equiv="refresh" content="0;url='.$redirectURL.'">';
	exit;
}

if($lgn->IsLoggedIn() && $lgn->getLoginType() == 'member'){
}else{	
	$requested_url = $_SERVER['REQUEST_URI'];
	$requested_url = str_replace('/icdubai/', '', $requested_url);
	$_SESSION['requested_url'] = BASE_PATH.$requested_url;
	
	$redirectURL = BASE_PATH.'login.php';
	echo '<meta http-equiv="refresh" content="0;url='.$redirectURL.'">';
	exit;
}


if($action == 'accept'){
	$submit =$mem->AcceptJoinEvent($member_id, $event_id);
}else if($action == 'reject'){
	$submit =$mem->deleteEventJoinAlert($member_id, $event_id);
}

$redirectURL = BASE_PATH.'club-event-details.php?id='.$event_id;
echo '<meta http-equiv="refresh" content="0;url='.$redirectURL.'">';
exit;

?>