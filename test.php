<?php
$page = isset($_GET['page']) ? $_GET['page'] : 1;

$page_title = "Sengoku";

include_once('lib/database.class.php');
include_once('lib/activity.class.php');
include_once('lib/tags.class.php');
include_once('lib/users.class.php');
include_once('mods/pagination/pagination.php');
include_once('lib/actydetails.class.php');

$db = new Database();
$Activity = new Activity($db);
$Tags = new Tags($db);
$Users = new Users($db);
$ActyDetails = new ActyDetails();


//styles
include_once('html/index_header.php');
include_once('html/navbar.php'); 

?>
<?php 

$tagarr = array();
$usarr = array();
$taga = array();

$tags  = $Tags->Count_Top();
$ulist = $Users->Get_User_Listing();
//print_r($tags);

// foreach($tags as $tv) {
// 	array_push($tagarr, $tv['TagName']);
// 	array_push($tagarr, $tv['total']);

// 	foreach($ulist as $uv){
// 		if($tv['TagName'] == $uv['UserName']) {
			
// 		}


// 	}
	

// }



foreach($tags as $tk => $tv) {
	$tagarr[$tk]['tag'] = $tv['TagName'];
	$tagarr[$tk]['val'] = $tv['total'];

	foreach($ulist as $uv) {
		if($tv['TagName'] == $uv['UserName']) {
		$usarr[] = $uv['UserName'];
		unset($tagarr[$tk]);
		unset($tagarr[$tk]['tag']);
		unset($tagarr[$tk]['val']);
		} 

		
	}	
}

$json_out = json_encode(array_values($tagarr));

print($json_out);


?>

<div class="chart-container">
		<canvas id="bar-chartcanvas"></canvas>
	</div>

	<!-- javascript -->

    <script src="mods/ChartJS/Chart.min.js"></script>

<?php include_once('html/index_footer.php'); ?>


 

<script>
$(document).ready(function () {


	$.ajax({
		url: "html/index_tagbar.php",
		method: "GET",
		success: function(data) 
		{
			console.log(data);
			var parsed = $.parseJSON(data);
			var  tag = [];
			var total = [];

			for(i = 0; i < parsed.length; ++i) {
				tag.push(parsed[i].tag);
				total.push(parsed[i].val);
			}
		
			console.log(total);

			var data = {
				labels : tag,
				datasets : [
					{
						label : "TeamA score",
						data : total,
						backgroundColor : ["rgba(10, 20, 30, 0.3)"],
						borderWidth : 1
					}
					
				]
			};

			var ctx = $("#bar-chartcanvas");

			var options = {
				title : {
					display : true,
					position : "top",
					text : "Bar Graph",
					fontSize : 18,
					fontColor : "#111"
				},
				legend : {
					display : true,
					position : "bottom"
				},
				scales : {
					yAxes : [{
						ticks : {
							min : 0
						}
					}]
				}
			};

			var chart = new Chart( ctx, {
				type : "bar",
				data : data,
				options : options
			});
		}
	});
});
</script>