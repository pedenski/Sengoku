  <table class="table is-fullwidth is-small">
 
    <tr>
      <td>Date Log</td>
    
      <td>Author</td>
      <td>Severity</td>
      <td>Message</td>
      <td>Edit</td>

    </tr>

  
  <?php 

  $logs = $Activity->Get_Logs($ActyID);

  foreach($logs as $log) { ?>

    <tr>
      <!--/ LOG DATE /-->
      <td width="200"><small> <?php echo $log['LogDate'];?> </small></td>

      <!--/ USER /-->
      <?php $Users->Get_Username($log['UserID']);?>
      <td width="100"><figure class="media-left"><p class="image is-36x32"><img style="border-radius:5px;width:30px;height:30px" src="style/img/<?php echo $Users->UserName; ?>.png"></p></figure></td>

      <!--/ SEVERITY /-->
      <td width="100"><span class="tag <?php echo $ActyDetails->Severity_Status($log['LogSeverityID']); ?>"><?php echo $ActyDetails->Get_Severity_Name($log['LogSeverityID']);?></span></td>

      <!--/ LOG DETAIL /-->
      <td> <?php echo $log['LogText'];?></td>


      <td width="100"><a class="button is-small"><i class="fa fa-times" aria-hidden="true"></i></a></td>
    </tr>




  <?php } ?>

  
   
    
  </table>