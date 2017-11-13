<?php
include_once('../lib/activity.class.php');

$Activity = new Activity();

$logid = $_POST['logid'];
$row = $Activity->Query($logid);

?>
<div style="font-size:1.2rem;padding-left:3px; border-left:2px solid #FF3860;">
[ref#<?php echo $row['LogID']; ?>] <?php echo strip_tags($row['LogText']); ?>
</div>


