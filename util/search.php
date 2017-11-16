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

<table class="table is-fullwidth is-striped">
<thead>
  <tr>
    <th>ID</th>
    <th>Title</th>
    <th>Description</th>
    <th>User</th>
    <th>Date</th>
    <th>Time</th>
    <th>Area</th>
    <th><p class="has-text-centered">Div</p></th>
    <th><p class="has-text-centered">Sev</p></th>
    <th>Tags</th>
  </tr>
</thead>

<?php foreach($searchlist as $row) { ?>
 

<tr>

<td>#<?php echo $row['ActyID'];?></td>
<td><a href="page.php?id=<?php echo $row['ActyID'];?>"><span style="color:#00D1B2; font-size:1rem;" class="_actyTitle"> <?php echo ucfirst($Activity->get_snippet($row['ActyTitle'], 5)); ?></a>
<td><small> <?php $Activity->Get_Activity_Detail($row['ActyID']);
echo strip_tags($Activity->get_snippet($Activity->textarea, 5)); ?>  </small></td>



<td><img style="border-radius:50%;width:30px;height:30px" src="style/img/<?php echo $Users->GetUser($row['UserID']);?>.png"></td>
<td><?php echo date('m-y',strtotime($row['ActyStartDate'])); ?></td>
<td><?php echo date('H:i',strtotime($row['ActyStartDate'])); ?></td>
<td><?php echo $ActyDetails->Get_Area_Name($row['AreaID']); ?></td>
<td>
<p class="has-text-centered">
    <?php switch($row['CategoryID']) 
      {
        case 1:
          echo "<i style='color:#536878' class='fa fa-handshake-o fa-lg' aria-hidden='true'></i>";
        break; 
        case 2:
          echo "<i style='color:#536878' class='fa fa-eraser fa-lg' aria-hidden='true'></i>";
        break;
        case 3:
          echo "<i style='color:#536878' class='fa fa-sliders fa-lg' aria-hidden='true'></i>";
        break;
         case 4:
          echo "<i style='color:#536878' class='fa fa-rocket fa-lg' aria-hidden='true'></i>";
        break;
         case 5:
          echo "<i style='color:#536878' class='fa fa-shield fa-lg' aria-hidden='true'></i>";
        break;
      }  

      //$ActyDetails->Get_Category_Name($row['CategoryID']); //severity name

      ?>

</p>
</td>
<td><p class="has-text-centered">
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
</td>

<td>
<?php $Tags->UserLists = $Users->Get_User_Listing(); //get Names and insert to Tags class var
$Tags->Get_Tags($row['ActyID']);   //Execute Tags based on ActyID
$Tags->Compare_Array(); // execute tag comparison  ?>
<?php foreach($Tags->TagLists as $TagName) { ?>
<span class="tag is-dark mar-r-5">  <?php echo $TagName; ?> </span> 
<!-- <span class="tag is-info"> </span> -->
<?php } ?>
</td>


</tr>



<?php } //foreach ?>
<table>

<?php } //if empty  ?>








<?php } //if isset post?> 
