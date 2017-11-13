
<?php
include_once('html/page_header.php');
include_once('lib/activity.class.php');

$Activity = new Activity();
$Dates = $Activity->Count_Entries_Per_Date();

$list = array();

$month = date('m');
$year = date('y');

$today = date('d');
if($today <= 15) {

    for($d=1; $d<=15; $d++)
    {
    $time=mktime(12, 0, 0, $month, $d, $year);          
    if (date('m', $time)==$month)       
        $list[]=date('d', $time);
    }

} else {

    for($d=16; $d<=30; $d++)
    {
    $time=mktime(12, 0, 0, $month, $d, $year);          
    if (date('m', $time)==$month)       
        $list[]=date('d', $time);
    }
}

$arr = array();
$listlen = count($list);


for($i = 0; $i < $listlen; $i++ ){
    $arr[$i]['x'] = $list[$i];
    $arr[$i]['y'] = 0;
    foreach($Dates as $k => $v){
        if($arr[$i]['x'] == date('d',strtotime($v['date']))) {
            $arr[$i]['y'] = $v['count'];
        }
    }
}

$days = implode("','",$list);

print_r($arr);
?>

  <div class="chart-container">
        <canvas id="line-chartcanvas"></canvas>
    </div>
  

 <script src="../sengoku/style/js//Chart.min.js"></script>
 <script>
 <?php include_once('scripts/graphjs.js'); ?> 
 </script>


</body>
</html>