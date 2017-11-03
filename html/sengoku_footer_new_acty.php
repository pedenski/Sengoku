


 <script
  src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"
  integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk="
  crossorigin="anonymous"></script>


  <!--TAG EDITOR JS -->   
 <script src="../sengoku/style/js/jquery.caret.min.js"></script>
 <script src="../sengoku/style/js/jquery.tag-editor.js"></script>


<script>
  
$("#showModal").click(function() {
  $(".modal").addClass("is-active");  
});

$(".modal-close").click(function() {
   $(".modal").removeClass("is-active");
});
  
</script>

<script>
  $('#demo3').tagEditor({ 
    initialTags: ['Pudge', 'Tiny'], 
    placeholder: 'Enter tags ...' 
  });
  $('#remove_all_tags').click(function() {
    var tags = $('#demo3').tagEditor('getTags')[0].tags;
    for (i=0;i<tags.length;i++){ $('#demo3').tagEditor('removeTag', tags[i]); }
  });  
 </script> 



 <!--DATETIME PICKER -->
    <script src="../sengoku/style/js/datetimepicker.full.js"></script>
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


<!-- GROUP BUTTON -->


<!-- SLIDER SEVERITY -->
<script src="../sengoku/style/js/ion.rangeSlider.js"></script>
<script>

</script>


<script>
$(document).ready(function() {
    var slider = $("#range").data("ionRangeSlider"); //call rangeslider

    $('.buttons').on('click', '.button', function() 
    {
      if($(this).attr('name') == "Low")
      {
         $(this).addClass('is-selected is-light').siblings().attr('class','button is-small');
         slider.update({from:0});
      }
     
       if($(this).attr('name') == "Medium")
      {
        $(this).addClass('is-selected is-light').siblings().attr('class','button is-small');
          slider.update({from:1});
      }
     

      if($(this).attr('name') == "High")
      {
        $(this).addClass('is-selected is-light').siblings().attr('class','button is-small');
         slider.update({from:2});
      }
   });
});
</script>



 <!--SUBMIT AJAX FORM DAT  --> 
  <script>
    $(document).ready(function() 
    {
        // process the form
          var $SeverityValue = "2"; //default value
    
      $(function () 
      {
          var $range = $("#range");
        
          $("#range").ionRangeSlider(
          {
            grid: true,
            grid_snap: true,
            from: 1,
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
      
       $('#submit').click(function(event) {
          var formData = 
            {
              'acty_date'     : $("input[name=acty_date]").val(), 
              'title'         : $("input[name=title]").val(),
              'tags'          : $('#demo3').tagEditor('getTags')[0].tags,
              'category'      : $("select#category option:selected" ).prop("value"),
              'area'          : $("select#area option:selected" ).prop("value"),
              'severity'      : $("#range").prop("value"),
              //'severity'      : $SeverityValue,
              'textarea'      : $("textarea#textarea[name=textarea]").val()
            };
               
            // process the form
            $.ajax
            ({
                type        : 'POST', 
                url         : '_submit_new_acty.php',
                data        : formData
            })
                .done(function(data) 
              {
                 console.log(data); 
              });
           event.preventDefault();
        });
    });
  </script>
 


<script>
$("#reset").click(function() {
  
    $(this).closest('form').find("input[type=text]").val("");
    $('#datetimepicker7') .datetimepicker('reset');
    tinyMCE.activeEditor.setContent('');
});


</script>

 <!--SUBMIT AJAX FORM DAT 
  <script>
    $(document).ready(function() {
        // process the form
        $('#submit').click(function(event) {
                                 
            var formData = {

               'sev'     : $("#range").prop("value")
            };
               
            // process the form
            $.ajax
            ({
                type        : 'POST', 
                url         : 'parse.php',
                data        : formData
            })
              .done(function(data) 
              {
              console.log(data); 
              });
           
         // event.preventDefault();
        });
    });
  </script> --> 



  </body>
</html>