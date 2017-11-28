<?php
session_start();


include_once('../lib/activity.class.php');
include_once('../lib/users.class.php');
include_once('../lib/actydetails.class.php');

$Activity = new Activity();
$Users = new Users();
$ActyDetails = new ActyDetails();
$Validator = new Validator();



$Activity->LastID			= htmlspecialchars($_POST['pageid']);
$Activity->LogText 			= $_POST['textarea'];
$Activity->SeverityID 		= htmlspecialchars($_POST['severity']);
$Activity->ActyStartDate 	= htmlspecialchars($_POST['acty_date']);
$Activity->UserID			= htmlspecialchars($_SESSION['SESSID']);
$Activity->IssueID			= htmlspecialchars($_POST['issue']);
$Activity->ReferTo			= htmlspecialchars($_POST['issuenum']); //answer
$Activity->is_Resolved		= htmlspecialchars($_POST['resolve']);	


$Activity->Update_Issue_As_Answered();


/*
Note to self:

Below so complex, took a while to fix the error.
whole point below is to trigger JBOX depending on the condition if(error == true) { show jbox } else { display HTML table}

if you use AJAX with dataType: JSON, 
subsequent returns (html or raw text) must also be in JSON format
use JSON_ENCODE() function in PHP

I had to assign variable for each of the data, so the array will accept the variable instead of the actualy PHP echo format.

*/

$error = $Validator->isLog_Valid();
if(!empty($error)) {
  $true = true;
	$a = array('error' => $error, 'hasError' => $true);
  echo json_encode($a);
	die();
} else {


$LastID = $Activity->Insert_Log();
$log = $Activity->Last_Log_Insert($LastID);

$logID       = $log['LogID']; // LOG ID
$sprintLogID = sprintf("%02d",$log['LogID']); // LogID with 0 if digit is singular e.g 1 => 01
$logDate     = date('M-d g:i a',strtotime($log['LogDate'])); //convert date
$avatar      = $Users->GetUser($log['UserID']); // get user for AVATAR img
$logTextarea = strip_tags($log['LogText'],'<strong><em>'); // strip HTML for textarea logs


/*
 * $tr = <tr> tag
 */
if($log['LogIssue'] != 1) {
    $tr = "<tr>"; //if normal update logs

    if($log['ReferTo'] != 0 ) {
      $tr = "<tr class='is-answered'>"; // if log is answered
    }
 
} else {
  $tr = "<tr class='is-selected'>"; //if log is issue
}


/*
 * $span = <span> tag
 */
if($log['ReferTo'] == 0) {
  $span = "<span class='tag ".$ActyDetails->Severity_Status($log['LogSeverityID'])."'>".$ActyDetails->Get_Severity_Name($log['LogSeverityID'])."</span>";
} else {
  $span = "<span class='tag is-dark'>Ref # ".sprintf('%02d',$log['ReferTo'])."</span>";
}





$str = "
  $tr 

    <td width='20'>
          <span id='datalog' class='button is-small log' data-logid='$logID'>
          <small> $sprintLogID </small></span>
    </td>


    <td width='130'><small> $logDate </small></td>
   
    <td width='50'><figure class='media-left'><p class='image'><img style='border-radius:5px;width:55px;height:25px' src='style/img/$avatar.png'></p></figure>
    </td>  

    <td width='80'>
      <p class='has-text-centered'>
      $span
      </p>
    </td>

    <td> 
      $logTextarea
    </td>

  </tr>
    
    ";


echo json_encode($str);

} ?>