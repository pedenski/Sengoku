<?php 
$page_title = "Sengoku";

include('lib/database.class.php');
include('lib/activity.class.php');
include('lib/tags.class.php');
include('lib/users.class.php');

//instantiate
$db = new Database();
$Activity = new Activity($db);
$Tags = new Tags($db);
$Users = new Users($db);


?>

<?php include_once('html/sengoku_header.php'); ?>
<?php include_once('html/navbar.php'); ?>


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


<section class="section">
<div class="container">
<div class="columns is-2">

  <!--FIRST COLUMN -->
  <div class="column is-four-fifths">

 <?php 
  $ActyList = $Activity->Get_TItle_Listing();
  foreach($ActyList as $row) { ?>
  <article class="media">

  <div class="media-content">
    <div class="content">
      <p>
        <strong><?php echo ucfirst($row['ActyTitle']); ?> - <?php echo $row['SeverityID'];?> </strong>
        <br>
        <?php 
          $Activity->Get_Activity_Detail($row['ActyID']);
          echo strip_tags(substr($Activity->textarea, 0, 200));
        ?>...
      </p>
    </div>
    <nav class="level is-mobile">
      <div class="level-left">
        <?php
            $Tags->UserLists = $Users->Get_User_Names(); //get Names and insert to Tags class var
            $Tags->Get_Tags($row['ActyID']);   //Execute Tags based on ActyID
            ?>
            <?php foreach($Tags->TagLists as $TagName) { ?>
           <span class="tag is-info mar-r-5">  <?php echo $TagName; ?> </span> 
               <!-- <span class="tag is-info"> </span> -->
        <?php } ?>
      </div>
       
       <div class="level-right">

       
        

         <div class="level-item">
         <span class="sev-<?php echo $row['SeverityID'];?>"></span>
         </div>
        <!-- <div class="level-item">
             USERS in TAG
             <?php foreach($Tags->UserLists as $UserNames) { ?>
             <?php echo $UserNames; ?>
             <?php } ?>
        </div> -->
        

         <div class="level-item">
          <div class="Divider"></div>
         </div>

        <div class="level-item">
        <small> <i class="fa fa-pencil-square" aria-hidden="true"></i> Zild </small>
        </div>

      <div class="level-item">
          <div class="Divider"></div>

      </div>

        <div class="level-item">
          <small><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $row['ActyStartDate']; ?></small>
        </div>


      </div> 


     
       
  
    </nav>
  </div>
  
</article>
<?php }  ?>























   
  </div>

  <!--SECOND COLUMN -->
  <div class="column is-one-third">


    <article class="message">
      <div class="message-header">
        <p>Hello World</p>
        <button class="delete" aria-label="delete"></button>
      </div>
      <div class="message-body">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. <strong>Pellentesque risus mi</strong>, tempus quis placerat ut, porta nec nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida purus diam, et dictum <a>felis venenatis</a> efficitur. Aenean ac <em>eleifend lacus</em>, in mollis lectus. Donec sodales, arcu et sollicitudin porttitor, tortor urna tempor ligula, id porttitor mi magna a neque. Donec dui urna, vehicula et sem eget, facilisis sodales sem.
      </div>
    </article>




  </div><!--/SECOND COLUMN-->


</div> <!--/COLUMNS-->
</div> <!--/CONTAINER-->
</section>



 <div class="container">

  
  </div>

<?php include_once('html/sengoku_footer.php'); ?>