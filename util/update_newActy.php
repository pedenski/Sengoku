<?php
session_start();
include_once('../lib/actydetails.class.php');
include_once('../lib/activity.class.php');
include_once('../lib/tags.class.php');

date_default_timezone_set('Asia/Manila');

$Activity = new Activity();
$ActyDetails = new ActyDetails();
$severitylist = $ActyDetails->Get_Severity_List();

$Tags = new Tags();

$Activity->ActyID = htmlspecialchars($_POST['pageid']);
$Activity->ActyTitle = htmlspecialchars($_POST['title']);

foreach($severitylist as $sk => $sv) {
/*	this could easily be done by using the var inside $_POST but its in text form not int
 *	problem with it, if I add new severity level, it will be sent in text form not int
 *	solution is to convert the name back to int so no need to add manually the text during loop.
 */
	if($_POST['range'] == $sv['SeverityName']) {
		$_POST['range'] = $sv['SeverityID'];
	}
	
 }

$Activity->SeverityID = htmlspecialchars($_POST['range']);
$Activity->CategoryID = htmlspecialchars($_POST['category']);
$Activity->AreaID = htmlspecialchars($_POST['area']);
$Activity->ActyStartDate = htmlspecialchars($_POST['acty_date']);
$Activity->UserID = htmlspecialchars($_SESSION['SESSID']);
$Activity->ModifiedDate = date('Y-m-d H:i:s');	

$t = $_POST['tags'][0]; // get tags
$ptags = explode(",", $t); //include (,)

$Tags->FormTags = $ptags;
$Tags->Get_Tags($_POST['pageid']);

$arrTags = $Tags->TagLists;//with tag ID

//Delete Existing
$Tags->Delete_Tags($arrTags); // once deleted/ get id from previous array and update
$Tags->Delete_TagMap($_POST['pageid']);


// TEXTAREA 
$Activity->Textarea = $_POST['textarea'];
$Activity->Update_Activity();

$Tags->Acty_LastID = $_POST['pageid']; //insert last ActyID
$Tags->Insert_Tags(); // execute

header("location: ../page.php?id=".$_POST['pageid']);
?>