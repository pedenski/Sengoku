<?php
session_start();

if(!isset($_SESSION['SESSID'])){
  header('location: index.php?err=1');
} 

include_once('lib/database.class.php');
include_once('lib/actydetails.class.php');
include_once('lib/users.class.php');

$db = new Database();
$ActyDetails = new ActyDetails();
$Users = new Users(); 

include_once('html/newActy_header.php');
include_once('html/navbar.php');
?>


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

<!--/ FIRST COLUMN /-->
<div class="column is-four-fifths">

<form id="new_activity" method="POST">
<!--/ NEW ACTIVITY FORM /-->
<?php include_once('html/newActy_form_left.php'); ?>
</div>

<!--/ SECOND COLUMN /-->
<div class="column is-one-third">
<?php include_once('html/newActy_form_right.php'); ?>
</form>


</div><!--//Second Column -->


</div> <!-- //columns -->
</div> <!-- //containers-->
</section>

<?php include_once('html/newActy_footer.php'); ?>