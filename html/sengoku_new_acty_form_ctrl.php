  <!-- CONTROLS / WIDGET -->
    <table class="table is-fullwidth"">
     <!--  <tr>
      <th>Activity Start Date</th>
        <td colspan="2">
        <div class="field">
        <input type="text" class="input" name="acty_date" id="datetimepicker7" placeholder="02/04/88">
        </div>
      </td>
      
      </tr> -->




      <tr>
        <th>Category</th>
         <!-- CATEGORY -->
        <td  colspan="2">
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

    <td colspan="2">  
      <div>
        <input type="text" id="range" value="" name="range" />
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