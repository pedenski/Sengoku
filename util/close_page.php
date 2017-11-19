<?php
include_once('../lib/activity.class.php');

$Activity = new Activity();



if(isset($_POST['close'])) {

$ActyID = $_POST['pageid'];
$Activity->setClose($ActyID);
header('location: ../page.php?id='.$ActyID);

} elseif(isset($_POST['open'])) {

$ActyID = $_POST['pageid'];
$Activity->setOpen($ActyID);
header('location: ../page.php?id='.$ActyID);


}



?>

