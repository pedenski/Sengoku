<?php
include_once('../lib/activity.class.php');

$Activity = new Activity();


$logid = $_POST['logid'];
$logtable = "activity_log";
$row = $Activity->Query($logid, $logtable);

?>

[ref#<?php echo $row['LogID']; ?>] <?php echo strip_tags($row['LogText']); ?>


