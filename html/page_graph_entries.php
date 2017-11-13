<?php
$Dates = $Activity->Count_Entries_Per_Date($ActyID);
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

?>

