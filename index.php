<?php 
session_start();

$page_title = "Sengoku";

include_once('lib/database.class.php');
include_once('lib/activity.class.php');
include_once('lib/tags.class.php');
include_once('lib/users.class.php');

//instantiate
$db = new Database();
$Activity = new Activity($db);
$Tags = new Tags($db);
$Users = new Users($db);

//styles
include_once('html/index_header.php');
include_once('html/navbar.php'); ?>

<!-- HERO -->
<section class="hero is-info">
 <div class="hero-body">
    <div class="container">
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
<div class="container">

 <?php if(isset($_GET['err'])){?>
  <article class="message is-danger">
  <div class="message-body">
    <i class="fa fa-exclamation-circle" aria-hidden="true"></i> You must be <strong>logged</strong> in to to reply.
  </div>
  </article>
<?php  } ?>


<div class="columns is-2">

<!--FIRST COLUMN -->
<div class="column is-four-fifths">

  <?php 
    $ActyList = $Activity->Get_TItle_Listing();

    foreach($ActyList as $row) { ?>

<!--  <img style="border-radius:50%;width:38px;height:38px" src="style/img/<?php echo $Users->GetUser($row['UserID']);?>.png"> -->
<div class="card">
  <header class="card-header">
    <div class="card-header-title">
   

  <div class="media-left">
  
    
        <span class="_actyTitle"><a href="page.php?id=<?php echo $row['ActyID'];?>"> <?php echo ucfirst(substr($row['ActyTitle'], 0, 70)); ?> </a></span>
        <br>
        <small class="has-text-grey-light is-size-7"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $row['ActyStartDate']; ?></small>
   

   
  </div>
 

      
    </div>

    <a href="#" class="card-header-icon" aria-label="more options">
      <span class="icon">
        <span class="sev-<?php echo $row['SeverityID'];?>"></span>
       
      </span>
    </a>
  </header>


  <div class="card-content">
    <div class="content">
       <?php 
            $Activity->Get_Activity_Detail($row['ActyID']);
            echo strip_tags(substr($Activity->textarea, 0, 240));
          ?>...


    </div>
  </div>
 
    <div style="padding:5px"><?php
              $Tags->UserLists = $Users->Get_User_Listing(); //get Names and insert to Tags class var
              $Tags->Get_Tags($row['ActyID']);   //Execute Tags based on ActyID
              $Tags->Compare_Array(); // execute tag comparison
              ?>
              <?php foreach($Tags->TagLists as $TagName) { ?>
             <span class="tag is-info mar-r-5">  <?php echo $TagName; ?> </span> 
                 <!-- <span class="tag is-info"> </span> -->
    <?php } ?></div>

  <footer class="card-footer">
    <a href="#" class="card-footer-item"><?php echo $Users->GetUser($row['UserID']);?></a>
    <a href="#" class="card-footer-item"><?php echo $row['AreaID'];?></a>
    <a href="#" class="card-footer-item">Delete</a>
  </footer>
</div>

          <!-- <div class="level-item">
               USERS in TAG
               <?php foreach($Tags->UserLists as $UserNames) { ?>
               <?php echo $UserNames; ?>
               <?php } ?>
          </div> -->

  <?php }  ?>
</div> <!--/first column-->

  <!--SECOND COLUMN -->
<div class="column is-one-third">
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
   <a class="button is-success is-fullwidth" href="new_activity.php" disabled>
    <span class="icon is-small">
      <i class="fa fa-plus"></i>
    </span>
    <span>New Activity</span>
  </a>

<?php } else { ?>
    <a class="button is-success is-fullwidth" href="new_activity.php" >
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
</div> <!--/CONTAINER-->
</section>




<?php include_once('html/index_footer.php'); ?>