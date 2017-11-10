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
<section class="hero is-danger">
 <div class="hero-body">
    <div class="container">
      <h1 class="title">
      <?php echo ucfirst($Activity->ActyTitle); ?>
      </h1>
      <h4 class="subtitle is-6">

        <nav class="breadcrumb has-bullet-separator" aria-label="breadcrumbs">
        <ul>
          <li>
            <a><p>
          <i class="fa fa-user-o" aria-hidden="true"></i>  
          <?php echo $Users->GetUser($Activity->UserID);?>
          </p></a>
          </li>
          <li>
            <p><a>
           <i class="fa fa-clock-o" aria-hidden="true"> </i> <?php echo $Activity->ActyStartDate; ?></a></p>
          </li>

     
         
        </ul>
      </nav>



         

       
      </h4>
    </div>
  </div>
</section>




<!-- CONTENT -->
<section class="section">
<div class="container">







	<div class="tabs is-medium">
  <ul>
    <li class="is-active"><a>  Table</a></li>
    <li><a> Timeline</a></li>
  
  </ul>
</div>
<div class="columns is-2">

<!--FIRST COLUMN -->

<div class="column is-four-fifths">
  <article class="media" style="padding:10px;">
             <div class="media-content">
            <div class="content">
            
                
          
            <?php 
            $Activity->Get_Activity_Detail($ActyID);
            echo $Activity->textarea;
            ?>    
          
            </div>
            <nav class="level is-mobile">
              <div class="level-left">
                <a class="level-item">
                 
                </a>
                <a class="level-item">
                 
                </a>
                <a class="level-item">
                
                </a>
              </div>
            </nav>
          </div>
   
        </article>


</div> <!--/first column-->

  <!--SECOND COLUMN -->
  <div class="column is-one-quarter">
    <div style="padding:1px;border-radius:5px;background: #f4f4f4"> 
    <table style="background:#F4F4F4;" class="table  is-fullwidth is-small">
     
      <tr><td><a href="edit_activity.php?id=<?php echo $ActyID;?>"> Edit</td></tr>
        <tr>
          <td>Severity - <?php echo $ActyDetails->Get_Severity_Name($Activity->SeverityID);?></td>
        </tr>
        <tr><td>Area - <?php echo $ActyDetails->Get_Area_Name($Activity->AreaID); ?> </td>
        </tr>
        <tr>
          <td>Category - <?php echo $ActyDetails->Get_Category_Name($Activity->CategoryID); ?></td>
        </tr>
 		<tr>
 			<td> 
       <img style="border:2px solid #FF3860; border-radius:50%;width:38px;height:38px" src="style/img/<?php echo $Users->GetUser($Activity->UserID);?>.png">
 


       <?php 
       $Tags->UserLists = $Users->Get_User_Listing();
       $Tags->Get_Tags($ActyID);
       $Tags->Compare_Array(); // execute tag comparison
       foreach($Tags->UserLists as $UserNames) { ?>
       <img style="border-radius:50%;width:38px;height:38px" src="style/img/<?php echo $UserNames; ?>.png">
       <?php } ?>
      </td>
 		</tr>
 		<tr>
 			<td>
        <div class="tags">
       <?php foreach($Tags->TagLists as $TagName) { ?>
       <span class="tag is-primary mar-r-5">  <?php echo $TagName; ?> </span> 
       <?php } ?>
     </div>
      </td>
 		</tr>
    <tr>


      <td> Edited: <?php echo date('M-d, h:i', strtotime($Activity->ModifiedDate)); ?> - <?php echo $Activity->ModifiedUserID; ?>
      </td>

    </tr>
 	</table>
 </div>
</div><!--/SECOND COLUMN-->


</div> <!--/COLUMNS-->




<?php include_once('html/page_log_table.php'); ?>


<form id="log" action="_submit_log.php" method="POST">
<tr><td><input id="issue" value="0" name="issue"></td></tr>
<tr><td><input id="issuenum" value="0" name="issuenum"></td></tr>
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