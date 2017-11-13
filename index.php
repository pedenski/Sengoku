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
$maxNum  = 15; //max number per page
$total = $Activity->CountRows_Titles(); //count all rows
$nav = new Pagination($max, $total, $page, $maxNum);




//styles
include_once('html/index_header.php');
include_once('html/navbar.php'); ?>

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

 <?php if(isset($_GET['err'])){?>
  <article class="message is-danger">
  <div class="message-body">
    <i class="fa fa-exclamation-circle" aria-hidden="true"></i> You must be <strong>logged</strong> in to to reply.
  </div>
  </article>
<?php  } ?>


<div class="columns is-2">

<!--FIRST COLUMN -->
<div class="columns is-multiline is-mobile is-narrow is-centered">

  <?php 
    $ActyList = $Activity->Get_TItle_Listing($nav, $max);

    foreach($ActyList as $row) { ?>


<div  class="column is-one-third is-mobile">
<div style="background: #f4f4f4; border-radius:5px; padding:20px;" class="zwrap">
    <div style="background:#f4f4f4;" class="is-narrow">
        

        <article style="border-bottom:1px solid #D6D6D6;" class="media">
        <figure class="media-left">
          <p class="image">
          <img style="border-radius:20px;width:45px;height:45px" src="style/img/<?php echo $Users->GetUser($row['UserID']);?>.png"> 
          </p>
        </figure>
        <div class="media-content">
          <div class="content">
            <p>

                <span class="_actyTitle"><a href="page.php?id=<?php echo $row['ActyID'];?>"> <?php echo $Activity->get_snippet($row['ActyTitle'], 7); ?>..
                  <br>
                    <small class="has-text-grey-light is-size-7"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $row['ActyStartDate']; ?></small>
            </a></span> 
            <br>
      
            </p>
          </div>
  
        </div>
        <div class="media-right">
      
            <span class="icon">
              <span class="sev-<?php echo $row['SeverityID'];?>"></span>
             
            </span>
          </a>
        </div>
      </article>


     
    </div>

    <div style="background:#f4f4f4; margin-top:15px;padding-bottom:15px;border-bottom:1px solid #D6D6D6;" class="is-narrow">



         <nav class="level">
      <div class="level-item has-text-centered">
        <div>
          <h2><?php echo $ActyDetails->Get_Severity_Name($row['SeverityID']);?></h2>
          <p class="heading"><small>Severity</small></p>
        </div>
      </div> 
     
    <!--   <div style="border-left:2px solid #f4f4f4; height:35px;" class="vl"></div> -->
      
      <div class="level-item has-text-centered">
        <div>
          <h2><?php echo $ActyDetails->Get_Category_Name($row['CategoryID']); ?></h2>
          <p class="heading"><small>Category</small></p>
        </div>
    
      </div> 
     
  
     
      <div class="level-item has-text-centered">
        <div>
          <h2><?php echo $ActyDetails->Get_Area_Name($row['AreaID']); ?></h2>
          <p class="heading"><small>Area</small></p>
        </div>
      </div>


    </nav>

          <?php 
            //$Activity->Get_Activity_Detail($row['ActyID']);
            //echo strip_tags($Activity->get_snippet($Activity->textarea, 10));
          ?>
   
    </div>


 <div style="background:#f4f4f4; margin-top:15px;margin-bottom:5px; " class="is-narrow">



         <nav class="level">
      <div class="level-item has-text-centered">
        <div>
          <h2><i class="fa fa-bar-chart" aria-hidden="true"></i></h2>
          <p class="heading">Open</p>
        </div>
      </div> 
     
    
      
      <div class="level-item has-text-centered">
        <div>
          <h2><i class="fa fa-comment-o" aria-hidden="true"></i></h2>
          <p class="heading">5</p>
        </div>
    
      </div> 
     
     
      <div class="level-item has-text-centered">
        <div>
          <h2><i class="fa fa-pencil-square-o" aria-hidden="true"></i></h2>
          <p class="heading">5</p>
        </div>
    
      </div> 
     
     
      <div class="level-item has-text-centered">
        <div>
          <h2><i class="fa fa-thumbs-down" aria-hidden="true"></i></h2>
          <p class="heading">0</p>
        </div>
      </div>
    </nav>

          <?php 
            //$Activity->Get_Activity_Detail($row['ActyID']);
            //echo strip_tags($Activity->get_snippet($Activity->textarea, 10));
          ?>
   
    </div>

<!--     <div style="background:#fff; border-bottom:1px solid #f4f4f4; padding-left:10px;" class="zcontent">
   <b>Description</b><br>
          <?php 
            $Activity->Get_Activity_Detail($row['ActyID']);
            echo strip_tags($Activity->get_snippet($Activity->textarea, 10));
          ?> ...
   
    </div> -->


    <div style="background:#f4f4f4; padding-left:10px;" class="is-narrow">
 
     <?php
          /*    $Tags->UserLists = $Users->Get_User_Listing(); //get Names and insert to Tags class var
              $Tags->Get_Tags($row['ActyID']);   //Execute Tags based on ActyID
              $Tags->Compare_Array(); // execute tag comparison
              ?>
              <?php foreach($Tags->TagLists as $TagName) { ?>
             <span class="tag is-info mar-r-5">  <?php echo $TagName; ?> </span> 
                 <!-- <span class="tag is-info"> </span> -->
    <?php } */?>

    </div>
</div> <!--/zwrapp-->
</div>
  <?php }  ?>

<!-- <style>
.pagi {
  background: #fff;
  padding:5px;
}

.pagi a, b {
  background:#fff;
  border-radius: 3px;

}
</style>
<div class="pagi">
<?php
echo $nav->first(' <a href="./page-{nr}/">First</a> | ');
echo $nav->numbers(' <a href="index.php?page={nr}">{nr}</a> | ', '  <b>{nr}</b> | ');
echo $nav->next(' <a href="index.php?page={nr}">Next</a>  ');
?>
</div>
 -->


</div> <!--/first column-->

  <!--SECOND COLUMN -->
<div class="column is-one-quarter">
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


    <!-- <article class="message">
      <div class="message-header">
        <p>Hello World</p>
        <button class="delete" aria-label="delete"></button>
      </div>
      <div class="message-body">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. <strong>Pellentesque risus mi</strong>, tempus quis placerat ut, porta nec nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida purus diam, et dictum <a>felis venenatis</a> efficitur. Aenean ac <em>eleifend lacus</em>, in mollis lectus. Donec sodales, arcu et sollicitudin porttitor, tortor urna tempor ligula, id porttitor mi magna a neque. Donec dui urna, vehicula et sem eget, facilisis sodales sem.
      </div>
    </article> -->




  </div><!--/SECOND COLUMN-->


</div> <!--/COLUMNS-->


</div>
</div> <!--/CONTAINER-->
</section>



<?php include_once('html/index_footer.php'); ?>