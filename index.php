<?php 
session_start();

$page = isset($_GET['page']) ? $_GET['page'] : 1;

$page_title = "Sengoku";

include_once('lib/database.class.php');
include_once('lib/activity.class.php');
include_once('lib/tags.class.php');
include_once('lib/users.class.php');
include_once('mods/pagination/pagination.php');
include_once('lib/actydetails.class.php');

//instantiate
$db = new Database();
$Activity = new Activity($db);
$Tags = new Tags($db);
$Users = new Users($db);
$ActyDetails = new ActyDetails();

//pagination
$max = 15; //max items per page
$maxNum  = 5; //max number per page
$total = $Activity->CountRows_Titles(); //count all rows
$nav = new Pagination($max, $total, $page, $maxNum);

//styles
include_once('html/index_header.php');
include_once('html/navbar.php'); ?>


 <style>
 .pagi {
  margin-top:5px;

 }
  .pagi a, b {
   background:#f4f4f4;
   padding: 10px;
   border-radius: 3px;



  }
  </style>

<!-- HERO -->
<section class="hero is-primary">
<div class="hero-body">
<div class="container is-fluid">
  <h1 class="title">
  <?php echo $page_title;?>
  </h1>
  <h2 class="subtitle">
    Activity Tracker Dashboard
  </h2>
</div>
</div>
</section>

<!-- CONTENT -->
<section class="section">
<div class="container is-fluid">


<div class="columns is-2 is-desktop">

<div  class="column is-four-fifths">  <!-- LEFT COLUMN -->
   


    <div class="columns">
      <div class="column is-half">
          <div class="control has-icons-left has-icons-right">
          <input class="input" type="text" name="search_text" id="search_text" placeholder="Search By Title">
          <span class="icon is-small is-left">
          <i class="fa fa-search"></i>
          </span>
          </div>
        </td>
      </div>
      <div class="column is-half ">
          <div class="pagi is-pulled-right">
          <?php echo $nav->first(' <a href="index.php">First</a>  ');
                echo $nav->numbers(' <a href="index.php?page={nr}">{nr}</a>  ', '  <b>{nr}</b>  ');
                echo $nav->next(' <a href="index.php?page={nr}">Next</a>  '); ?>
          </div> 
      </div>
     </div>



  

<table id="topics" class="table is-fullwidth is-striped is-responsive">

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


<tbody>

<div id="result"></div>
<?php $ActyList = $Activity->Get_TItle_Listing($nav, $max);
foreach($ActyList as $row) { ?>



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
<?php }  ?> <!--END FOR-->
</body>
</table>
  </div>  <!-- END LEFT COLUMN -->


  <div style="background:#fff;" class="column is-one-quarter">   <!-- RIGHT COLUMN -->
        

        <?php if(!isset($_SESSION['SESSID'])){ ?>
        <div style="margin-bottom:5px; padding:5px;border-radius:5px;background: #f4f4f4"> 
        <form id='login' action='util/submit_login.php' method='post' accept-charset='UTF-8'>
              <p class="control has-icons-left has-icons-right">
                <input class="input" type="text" name="username" placeholder="Username">
                <span class="icon is-small is-left">
                  <i class="fa fa-envelope"></i>
                </span>
              </p>
              <div class="field">
              <p class="control has-icons-left">
                <input class="input" type="password" name="password" placeholder="Password">
                <span class="icon is-small is-left">
                  <i class="fa fa-lock"></i>
                </span>
              </p>
            </div>
            <div class="field">
              <p class="control">
                <button type='submit' name="submit" class="button is-info is-fullwidth">
                  Login
                </button>
              </p>
            </div>
          </form>
       </div>
      <?php } ?>

     <div style="margin-bottom:5px;padding:5px;border-radius:5px;background: #f4f4f4"> 
     <?php if(!isset($_SESSION['SESSID'])){ ?>
       <a class="button is-primary is-fullwidth" href="new_activity.php" disabled>
        <span class="icon is-small">
          <i class="fa fa-plus"></i>
        </span>
        <span>New Activity</span>
      </a>
    <?php } else { ?>
        <a class="button is-primary is-fullwidth" href="new_activity.php" >
        <span class="icon is-small">
          <i class="fa fa-plus"></i>
        </span>
        <span>New Activity</span>
      </a>
    <?php } ?>
    </div>

      <!-- USER PROFILE -->
      <div style="margin-bottom:15px; padding-right:15px; border-radius:5px;background: #f4f4f4"> 
          test
      </div><!-- USE PROFILE -->



    <!-- TAG GRAPH BAR -->
      <div style="margin-bottom:15px; padding-right:15px; border-radius:5px;background: #f4f4f4"> 
        <div class="chart-container">
          <canvas id="bar-chartcanvas"></canvas>
        </div>
      </div><!-- END TAG GRAPH BAR -->



    <!-- USER LOGGED IN TODAY -->
      <div style="margin-bottom:5px;padding:8px;"> 
        <h2>Online Today</h2>
        <div style="padding:5px;">
       <?php $userlogged = $Users->LastLogged(); 
            foreach($userlogged as $online) { ?>
            <img style="border-radius:10px;width:38px;height:38px" src="style/img/<?php echo $online['UserName']; ?>.png">
         <?php } ?>
       </div>

       </div><!-- //USER LOGGED IN TODAY -->


  </div>   <!-- END RIGHT COLUMN -->


</div>



</div> <!--/container-->
</section>




<?php include_once('html/index_footer.php'); ?>
