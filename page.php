<?php 
session_start();

$ActyID = isset($_GET['id']) ? $_GET['id'] : die ('Error: Missing ID');
$page_title = $ActyID;

date_default_timezone_set('Asia/Manila');

include_once('lib/database.class.php');
include_once('lib/activity.class.php');
include_once('lib/users.class.php');
include_once('lib/tags.class.php');
include_once('lib/actydetails.class.php');
include_once('lib/utility.class.php');
//Instantiate
$db = new Database();
$Activity = new Activity();
$Users = new Users();
$Tags = new Tags();
$ActyDetails = new ActyDetails();
$Date = new Dates();

$Activity->Get_Title_Data($ActyID);

include_once('html/page_header.php');
include_once('html/navbar.php');
?>



<!-- HERO -->
<section class="hero is-primary">
 <div class="hero-body">
    <div class="container is-fluid">
      <h1 class="title">
      <?php echo ucfirst($Activity->ActyTitle); ?>
      </h1>
      <h4 class="subtitle is-6"> </h4>
    </div>
  </div>
</section>

<!-- CONTENT -->
<section class="section">
<div class="container is-fluid">

<div class="columns is-2">

<!--FIRST COLUMN -->
<div class="column is-four-fifths">

  <div style="border-radius:4px; padding:15px;background: #f4f4f4; margin-bottom: 8px; "> 
    <article style="margin-bottom:10px;border-bottom:1px solid #cdcdcd;padding-bottom:10px;padding-left:5px;" class="media">
      <div class="media-content">

        <div class="level-left">
          <a class="level-item">
            <small style="color:#00D1B2;"> <span class="icon is-small"><i class="fa fa-pencil"></i></span><?php echo  ucfirst($Users->GetUser($Activity->UserID));?></small>
          </a>
          <a class="level-item">
            <small style="color:#00D1B2;"> <span class="icon is-small"><i class="fa fa-clock-o"></i></span>Created: <?php echo date('M-d g:i a',strtotime($Activity->ActyPostDate)); ?></small>
          </a>
          <?php
            if($Activity->ModifiedUserID != 0) { ?>
          <a class="level-item">
            <small style="color:#00D1B2;"><span class="icon is-small"><i class="fa fa-exclamation-circle"></i></span>Edited: <?php echo date('M-d', strtotime($Activity->ModifiedDate)); ?> by <?php echo $Users->GetUser($Activity->ModifiedUserID); ?></small>
            </a> <?php } ?>
        </div>

        <div style="margin-top:10px;" class="content">
        <?php $Activity->Get_Activity_Detail($ActyID);
              echo $Activity->textarea; ?>    
        </div>
      </div>
      <div  class="media-right">
      <button class="delete"></button>
      </div>
    </article>


  <?php include_once('html/page_logtable.php'); ?>

  </div>
</div> <!--/first column-->


<!--SECOND COLUMN -->
<div class="column is-one-quarter">
<?php if($Activity->is_Open == 0) { ?>
<article class="message is-primary">
  <div class="message-body">
    <span style="color:#056456"><i class="fa fa-lock" aria-hidden="true"></i> Closed Thread </span>

    <hr style="background-color:#00D1B2;margin-top:5px; margin-bottom:5px;">
   <span style="color:#056456"></i><small><?php echo date('M-d-y g:i a', strtotime($Activity->ActyPostDate)); ?> - <?php echo date('M-d-y g:i a', strtotime($Activity->ActyEndDate)); ?></small></span> <br>
    <span style="color:#056456"><strong>
    <?php
    if(!empty($Activity->ActyEndDate)) {
    $interval = $Date->dateInterval($Activity->ActyPostDate, $Activity->ActyEndDate);
    
        if($interval->format("%a") != 0) {
          echo $interval->format("%a days, "); 
        }

    echo $interval->format("%h hours ");
    echo $interval->format("%i min");
    } ?>
    </strong></span>

  </div>
</article>


<?php } ?>


<div style="padding-top:4px; padding-right:4px; padding-left:4px; padding-bottom:1px;border-radius:5px;background: #f4f4f4; margin-bottom: 8px; "> 

<table style="background:#F4F4F4;" class="table  is-fullwidth is-small">
<tr> <!-- Sev | Cat | Area Widget -->
  <td>
    <nav class="level">
      <div class="level-item has-text-centered">
        <div>
          <h2>Severity</h2>
          <p class="heading"><?php echo $ActyDetails->Get_Severity_Name($Activity->SeverityID);?></p>
        </div>
      </div>
      <div class="level-item has-text-centered">
        <div>
          <h2>Category</h2>
          <p class="heading"><?php echo $ActyDetails->Get_Category_Name($Activity->CategoryID); ?></p>
        </div>
      </div>
      <div class="level-item has-text-centered">
        <div>
          <h2>Area</h2>
          <p class="heading"><?php echo $ActyDetails->Get_Area_Name($Activity->AreaID); ?></p>
        </div>
      </div>
    </nav>
  </td>
</tr>

<tr> <!-- Involved Widget -->
  <td> 
    <p class="has-text-centered">
    <!-- Author -->
    <img style="border:2px solid #FF3860; border-radius:50%;width:38px;height:38px" src="style/img/<?php echo $Users->GetUser($Activity->UserID);?>.png">
    <?php $Tags->UserLists = $Users->Get_User_Listing();
          $Tags->Get_Tags($ActyID);
          $Tags->Compare_Array(); // execute tag comparison
          foreach($Tags->UserLists as $UserNames) { ?>
            <img style="border-radius:50%;width:38px;height:38px" src="style/img/<?php echo $UserNames; ?>.png">
          <?php } ?>
    </p>
  </td>
</tr>

<tr> <!-- Tag Widget -->
  <td>
    <p class="has-text-centered">
      <?php foreach($Tags->TagLists as $TagName) { ?>
        <span class="tag is-danger mar-r-5">  <?php echo $TagName; ?> </span> 
      <?php } ?>  
    </p>
  </td>
</tr>

</table>
</div> <!-- //div style -->


<!--/ ANALYTICS ISSUE WIDGET /-->
<div style="margin-bottom:8px;padding-top:15px;padding-bottom:15px;padding-right:15px;border-radius:5px;background: #00D1B2"> 
  <nav class="level">
    <div class="level-item has-text-centered">
      <div>
        <p style="color:#fff;" class="heading">Total Issues</p>
          <?php $issue = $Activity->CountIssues($ActyID);?>
        <p style="color:#fff;" class="title"> <?php echo $issue['issueCount']; ?> </p>
      </div>
    </div>
 
    <div class="level-item has-text-centered">
      <div>
        <p style="color:#fff;" class="heading">Active Issues</p>
          <?php $active = $Activity->Count_Active_Issues($ActyID);?>
        <p style="color:#fff;" class="title"> <?php echo $active['active']; ?> </p>
      </div>
    </div>

    <div class="level-item has-text-centered">
      <div>
        <p style="color:#fff;" class="heading">Resolved Issues</p>
          <?php $answer = $Activity->CountAnswers($ActyID);?>
        <p style="color:#fff;" class="title"> <?php echo $answer['answer']; ?> </p>
      </div>
    </div>
  
  </nav>
</div> <!-- //div style -->

<!--/ ` WIDGET /-->
<div style="margin-bottom:8px; padding-bottom:15px; padding-top:7px;padding-right:15px;border-radius:5px;background: #f4f4f4"> 

  <div id="loading_icon"><i class="fa fa-spin fa-spinner fa-4x" aria-hidden="true"></i></div>
  <canvas id="line-chartcanvas"></canvas>
</div>


 <?php if(isset($_SESSION['SESSID'])) { ?>
    <form id="page_ctrl" action="util/close_page.php" method="post">
    <input type="hidden" id="pageid" name="pageid" value="<?php echo $ActyID;?>">
    <table class="table  is-fullwidth is-small">
    <tr>
      <td>
        <div class="field is-grouped">
          <p class="control">
            <a href="edit_activity.php?id=<?php echo $ActyID;?>" class="button is-dark is-outlined">
              <span class="icon"><i class="fa fa-pencil-square-o"></i></span>
              <span>Edit</span>
            </a>
          </p>
          <p class="control">
         <button class="button is-danger is-outlined" id="close_btn" name="close" type="submit">Close</button>
         </p>
          <p class="control">
          <button class="button is-primary is-outlined" id="close_btn" name="open" type="submit">Open</button>
          </p>

        </div>
      </td>
    </tr>
    </table>
    </form>
<?php } ?>

</div><!--//second column-->
</div> <!--//columns-->





<form id="log" action="util/submit_log.php" method="POST">
  <tr><td><input type="hidden" id="issue" value="0" name="issue"></td></tr>
  <tr><td><input type="hidden" id="issuenum" value="0" name="issuenum"></td></tr>
  <tr><td><input type="hidden" id="resolve" name="resolve"></td></tr>
<input type="hidden" id="pageid" name="pageid" value="<?php echo $ActyID;?>">

<div class="columns is-2">
  <!--FIRST COLUMN -->
  <div class="column is-four-fifths">
    <!-- // if not logged-in  -->
    <?php if(isset($_SESSION['SESSID']) && $Activity->is_Open == 1) {
      include_once('html/page_submit_log_form.php');
      } else { ?>
      <article class="message is-danger">
        <div class="message-body">
         <i class="fa fa-exclamation-circle" aria-hidden="true"></i> Error
       

        <div style="padding-left:40px;" >
        <ul style="list-style-type:circle">
            <li>You must be logged-in to <strong>Reply.</strong></li>
            <li>Thread is <strong>closed.</strong></li>
        </ul>
        </div>
        </div>


      </article>
    <?php } ?>
  </div>
</div>
</form>


</section>


<?php include_once('html/page_footer.php'); ?>