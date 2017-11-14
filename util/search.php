<?php
$page = isset($_GET['page']) ? $_GET['page'] : 1;

include_once('../lib/utility.class.php');
include_once('../lib/activity.class.php');
include_once('../lib/actydetails.class.php');
include_once('../mods/pagination/pagination.php');
include_once('../lib/users.class.php');
include_once('../lib/tags.class.php');
$Users = new Users();
$search = new Search();
$ActyDetails = new ActyDetails();
$Activity = new Activity();
$Tags = new Tags();

//pagination
$max = 12; //max items per page
$maxNum  = 15; //max number per page
$total = $Activity->CountRows_Titles(); //count all rows
$nav = new Pagination($max, $total, $page, $maxNum);




if(isset($_POST['query'])) {
	$query = htmlspecialchars($_POST['query']);
	$a = $search->Search($query);
	


        foreach($a as $row) { ?>


          <div style="border-radius: 3px; margin-bottom:5px;  background:#f4f4f4" class="column  is-one-fourth zwrap-<?php echo $row['SeverityID'];?>">
              
              <div class="columns">
                <div class="column">
                  <table style="background:#f4f4f4;" class="table is-fullwidth"> 
                    <tr>
                      <td>
                        <a href="page.php?id=<?php echo $row['ActyID'];?>"><span style="color:#00D1B2; font-size:1.4rem;" class="_actyTitle"> <?php echo $Activity->get_snippet($row['ActyTitle'], 7); ?>
                         </span></a>
                      </td>
                    </tr>
                   <tr>
                      <td> <small> <?php $Activity->Get_Activity_Detail($row['ActyID']);
                            echo strip_tags($Activity->get_snippet($Activity->textarea, 20)); ?> ... </small>
                      </td>
                    </tr>

                    <tr>
                      <td>
                         <?php $Tags->UserLists = $Users->Get_User_Listing(); //get Names and insert to Tags class var
                               $Tags->Get_Tags($row['ActyID']);   //Execute Tags based on ActyID
                               $Tags->Compare_Array(); // execute tag comparison  ?>
                              <?php foreach($Tags->TagLists as $TagName) { ?>
                                  <span class="tag is-dark mar-r-5">  <?php echo $TagName; ?> </span> 
                                  <!-- <span class="tag is-info"> </span> -->
                          <?php } ?>
                      </td>
                    </tr>

                    </table>
                </div>
            
                 

              </div>




        </div> <!-- END COLUMN IS-ONE-THIRD-->
 
 



<?php } ?>





<?php } else { ?>

  <style>
  .pagi {

  }
  .pagi a, b {
   background:#f4f4f4;
   padding:8px;
   border-radius: 3px;
   margin-right:2px;

  }
  </style>
  <div class="column">
  <table class="table is-fullwidth is-bordered">
  <tr><td></td>

  <td width="300">
  <div class="pagi is-pulled-right">
  <?php
  echo $nav->first(' <a href="index.php">First</a>  ');
  echo $nav->numbers(' <a href="index.php?page={nr}">{nr}</a>  ', '  <b>{nr}</b>  ');
  echo $nav->next(' <a href="index.php?page={nr}">Next</a>  ');
  ?></div></td>
  </tr>
  </table>
  </div>

  <?php $ActyList = $Activity->Get_TItle_Listing($nav, $max);
        foreach($ActyList as $row) { ?>


          <div style="border-radius: 3px; margin-bottom:5px;  background:#f4f4f4" class="column  is-one-fourth zwrap-<?php echo $row['SeverityID'];?>">
              
              <div class="columns">
                <div class="column">
                  <table style="background:#f4f4f4;" class="table is-fullwidth"> 
                    <tr>
                      <td>
                        <a href="page.php?id=<?php echo $row['ActyID'];?>"><span style="color:#00D1B2; font-size:1.4rem;" class="_actyTitle"> <?php echo $Activity->get_snippet($row['ActyTitle'], 7); ?>
                         </span></a>
                      </td>
                    </tr>
                   <tr>
                      <td> <small> <?php $Activity->Get_Activity_Detail($row['ActyID']);
                            echo strip_tags($Activity->get_snippet($Activity->textarea, 20)); ?> ... </small>
                      </td>
                    </tr>


                    <tr>
                      <td>
                         <?php $Tags->UserLists = $Users->Get_User_Listing(); //get Names and insert to Tags class var
                               $Tags->Get_Tags($row['ActyID']);   //Execute Tags based on ActyID
                               $Tags->Compare_Array(); // execute tag comparison  ?>
                              <?php foreach($Tags->TagLists as $TagName) { ?>
                                  <span class="tag is-dark mar-r-5">  <?php echo $TagName; ?> </span> 
                                  <!-- <span class="tag is-info"> </span> -->
                          <?php } ?>
                      </td>
                    </tr>


                    </table>
                </div>
            
                 

              </div>




        </div> <!-- END COLUMN IS-ONE-THIRD-->
 
    <?php }  ?> <!--END FOR-->



<?php } ?>

