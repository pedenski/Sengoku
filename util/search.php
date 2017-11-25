<?php
$page = isset($_GET['page']) ? $_GET['page'] : 1;

include_once('../lib/utility.class.php');
include_once('../lib/activity.class.php');
include_once('../lib/tags.class.php');
include_once('../lib/users.class.php');
include_once('../mods/pagination/pagination.php');
include_once('../lib/actydetails.class.php');

$Users = new Users();
$search = new Search();
$ActyDetails = new ActyDetails();
$Activity = new Activity();
$Tags = new Tags();
$Date = new Dates();

//pagination
$max = 12; //max items per page
$maxNum  = 15; //max number per page
$total = $Activity->CountRows_Titles(); //count all rows
$nav = new Pagination($max, $total, $page, $maxNum);

//styles



if(isset($_POST['query'])) {
	$query = htmlspecialchars($_POST['query']);
	$searchlist = $search->Search($query);
	if(empty($searchlist)) {
?>
		<div class="column">
		<article class="message is-danger">
		  <div class="message-body">
		   No Results Found
		  </div>
		</article>
		</div>


<?php	} else { ?>


<table style="background:#f4f4f4" id="topics" class="table is-fullwidth">

<thead>
  <tr>
    <th>ID</th>
    <th><p class="has-text-centered">User</p></th>

    <th>Title</th>
   
  
    <th>Date</th>

    <!-- <th><p class="has-text-centered">Area</p></th> -->
    <th><p class="has-text-centered">Div</p></th>
    <th><p class="has-text-centered">Sev</p></th>
    <th>Elapsed</th>
    <th>Tags</th>

  </tr>
</thead>


<tbody>


<?php foreach($searchlist as $row) { ?>
 


<tr>

<td width="30">#<?php echo $row['ActyID'];?>
  
<?php if($row['is_Open'] != 1) { ?>
 <i style="color:#363636;font-size:.8rem;" class="fa fa-lock fa-lg" aria-hidden="true"></i>
  <?php } else { ?>
 <!--  <p class="has-text-centered"> <i style="color:#028090;" class="fa fa-unlock-alt fa-lg" aria-hidden="true"></i> </p> -->
  <?php } ?>

</td>


<td width="35"><p class="has-text-centered"><img style="border-radius:50%;width:30px;height:30px" src="style/img/<?php echo $Users->GetUser($row['UserID']);?>.png"></p></td>



<td width="400"><a href="page.php?id=<?php echo $row['ActyID'];?>"><span style="color:#363636; font-size:1.1rem;" class="_actyTitle"> <?php echo ucfirst($Activity->get_snippet($row['ActyTitle'], 5)); ?></a></span></a> <br>
    <!-- <span style="color:#363636;"><small> <?php $Activity->Get_Activity_Detail($row['ActyID']);
echo strip_tags($Activity->get_snippet($Activity->textarea, 15)); ?>  </small></span> -->

</td>






<td width="100"><span style="color:#363636;"><small><?php echo date('M-d',strtotime($row['ActyPostDate'])); ?>
    <span class='hover' id='demo-tooltip-above' data-jbox-content="<?php echo date('H:i',strtotime($row['ActyPostDate'])); ?>">  <i class="fa fa-clock-o" aria-hidden="true"></i></span></small></span>
    </td>

<!-- <td>
    <p class="has-text-centered">
    <?php switch($row['AreaID']) 
      {
        case 1:
          echo "<span class='hover' id='demo-tooltip-above' data-jbox-content='".$ActyDetails->Get_Area_Name($row['AreaID'])."'><img style='border-radius:50%;width:30px;height:30px' src='style/icons/".$ActyDetails->Get_Area_Name($row['AreaID']).".png'></span>";
        break; 
        case 2:
          echo "<span class='hover' id='demo-tooltip-above' data-jbox-content='".$ActyDetails->Get_Area_Name($row['AreaID'])."'><img style='border-radius:50%;width:30px;height:30px' src='style/icons/".$ActyDetails->Get_Area_Name($row['AreaID']).".png'></span>";
        break;
        case 3:
          echo "<span class='hover' id='demo-tooltip-above' data-jbox-content='".$ActyDetails->Get_Area_Name($row['AreaID'])."'><img style='border-radius:50%;width:30px;height:30px' src='style/icons/".$ActyDetails->Get_Area_Name($row['AreaID']).".png'></span>";
        break;
         case 4:
          echo "<span class='hover' id='demo-tooltip-above' data-jbox-content='".$ActyDetails->Get_Area_Name($row['AreaID'])."'><img style='border-radius:50%;width:30px;height:30px' src='style/icons/".$ActyDetails->Get_Area_Name($row['AreaID']).".png'></span>";
        break;
         case 5:
          echo "<span class='hover' id='demo-tooltip-above' data-jbox-content='".$ActyDetails->Get_Area_Name($row['AreaID'])."'><img style='border-radius:50%;width:30px;height:30px' src='style/icons/".$ActyDetails->Get_Area_Name($row['AreaID']).".png'></span>";
        break;
      }  

      //$ActyDetails->Get_Area_Name($row['AreaID']) //area name

      ?>

</p>
</td> -->


<td width="25">
<p class="has-text-centered">
    <?php switch($row['CategoryID']) 
      {
        case 1:
          echo "<span class='hover' id='demo-tooltip-above' data-jbox-content=".$ActyDetails->Get_Category_Name($row['CategoryID'])."><i style='color:#028090' class='fa fa-handshake-o fa-lg' aria-hidden='true'></i></span>";
        break; 
        case 2:
          echo "<span class='hover' id='demo-tooltip-above' data-jbox-content=".$ActyDetails->Get_Category_Name($row['CategoryID'])."><i style='color:#028090' class='fa fa-eraser fa-lg' aria-hidden='true'></i></span>";
        break;
        case 3:
          echo "<span class='hover' id='demo-tooltip-above' data-jbox-content=".$ActyDetails->Get_Category_Name($row['CategoryID'])."><i style='color:#028090' class='fa fa-sliders fa-lg' aria-hidden='true'></i></span>";
        break;
         case 4:
          echo "<span class='hover' id='demo-tooltip-above' data-jbox-content=".$ActyDetails->Get_Category_Name($row['CategoryID'])."><i style='color:#028090' class='fa fa-rocket fa-lg' aria-hidden='true'></i></span>";
        break;
         case 5:
          echo "<span class='hover' id='demo-tooltip-above' data-jbox-content=".$ActyDetails->Get_Category_Name($row['CategoryID'])."><i style='color:#028090' class='fa fa-shield fa-lg' aria-hidden='true'></i></span>";
        break;
      }  

      // //severity name

      ?>

</p>
</td>
<td width="25"><p class="has-text-centered">
  <?php switch($row['SeverityID']) 
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


<td width="200">
<?php 
if(!empty($row['ActyEndDate'])) 
{
    $interval = $Date->dateInterval($row['ActyPostDate'], $row['ActyEndDate']);
    
    if($interval->format("%a") != 0) {
      echo $interval->format("%a days, "); 
    }

    echo $interval->format("%h hours ");
    echo $interval->format("%i min");
} 

else {

    echo "Ongoing";
} ?>
</td>


<td width="200">
<?php $Tags->UserLists = $Users->Get_User_Listing(); //get Names and insert to Tags class var
$Tags->Get_Tags($row['ActyID']);   //Execute Tags based on ActyID
$Tags->Compare_Array(); // execute tag comparison  ?>
<?php foreach($Tags->TagLists as $TagName) { ?>
<a href="tags.php?tagname=<?php echo $TagName; ?>"><span class="tag is-danger mar-r-5">  <?php echo $TagName; ?> </span> </a>
<!-- <span class="tag is-info"> </span> -->
<?php } ?>
</td>













</td>

</tr>

<?php } //foreach ?>
</tbody>
<table>

<?php } //if empty  ?>








<?php } //if isset post?> 
