<script
  src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"
  integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk="
  crossorigin="anonymous">
</script>

<!--TAG EDITOR JS -->   
<script src="mods/TagEditor/jquery.caret.min.js"></script>
<script src="mods/TagEditor/jquery.tag-editor.js"></script>

<script>
  <?php $Tags->Get_Tags($ActyID); ?>
  
  $('#demo3').tagEditor({ 

  initialTags: [
  <?php 
  $EditTags = array();
  foreach($Tags->TagLists as $tags) 
  { 
    $EditTags[] = "'".$tags['TagName']."'";
  }
  echo implode(",",$EditTags);
  ?>
  ], 
    placeholder: 'Enter tags ...' 
  });
  $('#remove_all_tags').click(function() {
    var tags = $('#demo3').tagEditor('getTags')[0].tags;
    for (i=0;i<tags.length;i++){ $('#demo3').tagEditor('removeTag', tags[i]); }
  });  
</script> 

 <!--DATETIME PICKER -->
<script src="mods/DatePicker/datetimepicker.full.js"></script>
<script>
    var logic = function( currentDateTime ){
        if (currentDateTime && currentDateTime.getDay() == 6){
            this.setOptions({
                minTime:'11:00'
            });
        }else
            this.setOptions({
                minTime:'8:00'
            });
    };
    $('#datetimepicker7').datetimepicker({
        onChangeDateTime:logic,
        onShow:logic
    });
</script>

<!-- SLIDER SEVERITY -->
<script src="mods/RangeSlider/ion.rangeSlider.js"></script>

<script>
$(document).ready(function() {
    var slider = $("#range").data("ionRangeSlider"); //call rangeslider

    $('.buttons').on('click', '.button', function() {
      if($(this).attr('name') == "Low") {
         $(this).addClass('is-selected is-light').siblings().attr('class','button is-small');
         slider.update({from:0});
      } if($(this).attr('name') == "Medium") {
        $(this).addClass('is-selected is-light').siblings().attr('class','button is-small');
          slider.update({from:1});
      } if($(this).attr('name') == "High") {
        $(this).addClass('is-selected is-light').siblings().attr('class','button is-small');
         slider.update({from:2});
      }
   });
});
</script>

<!--SUBMIT AJAX FORM DAT  --> 
<script>
  $(document).ready(function()  {
    // process the form
    var $SeverityValue = "2"; //default value
  
    $(function () 
    {
        var $range = $("#range");
      
        $("#range").ionRangeSlider(
        {
          grid: true,
          grid_snap: true,
          from:<?php echo $Activity->SeverityID; ?>,
          values: ["Low", "Medium", "High" ]
        });

        $range.on("change", function () 
        {
          value = $range.prop("value");
          if(value == "Low") { $SeverityValue = "1"; }
          if(value == "Medium") { $SeverityValue = "2"; }
          if(value == "High") { $SeverityValue = "3"; }
          //console.log("Value: " + $SeverityValue + "-" + value);
        });
      });
    });
</script>
<script src="scripts/newActy_clearform.js"></script>
  </body>
</html>