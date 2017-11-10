  <table id="logtable" class="table is-fullwidth is-small">
 
    <tr>
      <td>Date Log</td>
    
      <td>User</td>
      <td> <p class="has-text-centered">Status</p></td>
      <td colspan="2">Action</td>
     

    </tr>


<form action="html/_get_logid.php" method="POST">
  
  <?php 

  $logs = $Activity->Get_Logs($ActyID);

  foreach($logs as $log) { 

  	if($log['LogIssue'] != 1) {
  		echo "<tr>";
  	} else {
  		echo "<tr class='is-selected'";
  	}

  	?>
    <tr>
    
      <!--/ LOG DATE /-->
      <td width="130"><small> <?php echo date('M-d g:i a',strtotime($log['LogDate']));?> </small></td>

      <!--/ USER /-->
 
      <td width="50"><figure class="media-left"><p class="image"><img style="border-radius:5px;width:55px;height:25px" src="style/img/<?php echo $Users->GetUser($log['UserID']);?>.png"></p></figure></td>

      <!--/ SEVERITY /-->

      <td width="80">
        <p class="has-text-centered">
        <?php
        if($log['ReferTo'] == 0) { ?>
           <span class="tag <?php echo $ActyDetails->Severity_Status($log['LogSeverityID']); ?>"><?php echo $ActyDetails->Get_Severity_Name($log['LogSeverityID']);?></span>
        <?php } else { ?>
            <span class="tag is-dark">Ref # <?php echo sprintf("%02d",$log['ReferTo']); ?>:</span>


        <?php }  ?>
       
      </p>
      </td>

      <!--/ LOG DETAIL /-->
      <td> 
    
        <?php echo strip_tags($log['LogText'],'<strong><em>');?></td>

    

      <td width="150">
        <div class="buttons has-addons is-pulled-right">
          <span id="datalog" class="button is-small log" data-logid="<?php echo $log['LogID'];?>" ><?php echo $log['LogID'];?></span>
      
        </div>

        </td>
    </tr>




  <?php } ?>
</form>
  
   
    
  </table>