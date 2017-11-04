<?php
include_once('lib/activity.class.php');

$Activity = new Activity();

$Activity->LastID			= htmlspecialchars($_POST['pageid']);
$Activity->LogText 			= $_POST['textarea'];
$Activity->SeverityID 		= htmlspecialchars($_POST['severity']);
$Activity->ActyStartDate 	= htmlspecialchars($_POST['acty_date']);

$a = $Activity->Insert_Log();

// echo $_POST['pageid'];
// echo $_POST['severity'];

// echo $_POST['acty_date'];

// echo $_POST['textarea'];
echo $a;


?>