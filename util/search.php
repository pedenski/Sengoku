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
    <th>Category</th>
    <th>Severity</th>
    <th>Tags</th>
  </tr>

</thead>

<?php foreach($searchlist as $row) { ?>
          
<tr>

<td>#<?php echo $row['ActyID'];?></td>
<td><a href="page.php?id=<?php echo $row['ActyID'];?>"><span style="color:#00D1B2; font-size:1rem;" class="_actyTitle"> <?php echo ucfirst($Activity->get_snippet($row['ActyTitle'], 5)); ?></a>
<td><small> <?php $Activity->Get_Activity_Detail($row['ActyID']);
echo strip_tags($Activity->get_snippet($Activity->textarea, 5)); ?> ... </small></td>




<td><img style="border-radius:10px;width:38px;height:38px" src="style/img/<?php echo $Users->GetUser($row['UserID']);?>.png"></td>
<td><?php echo date('m-y',strtotime($row['ActyStartDate'])); ?></td>
<td><?php echo date('H:i',strtotime($row['ActyStartDate'])); ?></td>
<td><?php echo $ActyDetails->Get_Area_Name($row['AreaID']); ?></td>
<td><?php echo $ActyDetails->Get_Category_Name($row['CategoryID']); ?></td>
<td><?php echo $ActyDetails->Get_Severity_Name($row['SeverityID']);?></td>

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
