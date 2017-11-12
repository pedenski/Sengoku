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


//instantiate
$db = new Database();
$Activity = new Activity();
$Users = new Users();
$Tags = new Tags();
$ActyDetails = new ActyDetails();

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
      <h4 class="subtitle is-6">

       
         

       
      </h4>
    </div>
  </div>
</section>




<!-- CONTENT -->
<section class="section">
<div class="container is-fluid">


<!-- 
	<div class="tabs is-medium">
  <ul>
    <li class="is-active"><a>  Table</a></li>
    <li><a> Timeline</a></li>
  
  </ul>
</div> -->
<div class="columns is-2">

<!--FIRST COLUMN -->

<div class="column is-four-fifths">

  

  
 <div style="padding-top:4px; padding-right:4px; padding-left:4px; padding-bottom:1px;border-radius:5px;background: #f4f4f4; margin-bottom: 8px; "> 
 <article class="media" style="padding:8px;">
  
  <div class="media-content">
  
      <div class="level-left">
        <a class="level-item">
          <small style="color:#00D1B2;"> <span class="icon is-small"><i class="fa fa-pencil"></i></span><?php echo  ucfirst($Users->GetUser($Activity->UserID));?></small>
        </a>
        <a class="level-item">
         <small style="color:#00D1B2;"> <span class="icon is-small"><i class="fa fa-clock-o"></i></span><?php echo date('M-d g:i a',strtotime($Activity->ActyStartDate)); ?></small>
        </a>

        <?php
        if($Activity->ModifiedUserID != 0) { ?>
         <a class="level-item">
         <small style="color:#00D1B2;"><span class="icon is-small"><i class="fa fa-exclamation-circle"></i></span>Edited: <?php echo date('M-d', strtotime($Activity->ModifiedDate)); ?> by <?php echo $Users->GetUser($Activity->ModifiedUserID); ?></small>
        </a> <?php } ?>
      </div>

    <div class="content">
        <?php 
            $Activity->Get_Activity_Detail($ActyID);
            echo $Activity->textarea;
            ?>    
 
    </div>

  </div>
  <div class="media-right">
    <button class="delete"></button>
  </div>
</article>


<?php include_once('html/page_log_table.php'); ?>
</div>
</div> <!--/first column-->

  <!--SECOND COLUMN -->
  <div class="column is-one-quarter">

    <div style="padding-top:4px; padding-right:4px; padding-left:4px; padding-bottom:1px;border-radius:5px;background: #f4f4f4; margin-bottom: 8px; "> 
  
    <table style="background:#F4F4F4;" class="table  is-fullwidth is-small">
     


        <tr>
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
       
 		<tr>
 			<td> 
       <p class="has-text-centered">
       
       <?php 
       $Tags->UserLists = $Users->Get_User_Listing();
       $Tags->Get_Tags($ActyID);
       $Tags->Compare_Array(); // execute tag comparison
       foreach($Tags->UserLists as $UserNames) { ?>
       <img style="border-radius:50%;width:38px;height:38px" src="style/img/<?php echo $UserNames; ?>.png">
       <?php } ?>
     </p>
      </td>
 		</tr>
 		<tr>
 			<td>
        <p class="has-text-centered">
           
       <?php foreach($Tags->TagLists as $TagName) { ?>
       <span class="tag is-danger mar-r-5">  <?php echo $TagName; ?> </span> 
       <?php } ?>  
      </p>
     
      </td>
 		</tr>

 	</table>
 </div>




  <div style="margin-bottom:8px;padding-top:15px;padding-bottom:15px;padding-right:15px;border-radius:5px;background: #00D1B2"> 
  <nav class="level">
  <div class="level-item has-text-centered">
      <div>
      <p class="heading">Total </p>
      <?php
      $issue = $Activity->CountIssues($ActyID);?>
      <p class="title"> <?php echo $issue['issueCount']; ?> </p>
    </div>
  </div>
  <div class="level-item has-text-centered">
   
    <div>
      <p class="heading">Active </p>
      <?php
      $active = $Activity->Count_Active_Issues($ActyID);?>
        <p class="title"> <?php echo $active['active']; ?> </p>
    </div>
  </div>
  <div class="level-item has-text-centered">
   <div>
      <p class="heading">Resolved</p>
       <?php
        $answer = $Activity->CountAnswers($ActyID);?>
        <p class="title"> <?php echo $answer['answer']; ?> </p>
    </div>
  </div>
  
</nav>

  </div>






 <div style="margin-bottom:8px; padding-top:15px;padding-right:15px;border-radius:5px;background: #f4f4f4"> 
    <?php include_once('html/page_graph_entries.php'); ?>


        <canvas id="line-chartcanvas"></canvas>
   

  </div>

     <table class="table  is-fullwidth is-small">
            <tr>
        <td>

          <div class="field is-grouped">
          <p class="control">
             <a href="edit_activity.php?id=<?php echo $ActyID;?>" class="button is-light is-fullwidth">
        <span class="icon">
          <i class="fa fa-pencil-square-o"></i>
        </span>
        <span>Edit</span>
      </a>
          </p>
          <p class="control">
           <a href="edit_activity.php?id=<?php echo $ActyID;?>" class="button is-light">
        <span class="icon">
          <i class="fa fa-times"></i>
        </span>
        <span>Close</span>
      </a>
          </p>
           <p class="control">
             <a href="edit_activity.php?id=<?php echo $ActyID;?>" class="button is-light is-fullwidth">
        <span class="icon">
          <i class="fa fa-folder-open-o"></i>
        </span>
        <span>Open</span>
      </a>


        </div>

        </td>
      </tr>
</table>




</div><!--/SECOND COLUMN-->


</div> <!--/COLUMNS-->






<form id="log" action="_submit_log.php" method="POST">
<tr><td><input  id="issue" value="0" name="issue"></td></tr>
<tr><td><input  id="issuenum" value="0" name="issuenum"></td></tr>
<tr><td><input  id="resolve" name="resolve"></td></tr>
<input type="hidden" id="pageid" name="pageid" value="<?php echo $ActyID;?>">


<div class="columns is-2">



<!--FIRST COLUMN -->
<div class="column is-four-fifths">
  <!-- SUBMIT LOG FORM -->

<?php 
if(isset($_SESSION['SESSID']))
{
  include_once('html/page_submit_log_form.php');
} else { ?>
  
  <article class="message is-danger">
  <div class="message-body">
    <i class="fa fa-exclamation-circle" aria-hidden="true"></i> You must be <strong>logged</strong> in to to reply.
   
  </div>
</article>

<?php } ?>












</div> <!--/CONTAINER-->
</form>


</section>



























 <?php include_once('html/page_footer.php'); ?>