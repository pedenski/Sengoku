<?php
include_once('../lib/utility.class.php');
include_once('../lib/activity.class.php');
include_once('../lib/actydetails.class.php');


$search = new Search();
$ActyDetails = new ActyDetails();
$Activity = new Activity($db);

if(isset($_POST['query'])) {
	$query = htmlspecialchars($_POST['query']);
	$a = $search->Search($query);


} else { ?>

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

                    </table>
                </div>
            
                 

              </div>




        </div> <!-- END COLUMN IS-ONE-THIRD-->
 
    <?php }  ?> <!--END FOR-->



<?php } ?>


?>
