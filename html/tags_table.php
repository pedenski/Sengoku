<div style="padding:20px; border-radius:5px; background:#f4f4f4;">
	<div class="content">
<table style="background:#f4f4f4;" class="table  is-fullwidth is-striped">
<thead>
  <tr>
    <th>ID</th>
    <th>User</th>
    <th>Title</th>
    <th>Date</th>
    <th><p class="has-text-centered">Div</p></th>
    <th><p class="has-text-centered">Sev</p></th>

  </tr>
</thead>


<?php
foreach($tags as $r) { 
$Activity->Get_Title_Data($r['ActyID']);
?>
<tr>
	<td width="25"><?php  echo $r['ActyID']; ?></td>
	<td width="25"><img style="border-radius:50%;width:30px;height:30px" src="style/img/<?php echo $Users->GetUser($Activity->UserID);?>.png"></td>
	<td><a href="page.php?id=<?php echo $r['ActyID']; ?>"><?php echo ucfirst($Activity->get_snippet($Activity->ActyTitle, 8)); ?></a><br>
		<?php $Activity->Get_Activity_Detail($r['ActyID']);?>
		<small> <?php $Activity->Get_Activity_Detail($r['ActyID']);
				echo strip_tags($Activity->get_snippet($Activity->textarea, 20)); ?>...  </small></span>



	</td>
	
	<td width="100"><span style="color:#363636;"><small><?php echo date('M-d',strtotime($Activity->ActyPostDate)); ?>
    <span class='hover' id='demo-tooltip-above' data-jbox-content="<?php echo date('H:i',strtotime($Activity->ActyPostDate)); ?>">  <i class="fa fa-clock-o" aria-hidden="true"></i></span></small></span>
    </td>

	<td width="25"><p class="has-text-centered">
	<?php switch($Activity->CategoryID) 
	{
        case 1:
          echo "<span class='hover' id='demo-tooltip-above' data-jbox-content=".$ActyDetails->Get_Category_Name($Activity->CategoryID)."><i style='color:#028090' class='fa fa-handshake-o fa-lg' aria-hidden='true'></i></span>";
        break; 
        case 2:
          echo "<span class='hover' id='demo-tooltip-above' data-jbox-content=".$ActyDetails->Get_Category_Name($Activity->CategoryID)."><i style='color:#028090' class='fa fa-eraser fa-lg' aria-hidden='true'></i></span>";
        break;
        case 3:
          echo "<span class='hover' id='demo-tooltip-above' data-jbox-content=".$ActyDetails->Get_Category_Name($Activity->CategoryID)."><i style='color:#028090' class='fa fa-sliders fa-lg' aria-hidden='true'></i></span>";
        break;
         case 4:
          echo "<span class='hover' id='demo-tooltip-above' data-jbox-content=".$ActyDetails->Get_Category_Name($Activity->CategoryID)."><i style='color:#028090' class='fa fa-rocket fa-lg' aria-hidden='true'></i></span>";
        break;
         case 5:
          echo "<span class='hover' id='demo-tooltip-above' data-jbox-content=".$ActyDetails->Get_Category_Name($Activity->CategoryID)."><i style='color:#028090' class='fa fa-shield fa-lg' aria-hidden='true'></i></span>";
        break;
    }  
    ?>

    </p>
	</td>
	<td width="25"><p class="has-text-centered">
	  <?php switch($Activity->SeverityID) 
	      {
	        case 0:
	          echo "<i style='color:#81D742' class='fa fa-thermometer-0 fa-lg' aria-hidden='true'></i>";
	        break; 
	        case 1:
	          echo "<i style='color:#FCC02B' class='fa fa-thermometer-2 fa-lg' aria-hidden='true'></i>";
	        break;
	        case 2:
	          echo "<i style='color:#EB1C23' class='fa fa-thermometer fa-lg' aria-hidden='true'></i>";
	        break;
	      }  

	      //$ActyDetails->Get_Severity_Name($row['SeverityID']); //severity name

	      ?>
	  </p>
</td>

</tr>


<?php } ?>

</table>
</div>
</div>