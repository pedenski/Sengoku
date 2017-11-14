<?php
$page = isset($_GET['page']) ? $_GET['page'] : 1;

include_once('../lib/utility.class.php');
include_once('../lib/activity.class.php');
include_once('../lib/tags.class.php');
include_once('../lib/users.class.php');
include_once('../mods/pagination/pagination.php');
include_once('../lib/actydetails.class.php');

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
	$searchlist = $search->Search($query);
	if(empty($searchlist)) {
?>
		<div class="column">
		<article class="message is-danger">
		  <div class="message-body">
		   No Results Found
		  </div>
		</article>
		</div>


<?php	} else {

	    foreach($searchlist as $row) { ?>
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
            
                 <div class="column is-one-fourth">
                  <table  style="background:#f4f4f4; border-color:#fff;" class="table   is-fullwidth is-small">
                    <tr> 
                      <td ><p class="has-text-right is-small" style="color:gray;">Author</p></td>
                      <td width="10"><?php echo $Users->GetUser($row['UserID']);?></td>
                         <td><p class="has-text-right" style="color:gray;">Area </td>
                      <td><?php echo $ActyDetails->Get_Area_Name($row['AreaID']); ?></td>
                      
                    </tr>  
                    <tr> 
                       <td><p class="has-text-right" style="color:gray;">Date </td>
                      <td><?php echo date('m-y',strtotime($row['ActyStartDate'])); ?></td>
                      
                       <td><p class="has-text-right" style="color:gray;">Time </td>
                      <td><?php echo date('H:i',strtotime($row['ActyStartDate'])); ?></td>
                    </tr>  

                     <tr> 
                      <td><p class="has-text-right" style="color:gray;">Category </td>
                      <td><?php echo $ActyDetails->Get_Category_Name($row['CategoryID']); ?></td>
                  
                       <td><p class="has-text-right" style="color:gray;">Severity </td>
                      <td><?php echo $ActyDetails->Get_Severity_Name($row['SeverityID']);?></td>
                    </tr>
                        


                  </table>


                </div>

              </div>




        </div> <!-- END COLUMN IS-ONE-THIRD-->
 



<?php }//if foreach 
	} //if empty  ?>








<?php } //if isset post?> 
