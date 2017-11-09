


 <script
  src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"
  integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk="
  crossorigin="anonymous"></script>


  <!--TAG EDITOR JS -->   
 <script src="../sengoku/style/js/jquery.caret.min.js"></script>
 <script src="../sengoku/style/js/jquery.tag-editor.js"></script>




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

<script>

$("span.log").click(function() {
  var a = $(this).data('logid');
  $("input#issuenum").val(a);
});


</script>

<!-- SLIDER SEVERITY -->



<!-- <script>
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
</script> -->



 <!--SUBMIT AJAX FORM DAT  --> 
  <script>
    $(document).ready(function() 
    {
      
      
       $('#submit').click(function(event) {
          var formData = 
            {
              'issue'         : $("input#issue").val(),
              'pageid'        : $("input#pageid[name=pageid]").val(),
              'acty_date'     : $("input[name=acty_date]").val(), 
              'severity'      : $("select#severity option:selected" ).prop("value"),
              'textarea'      : $("textarea#textarea[name=textarea]").val()
            };
               
            // process the form
            $.ajax
            ({
                type        : 'POST', 
                url         : '_submit_log.php',
                data        : formData
            })
                .done(function(data)
              {
                 console.log(data); 
                 $('table#logtable').append($(data)).fadeIn('slow');
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





  </body>
</html>