   <div class="tinymce-bg" style="padding:5px;border-radius:5px;background: #f4f4f4"> 
    <div class="tinymce-noti"></div>
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
            <select id="severity" name="severity">
              <option>Severity</option>
            <?php

            $SeverityList = $ActyDetails->Get_Severity_List();
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
        <a type="submit"   id="submit" class="button is-fullwidth is-danger ">Submit</a>
    </td>
  </tr>
  </table>
</div>
</div>