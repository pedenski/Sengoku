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
include_once('html/sengoku_header_new_acty.php');
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







<div class="columns is-multiline is-mobile">
  
  <?php 
    $ActyList = $Activity->Get_TItle_Listing();

    foreach($ActyList as $row) { ?>

      <div class="column is-one-quarter">
    <div style="padding:5px; background:#F4F4F4;border:1px solid #000;">
    
         <span class="_actyTitle"><a href="page.php?id=<?php echo $row['ActyID'];?>"> <?php echo ucfirst($row['ActyTitle']); ?> </a></span>
                  </div>
 </div>     

  <?php }  ?>

</div> <!--/first column-->





  <!--SECOND COLUMN -->
<!-- <div class="column is-one-third">
<?php if(!isset($_SESSION['SESSID'])){ ?>
    <div style="margin-bottom:5px; padding:5px;border-radius:5px;background: #f4f4f4"> 

    <form id='login' action='_submit_login.php' method='post' accept-charset='UTF-8'>
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
 -->





<!-- 
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

 -->
    <!-- <article class="message">
      <div class="message-header">
        <p>Hello World</p>
        <button class="delete" aria-label="delete"></button>
      </div>
      <div class="message-body">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. <strong>Pellentesque risus mi</strong>, tempus quis placerat ut, porta nec nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida purus diam, et dictum <a>felis venenatis</a> efficitur. Aenean ac <em>eleifend lacus</em>, in mollis lectus. Donec sodales, arcu et sollicitudin porttitor, tortor urna tempor ligula, id porttitor mi magna a neque. Donec dui urna, vehicula et sem eget, facilisis sodales sem.
      </div>
    </article> -->



</div> <!--/CONTAINER-->
</section>




<?php include_once('html/sengoku_footer_new_acty.php'); ?>