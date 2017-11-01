<?php 
$ActyID = isset($_GET['id']) ? $_GET['id'] : die ('Error: Missing ID');
$page_title = $ActyID;



include_once('lib/database.class.php');
include_once('lib/activity.class.php');
include_once('lib/users.class.php');
include_once('lib/tags.class.php');
include_once('lib/severity.class.php');


//instantiate
$db = new Database();
$Activity = new Activity($db);
$Users = new Users($db);
$Tags = new Tags($db);
$Severity = new Severity($db);

$Activity->Get_Title_Data($ActyID);

include_once('html/sengoku_header_page.php');
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
          <?php
          $Users->Get_Username($Activity->UserID);
          echo $Users->UserName; ?> </p></a>
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
 		<tr>
 			<td>
       <?php 
       $Tags->UserLists = $Users->Get_User_Listing();
       $Tags->Get_Tags($ActyID);
       foreach($Tags->UserLists as $UserNames) { ?>
       <img style="border-radius:5px;width:32px;height:32px" src="style/img/<?php echo $UserNames; ?>.png">
       <?php } ?>
      </td>
 		</tr>
 		<tr>
 			<td>
       <?php foreach($Tags->TagLists as $TagName) { ?>
       <span class="tag is-info mar-r-5">  <?php echo $TagName; ?> </span> 
       <?php } ?>
      </td>
 		</tr>
 	</table>
 </div>
</div><!--/SECOND COLUMN-->


</div> <!--/COLUMNS-->





  <table class="table is-fullwidth is-small">
    <tr>
      <td>Date Log</td>
    
      <td>Author</td>
      <td>Severity</td>
      <td>Message</td>
      <td>Edit</td>

    </tr>
    <tr>
      <td width="100"><small> 2017-11-01 00:03:06 </small></td>

      <td>  <figure class="media-left">
       <p class="image is-32x32">
      <img style="border-radius:5px;" src="https://bulma.io/images/placeholders/128x128.png">
       </p>
       </figure></td>
      <td><span class="tag is-danger">Low</span></td>
      <td> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Prtur adipiscoin ornare magna eros</td>
      <td><a class="button is-small"><i class="fa fa-times" aria-hidden="true"></i></a></td>
    </tr>
    <tr>
      <td width="100"><small> 2017-11-01 00:03:06 </small></td>
      <td>  <figure class="media-left">
       <p class="image is-32x32">
      <img style="border-radius:5px;" src="https://bulma.io/images/placeholders/128x128.png">
       </p>
       </figure></td>
      <td>Low</td>
      <td> Lorem ipsum dolor sit amet, consectetur adipiscing tur consectetur adipiscing tuconsectetur adipiscing tuconsectetur adipiscing tuadipisctur adipiscelit. Proin ornare magna eros</td>
      <td><a class="button is-small"><i class="fa fa-times" aria-hidden="true"></i></a></td>

    </tr>
    <tr>
      <td width="100"><small> 2017-11-01 00:03:06 </small></td>
      <td>  <figure class="media-left">
       <p class="image is-32x32">
      <img style="border-radius:5px;" src="https://bulma.io/images/placeholders/128x128.png">
       </p>
       </figure></td>
      <td>Low</td>
      <td> Lorem ipsum dolor sit amet, consectetur adipiscing elit.it. Proin ornare magna erit. Proin ornare magna er Proin ornare magna eros</td>
      <td><a class="button is-small"><i class="fa fa-times" aria-hidden="true"></i></a></td>

    </tr>
    
  </table>


<div class="columns is-2">

<!--FIRST COLUMN -->
<div class="column is-four-fifths">
   <div style="padding:5px;border-radius:5px;background: #f4f4f4"> 
  <textarea id="textarea" name="textarea"></textarea>
</div>


</div>

<div class="column is-one-quarter">
<div style="padding:1px;border-radius:5px;background: #f4f4f4"> 
<table style="background:#F4F4F4;" class="table  is-fullwidth is-small">
  <tr><td>   
        <div class="field">
        <div class="control has-icons-left">
          <div class="select is-fullwidth">
            <select id="category" name="category">

            <?php

            $SeverityList = $Severity->Get_Severity_List();
            foreach($SeverityList as $row) {
              $SeverityID   = $row['SeverityID'];
              $SeverityName = $row['SeverityName'];
            ?>
           
              <option value="<?php echo $SeverityID; ?>"><?php echo $SeverityName; ?></option>




            <?php } ?>  


          
             
            </select>
          </div>
          <div class="icon is-small is-left">
            <i class="fa fa-globe"></i>
          </div>
        </div>
      </div>
          </td>
  </tr> 
  <tr>
 <td>
     <input type="text" class="input" name="acty_date" id="datetimepicker7" placeholder="02/04/88">
    </td>
   </tr>
   <tr>
    <td>
      <a class="button is-primary is-fullwidth">Submit</a>
    </td>
  </tr>
  </table>
</div>
</div>












</div> <!--/CONTAINER-->
</section>



























 <?php include_once('html/sengoku_footer_page.php'); ?>