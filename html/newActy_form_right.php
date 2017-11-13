<!-- CONTROLS / WIDGET -->
<div style="padding:5px;border-radius:5px;background: #f4f4f4"> 
<table style="background:#F4F4F4;" class="table borderless is-fullwidth"">

<tr> <!--/ DATE TIME PICKER /-->
  <td colspan="2">
    <p class="control has-icons-left has-icons-right">
      <input type="text" class="input is-primary"  name="acty_date" id="datetimepicker7" placeholder="Activity Start Date">
      <span class="icon is-small is-left">
      <i class="fa fa-calendar"></i>
      </span>
    </p>
    <div class="field">
    </div>
  </td>
</tr> 


<tr> <!--/ CATEGORY /-->
  <td  colspan="2">
    <div class="field">
      <div class="control has-icons-left">
        <div class="select is-fullwidth is-primary">
          <select id="category" name="category">
            <option>Category</option>
              <?php
              $CategoryList = $ActyDetails->Get_Category_List();
              foreach($CategoryList as $row) { ?>
              <option value="<?php echo $row['CategoryID']; ?>"><?php echo $row['CategoryName']; ?></option>
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

<tr> <!--/ AREA /-->
  <td  colspan="2">
    <div class="field">
      <div class="control has-icons-left">
        <div class="select is-fullwidth is-primary">
          <select id="area" name="area">
          <option>Location</option
            <?php
            $SeverityList = $ActyDetails->Get_Area_List();
            foreach($SeverityList as $row) { ?>
            <option value="<?php echo $row['AreaID']; ?>"><?php echo  $row['AreaName']; ?></option>
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

<tr> <!--/ SEVERITY RANGER /-->
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
</div>