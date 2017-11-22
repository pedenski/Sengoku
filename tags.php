<?php 
session_start();
$page_title = "Tags";
if(isset($_GET['tagname'])) {
	$tagname = $_GET['tagname'];
	$page = isset($_GET['page']) ? $_GET['page'] : 1;
}




include_once('lib/tags.class.php');
include_once('lib/users.class.php');
include_once('lib/activity.class.php');
include_once('mods/pagination/pagination.php');
include_once('lib/actydetails.class.php');

$tags = new Tags();
$Users = new Users();
$Activity = new Activity();
$ActyDetails = new ActyDetails();

//pagination
$max = 15; //max items per page
$maxNum  = 5; //max number per page
$total = $Activity->CountRows_Titles(); //count all rows
$nav = new Pagination($max, $total, $page, $maxNum);

include_once('html/tags_header.php');
include_once('html/navbar.php');
?>

<!-- HERO -->
<section class="hero is-primary">
<div class="hero-body">
<div class="container">
  <h1 class="title">
  <?php echo ucfirst($tagname); ?>
  </h1>
  <h2 class="subtitle">
    Tag listing
  </h2>
</div>
</div>
</section>


<?php




$a = $tags->Count_Top($limit = 10);
//print_r($a);


$tags->UserLists = $Users->Get_User_Listing();
$tags->TagLists = $a;

// echo "<hr>";
$tags->Compare_Array();

// print_r($tags->TagLists);
// echo "<hr>";
// print_r($tags->UserLists);
//styles

?>

<div class="container">
<div style="margin-bottom:25px"></div>

   <div class="columns">
      <div class="column is-half">
       <!--    <div class="control has-icons-left has-icons-right"> -->
        <!--   <input class="input" type="text" name="search_text" id="search_text" placeholder="Search By Title"> -->
      <!--     <span class="icon is-small is-left">
          <i class="fa fa-search"></i>
          </span> -->
    <!--       </div> -->
        </td>
      </div>
		<div class="column is-half ">
		  <div class="pagi is-pulled-right">
		  <?php echo $nav->first(' <a href="tags.php?tagname='.$tagname.'">First</a>  ');
		        echo $nav->numbers(' <a href="tags.php?tagname='.$tagname.'&page={nr}">{nr}</a>  ', '  <b>{nr}</b>  ');
		        echo $nav->next(' <a href="tags.php?tagname='.$tagname.'&page={nr}">Next</a>  '); ?>
		  </div> 
		</div>
	</div>



<?php 

$tags = $tags->Get_Title_From_Tags($tagname, $nav, $max);
?>

<h2></h2>

<table class="table is-bordered is-fullwidth is-striped">
<thead>
  <tr>
    <th>ID</th>
    <th>User</th>
    <th>Title</th>
    <th>Date</th>
    <th><p class="has-text-centered">Div</p></th>
    <th><p class="has-text-centered">Sev</p></th>

  </tr>
</thead>






<?php
foreach($tags as $r) { 
$Activity->Get_Title_Data($r['ActyID']);
?>
<tr>
	<td width="25"><?php  echo $r['ActyID']; ?></td>
	<td width="25"><img style="border-radius:50%;width:30px;height:30px" src="style/img/<?php echo $Users->GetUser($Activity->UserID);?>.png"></td>
	<td><a href="page.php?id=<?php echo $r['ActyID']; ?>"><?php echo ucfirst($Activity->get_snippet($Activity->ActyTitle, 8)); ?></a><br>
		<?php $Activity->Get_Activity_Detail($r['ActyID']);?>
		<small> <?php $Activity->Get_Activity_Detail($r['ActyID']);
				echo strip_tags($Activity->get_snippet($Activity->textarea, 20)); ?>...  </small></span>



	</td>
	
	<td width="100"><span style="color:#363636;"><small><?php echo date('M-d',strtotime($Activity->ActyPostDate)); ?>
    <span class='hover' id='demo-tooltip-above' data-jbox-content="<?php echo date('H:i',strtotime($Activity->ActyPostDate)); ?>">  <i class="fa fa-clock-o" aria-hidden="true"></i></span></small></span>
    </td>

	<td width="25"><p class="has-text-centered">
	<?php switch($Activity->CategoryID) 
	{
        case 1:
          echo "<span class='hover' id='demo-tooltip-above' data-jbox-content=".$ActyDetails->Get_Category_Name($Activity->CategoryID)."><i style='color:#028090' class='fa fa-handshake-o fa-lg' aria-hidden='true'></i></span>";
        break; 
        case 2:
          echo "<span class='hover' id='demo-tooltip-above' data-jbox-content=".$ActyDetails->Get_Category_Name($Activity->CategoryID)."><i style='color:#028090' class='fa fa-eraser fa-lg' aria-hidden='true'></i></span>";
        break;
        case 3:
          echo "<span class='hover' id='demo-tooltip-above' data-jbox-content=".$ActyDetails->Get_Category_Name($Activity->CategoryID)."><i style='color:#028090' class='fa fa-sliders fa-lg' aria-hidden='true'></i></span>";
        break;
         case 4:
          echo "<span class='hover' id='demo-tooltip-above' data-jbox-content=".$ActyDetails->Get_Category_Name($Activity->CategoryID)."><i style='color:#028090' class='fa fa-rocket fa-lg' aria-hidden='true'></i></span>";
        break;
         case 5:
          echo "<span class='hover' id='demo-tooltip-above' data-jbox-content=".$ActyDetails->Get_Category_Name($Activity->CategoryID)."><i style='color:#028090' class='fa fa-shield fa-lg' aria-hidden='true'></i></span>";
        break;
    }  
    ?>

    </p>
	</td>
	<td width="25"><p class="has-text-centered">
	  <?php switch($Activity->SeverityID) 
	      {
	        case 0:
	          echo "<i style='color:#81D742' class='fa fa-thermometer-0 fa-lg' aria-hidden='true'></i>";
	        break; 
	        case 1:
	          echo "<i style='color:#FCC02B' class='fa fa-thermometer-2 fa-lg' aria-hidden='true'></i>";
	        break;
	        case 2:
	          echo "<i style='color:#EB1C23' class='fa fa-thermometer fa-lg' aria-hidden='true'></i>";
	        break;
	      }  

	      //$ActyDetails->Get_Severity_Name($row['SeverityID']); //severity name

	      ?>
	  </p>
</td>

</tr>


<?php } ?>

</table>



</div> <!-- /container -->
<?php include_once('html/tags_footer.php'); ?>

