<?php 
$page_title = "Sengoku";

include('lib/database.class.php');
include('lib/activity.class.php');

//instantiate
$db = new Database();
$Activity = new Activity($db);




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
    <table class="table is-bordered is-fullwidth">   
    <?php 
  $ActyList = $Activity->Get_Titles();
  foreach($ActyList as $row) 
  { ?>

    
       <tr>
      <th><?php echo $row['ActyTitle']; ?></th>
      <tr>
      <td>DESCRIPTION HERE</td>
      </tr>
    </tr>


   




 <?php }  ?>

  </table>
    
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