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
include_once('lib/utility.class.php');
//instantiate
$db = new Database();
$Activity = new Activity($db);
$Tags = new Tags($db);
$Users = new Users($db);
$ActyDetails = new ActyDetails();
$Date = new Dates();
//pagination
$max = 20; //max items per page
$maxNum  = 5; //max number per page
$total = $Activity->CountRows_Titles(); //count all rows
$nav = new Pagination($max, $total, $page, $maxNum);

//styles
include_once('html/index_header.php');
include_once('html/navbar.php'); ?>


 <style>

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
          <input class="input" type="text" name="search_text" id="search_text" placeholder="Search by Activity or Month (numeric)">
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

<div id="demo-container">
<!--   <span class="hover" id="demo-tooltip-above" title="I'm above the element">Above centered</span> -->
</div>  
<div style="border-radius:4px; padding:15px;background: #f4f4f4; margin-bottom: 8px; "> 
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
    <th>Tags</th>
  </tr>
</thead>


<tbody>

<div id="result"></div>
<?php $ActyList = $Activity->Get_TItle_Listing($nav, $max);
foreach($ActyList as $row) { ?>



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
<?php $Tags->UserLists = $Users->Get_User_Listing(); //get Names and insert to Tags class var
$Tags->Get_Tags($row['ActyID']);   //Execute Tags based on ActyID
$Tags->Compare_Array(); // execute tag comparison  ?>
<?php foreach($Tags->TagLists as $TagName) { ?>
<a href="tags.php?tagname=<?php echo $TagName; ?>"><span class="tag is-danger mar-r-5">  <?php echo $TagName; ?> </span> </a>
<!-- <span class="tag is-info"> </span> -->
<?php } ?>
</td>







</tr>
<?php }  ?> <!--END FOR-->
</tbody>
</table>
</div>
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
         
      </div><!-- USE PROFILE -->


    <!-- AREAS -->
    <div style="border-radius:5px; margin-bottom:15px; padding:5px; background: #fff;"> 
    <?php 
    foreach($ActyDetails->Get_Area_List() as $area) { ?>
      <div class="areadiv" style="display:inline-block;position:relative;">
       <a href="tags.php?tagname=<?php echo $area['AreaName'];?>"> <img data-jbox-content=" <?php echo $area['AreaName'];?>" id="demo-tooltip-above" class="hover imgsize-50" src="style/icons/<?php echo strtolower($area['AreaName']);?>.png"></a>
        <?php $areacount = $ActyDetails->count_AreaEntries($area['AreaID']);?> 
        <span class="iconbadge"><?php echo $areacount[0]['areacount']; ?></span>
      </div>
    <?php } ?>
    </div><!--INFO -->
     

    <!-- TAG GRAPH BAR -->
      <div style="border-radius:5px; margin-bottom:15px; padding-top:25px; background: #FCE5B0"> 
        <div class="chart-container">
          <canvas id="bar-chartcanvas"></canvas>
        </div>

      </div><!-- END TAG GRAPH BAR -->





        <!-- RECENT LOGS -->
      <div style="border-radius:5px; padding:5px;background: #f4f4f4"> 

       <table style="background:#f4f4f4;" class="table is-fullwidth is-striped"> 
          <thead>
    
            <th><span style="color:#028090"><i class="fa fa-file-text-o" aria-hidden="true"></i> Recent Logs</span></th>
          
          </thead>
          <tbody>
          <?php 
          $recentlogs = $Activity->LogPreview($num = 5); 
          foreach($recentlogs as $recent) { ?>

          <tr>
          
            <td><a style="color:#028090;" href="page.php?id=<?php echo $recent['ActyID']; ?>"><?php echo strip_tags($Activity->get_snippet($recent['LogText'], 25)); ?> - <small> #<?php echo $recent['ActyID']; ?> </small></td>



          </tr>
          <?php } ?>
        </tbody>
       </table>   
      </div><!-- /RECENT LOGS -->


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
