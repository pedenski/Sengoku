<?php
session_start();

$ActyID = isset($_GET['id']) ? $_GET['id'] : die ('Error: Missing ID');


include_once('lib/database.class.php');
include_once('lib/actydetails.class.php');
include_once('lib/activity.class.php');
include_once('lib/users.class.php');
include_once('lib/tags.class.php');


$db = new Database();
$ActyDetails = new ActyDetails();
$Users = new Users();
$Activity = new Activity();
$Tags = new Tags();


$Activity->Get_Title_Data($ActyID);
?>

<?php include_once('html/sengoku_header_new_acty.php'); ?>
<?php include_once('html/navbar.php'); ?>

<section class="hero is-black">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
       <i class="fa fa-file-text-o" aria-hidden="true"></i> Edit Activity - 
      </h1>
      
    </div>
  </div>
</section>

<section class="section">
<div class="container">


  <article class="message is-black">
  <div class="message-body">
    You are now in <strong> Edit Mode </strong>. Always indicate the reason for change.
  </div>
</article>


<div class="columns is-2">

  <!--FIRST COLUMN -->
  <div class="column is-four-fifths">
    

    
 <form id="new_activity" action="_update_acty.php" method="POST">
  <input type="hidden" id="pageid" name="pageid" value="<?php echo $ActyID;?>">
   <!-- NEW ACTIVITY FORM -->
   
<table class="table borderless is-fullwidth">
<thead>
    <tr>
      
    </tr>
  </thead>

  <tbody>
    
    <!--/ EDIT TITLE /-->
    <tr>
    <td colspan="3">
        <div class="field">
        <input class="input" value="<?php echo ucfirst($Activity->ActyTitle); ?>" name="title" type="text" placeholder="What Activity? Be Specific.">
        </div>
      </td>
    </tr>

    <!--/ EDIT TEXTAREA /-->
    <tr>
    <td colspan="3">
         <div style="padding:4px;border-radius:5px;background: #f4f4f4"> 
        <textarea id="textarea" name="textarea"> 
          

          <?php 
          $Activity->Get_Activity_Detail($ActyID);
          echo $Activity->textarea;
          ?>    
        </textarea>
      </div>
      </td>
    </tr>

     <!--/ EDIT TAGS /-->
     <tr>
        <td colspan="2">
        <div class="field is-fullwidth">
      <!--  -->

     <input class="input is-fullwidth" name="tags[]"" type="text" id="demo3" >
     
        </div>
      </td>

      <td width="10">
  

     <div class="field buttons has-addons">
       <p class="control">
         <a id="remove_all_tags" class="button is-danger is-outlined is-small "><i class="fa fa-eraser" aria-hidden="true"></i></a>
        </p>
      <p class="control">
         <a onclick="$('#demo3').tagEditor('addTag', 'Innovation');" class="button is-success is-outlined is-small"><i class="fa fa-users" aria-hidden="true"></i></a>
      </p>
       </div>

      </td>
    
    </tr>


   





    

    <!--BUTTONS -->
    <tr>
      <td></td>
      <td width="10">
         <a id="reset" class="button is-danger is-outlined">Clear</a>

      </td>
    <td width="10"> 
    <input type="submit"   id="submit" class="button is-info is-outlined">


  
    </td>
    </tr>



  </tbody> 
</table>




   


















  </div>

  <!--SECOND COLUMN -->
  <div class="column is-one-third">
  <!--/ EDIT CONTROL FORM -->

    <!-- CONTROLS / WIDGET -->
    <div style="padding:5px;border-radius:5px;background: #f4f4f4"> 
    <table style="background:#F4F4F4;" class="table borderless is-fullwidth"">
      <tr>
   
        <td colspan="2">

 
  <p class="control has-icons-left has-icons-right">
  
     <input type="text" class="input is-primary"  value="<?php  echo $Activity->ActyStartDate; ?>" name="acty_date" id="datetimepicker7" placeholder="Activity Start Date">
    <span class="icon is-small is-left">
      <i class="fa fa-calendar"></i>
    </span>
   
  </p>






        <div class="field">
       
        </div>
      </td>
      
      </tr> 




      <tr>
 
         <!-- CATEGORY -->
        <td  colspan="2">
      <div class="field">
        <div class="control has-icons-left">
          <div class="select is-fullwidth is-primary">
            <select id="category" name="category">
               

         

          <?php 
          $selected = $Activity->CategoryID;
          $CategoryList = $ActyDetails->Get_Category_List();
          foreach($CategoryList as $row) {
              
               //current category of the product must be selected by default
                if($selected == $row['CategoryID']){
                ?>
                <option value="<?php echo $row['CategoryID'];?>" selected><?php echo $row['CategoryName'];?></option>
                <?php } else { ?>
                   <option value="<?php echo $row['CategoryID'];?>"><?php echo $row['CategoryName'];?></option>
                <?php }?>
          <?php } ?>

            

           </select>
          </div>
          <div class="icon is-small is-left">
            <i class="fa fa-folder-open-o"></i>
          </div>
        </div>
      </div>
      </td>

    </tr>

      <tr>
       
         <!-- CATEGORY -->
        <td  colspan="2">
      <div class="field">
        <div class="control has-icons-left">
          <div class="select is-fullwidth is-primary">
            <select id="area" name="area">


          <?php 
          $selectedArea = $Activity->AreaID;
          $AreaList = $ActyDetails->Get_Area_List();
          print_r($AreaList);
          foreach($AreaList as $row) {
              
               //current category of the product must be selected by default
                if($selectedArea == $row['AreaID']){
                ?>
                <option value="<?php echo $row['AreaID'];?>" selected><?php echo $row['AreaName'];?></option>
                <?php } else { ?>
                   <option value="<?php echo $row['AreaID'];?>"><?php echo $row['AreaName'];?></option>
                <?php }?>
          <?php } ?>



          
             
            </select>
          </div>
          <div class="icon is-small is-left">
            <i class="fa fa-map-marker"></i>
          </div>
        </div>
      </div>
      </td>

    </tr>

    <tr>

    <td colspan="2">  
      <div>
        <input type="text" id="range"  name="range" />
    </div>

    <!-- BUTTONS OPTIONAL 
    <div class="field buttons has-addons">
    <span name="Low"  class="button is-small"><i class="fa fa-thermometer-empty" aria-hidden="true"></i></span>
    <span name="Medium" " class="button is-small"><i class="fa fa-thermometer-half" aria-hidden="true"></i></span>
    <span name="High"  class="button is-small"><i class="fa fa-thermometer-full" aria-hidden="true"></i></span>
    </div>
    -->
    </td>
    </tr>
 </table>
</div>



  <!--/ EDIT CONTROL FORM -->
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

<?php include_once('html/edit_footer.php'); ?>