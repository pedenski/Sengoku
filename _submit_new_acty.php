<?php 
//$_POST from <form> already global var no need to insert to function, just execute method

//include libraries
include('lib/database.class.php');
include('lib/activity.class.php');


//instantiates
$db = new database();
$Activity = new Activity($db);

$a = $Activity->New_Activity();

echo $a;








































































// echo "title: ".$_POST['title'];
// echo "---";

// echo "textarea: ".$_POST['textarea'];
// echo "---";


// echo "sev: ".$_POST['severity'];
// echo "---";

// echo "tags: ".print_r($_POST['tag']);
// echo "---";


// echo "date: ".$_POST['acty_date'];
// echo "----";




// echo "category: ".$_POST['category'];
// echo "----";





 ?>