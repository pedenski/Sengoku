<?php
include_once('lib/database.class.php');
include_once('lib/actydetails.class.php');


$db = new Database();
$ActyDetails = new ActyDetails($db);



?>

<?php include_once('html/sengoku_header_new_acty.php'); ?>
<?php include_once('html/navbar.php'); ?>


<section class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
       <i class="fa fa-file-text-o" aria-hidden="true"></i> New Activity
      </h1>
      <h2 class="subtitle">
        Create new activity report
      </h2>
    </div>
  </div>
</section>

<section class="section">
<div class="container">
<div class="columns is-2">

  <!--FIRST COLUMN -->
  <div class="column is-four-fifths">
    

    
  <form id="new_activity" action="_submit_new_acty.php" method="POST">
   <!-- NEW ACTIVITY FORM -->
  <?php include_once('html/sengoku_new_acty_form.php'); ?>
  </div>

  <!--SECOND COLUMN -->
  <div class="column is-one-third">
  <?php include_once('html/sengoku_new_acty_form_ctrl.php'); ?>
  </form>



<!--
    <article class="message">
      <div class="message-header">
        <p>Hello World</p>
        <button class="delete" aria-label="delete"></button>
      </div>
      <div class="message-body">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. <strong>Pellentesque risus mi</strong>, tempus quis placerat ut, porta nec nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida purus diam, et dictum <a>felis venenatis</a> efficitur. Aenean ac <em>eleifend lacus</em>, in mollis lectus. Donec sodales, arcu et sollicitudin porttitor, tortor urna tempor ligula, id porttitor mi magna a neque. Donec dui urna, vehicula et sem eget, facilisis sodales sem.
      </div>
    </article>

-->


  </div><!--/SECOND COLUMN-->


</div> <!--/COLUMNS-->
</div> <!--/CONTAINER-->
</section>


<?php include_once('html/sengoku_footer_new_acty.php'); ?>