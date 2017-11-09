<?php
session_start();


echo $_POST['issue'];
die();

include_once('lib/activity.class.php');
include_once('lib/users.class.php');
include_once('lib/actydetails.class.php');

$Activity = new Activity();
$Users = new Users();
$ActyDetails = new ActyDetails();
$Validator = new Validator();



$Activity->LastID			= htmlspecialchars($_POST['pageid']);
$Activity->LogText 			= $_POST['textarea'];
$Activity->SeverityID 		= htmlspecialchars($_POST['severity']);
$Activity->ActyStartDate 	= htmlspecialchars($_POST['acty_date']);
$Activity->UserID			= htmlspecialchars($_SESSION['SESSID']);


$error = $Validator->isLog_Valid();
if(!empty($error))
{
	echo $error;
	die();
}

$LastID = $Activity->Insert_Log();
$log = $Activity->Last_Log_Insert($LastID);

// echo $_POST['pageid'];
// echo $_POST['severity'];
// echo $_POST['acty_date'];
// echo $_POST['textarea'];
?> 

<tr>
<!--/ LOG DATE /-->
<td width="130"><small> <?php echo date('M-d g:i a',strtotime($log['LogDate']));?> </small></td>

<!--/ USER /-->

<td width="50"><figure class="media-left"><p class="image"><img style="border-radius:5px;width:55px;height:25px" src="style/img/<?php echo $Users->GetUser($log['UserID']);?>.png"></p></figure></td>

<!--/ SEVERITY /-->
<td width="80"><span class="tag <?php echo $ActyDetails->Severity_Status($log['LogSeverityID']); ?>"><?php echo $ActyDetails->Get_Severity_Name($log['LogSeverityID']);?></span></td>

<!--/ LOG DETAIL /-->
<td> <?php echo $log['LogText'];?></td>


<td width="100"><a class="button is-small"><i class="fa fa-times" aria-hidden="true"></i></a></td>
</tr>


