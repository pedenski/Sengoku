<?php

include_once('../lib/tags.class.php');
include_once('../lib/users.class.php');

$Tags = new Tags();
$Users = new Users();

// $arr = array();
// $a = $Tags->Count_Top();
// print json_encode($a);

$tags  = $Tags->Count_Top($limit = 5);
$tagarr = array();
$ulist = $Users->Get_User_Listing();

foreach($tags as $tk => $tv) {
	$tagarr[$tk]['tag'] = $tv['TagName'];
	$tagarr[$tk]['val'] = $tv['total'];

	foreach($ulist as $uv) {
		if($tv['TagName'] == $uv['UserName']) {
		$usarr[] = $uv['UserName'];
		unset($tagarr[$tk]);
		} 

		
	}	

}

$json_out = json_encode(array_values($tagarr));

print($json_out);

?>