<?php 

/* if started from commandline, wrap parameters to $_POST and $_GET */
// if (!isset($_SERVER["HTTP_HOST"])) {
  
//   parse_str($argv[1], $_POST);
//   parse_str($argv[2], $_POST);
//   parse_str($argv[3], $_POST);
//  /* @CLIPARAM  php _submit_new_acty.php 'title=title'*/
// }

//$_POST from <form> already global var no need to insert to function, just execute method

//include libraries
include_once('lib/database.class.php');
include_once('lib/activity.class.php');
include_once('lib/tags.class.php');
include_once('lib/users.class.php');
include_once('lib/actydetails.class.php');


//instantiates
$db = new database();
$Activity = new Activity($db);
$Tags = new Tags($db);
$Users = new Users($db);
$Validator = new Validator();



$error = $Validator->isPOST_Valid();
if(!empty($error))
{
	echo $error;
	die();
}


//check users if existing in array tags
//if not, proceed,
//if yes, extract users from array, and insert to new array

//activity_title


$Activity->ActyTitle 		= htmlspecialchars($_POST['title']);
$Activity->SeverityID 		= htmlspecialchars($_POST['severity']);
$Activity->CategoryID 		= htmlspecialchars($_POST['category']);
$Activity->AreaID 			= htmlspecialchars($_POST['area']);
$Activity->ActyStartDate 	= htmlspecialchars($_POST['acty_date']);
$Activity->LogText		 	= "Start of Activity";


$Activity->Textarea 		= $_POST['textarea'];
$Acty_LastID = $Activity->Execute_Insert();
$Tags->Acty_LastID = $Acty_LastID; //insert last ActyID

$Tags->Acty_LastID = $Acty_LastID; //insert last ActyID
$Tags->Insert_Tags(); // execute

$a = $Activity->Insert_Log();
// echo $a;
// echo "$Acty_LastID";

















































// echo "date: ".$_POST['acty_date'];
// echo "----"; 

// echo "title: ".$_POST['title'];
// echo "---";

// echo "textarea: ".$_POST['textarea'];
// echo "---";


// echo "sev: ".$_POST['severity'];
//  echo "---";

// echo "tags: ".print_r($_POST['tags']);
// echo "---";



// echo "area: ".$_POST['area'];
// echo "----";


// echo "category: ".$_POST['category'];
// echo "----";





 ?>