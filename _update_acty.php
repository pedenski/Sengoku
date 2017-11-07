<?php
session_start();
include_once('lib/actydetails.class.php');
include_once('lib/activity.class.php');
include_once('lib/tags.class.php');

date_default_timezone_set('Asia/Manila');

$Activity = new Activity();
$ActyDetails = new ActyDetails();
$severitylist = $ActyDetails->Get_Severity_List();

$Tags = new Tags();

$Activity->ActyID = htmlspecialchars($_POST['pageid']);

/*/ TITLE /*/
$Activity->ActyTitle = htmlspecialchars($_POST['title']);

/*/ SEVERITY /*/


foreach($severitylist as $sk => $sv)
{
/*	this could easily be done by using the var inside $_POST but its in text form not int
 *	problem with it, if I add new severity level, it will be sent in text form not int
 *	solution is to convert the name back to int so no need to add manually the text during loop.
 */
	if($_POST['range'] == $sv['SeverityName'])
	{
		$_POST['range'] = $sv['SeverityID'];
	}
	
 }


$Activity->SeverityID = htmlspecialchars($_POST['range']);

 /*/ CATEGORY /*/
$Activity->CategoryID = htmlspecialchars($_POST['category']);

 /*/ AREA /*/
$Activity->AreaID = htmlspecialchars($_POST['area']);

 /*/ ACTY DATE /*/
$Activity->ActyStartDate = htmlspecialchars($_POST['acty_date']);

 /*/ USER /*/
$Activity->UserID = htmlspecialchars($_SESSION['SESSID']);

/*/ TIMESTAMP /*/
$Activity->ModifiedDate = date('Y-m-d H:i:s');	

/*/ TAGS /*/
$t = $_POST['tags'][0];
$ptags = explode(",", $t);

$Tags->FormTags = $ptags;

$Tags->Get_Tags($_POST['pageid']);
$arrTags = $Tags->TagLists;//with tag ID

//delete existing
$Tags->Delete_Tags($arrTags); // once deleted/ get id from previous array and update
$Tags->Delete_TagMap($_POST['pageid']);




/*/ TEXTAREA /*/
$Activity->Textarea = $_POST['textarea'];
$Activity->Update_Activity();

$Tags->Acty_LastID = $_POST['pageid']; //insert last ActyID
$Tags->Insert_Tags(); // execute

header("location: page.php?id=".$_POST['pageid']);
//$a = $Activity->Update();
//echo $a;

/*echo "title- ".$_POST['title'];
echo "text-".$_POST['textarea'];
//echo "".$_POST['tags'];

echo "date- ".$_POST['acty_date'];*/
//echo "severity- ".$_POST['range'];
/*echo "category- ".$_POST['category'];
echo "area- ".$_POST['area'];*/


/*foreach($_POST as $Name => &$Value) {
	echo ":".$Name." , ".$Value."<br>";
}
*/

//print_r($_POST['tags']);

?>