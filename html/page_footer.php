


 <script
  src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"
  integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk="
  crossorigin="anonymous"></script>


  <!--TAG EDITOR JS -->   
 <script src="../sengoku/style/js/jquery.caret.min.js"></script>
 <script src="../sengoku/style/js/jquery.tag-editor.js"></script>
 <script src="../sengoku/style/js//Chart.min.js"></script>






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
  //GET LOG ID CONTENT 
  $("span.log").click(function() {
  var logid = $(this).data('logid');
  $("input#issuenum").val(logid);
  $("input#resolve").val(1);
  $("input#issue").val("0");
 
          var formData = 
            {
              'logid'         : logid
            };
               
            // process the form
            $.ajax
            ({
                type        : 'POST', 
                url         : 'html/_get_logid.php',
                data        : formData
            })
                .done(function(data)
              {
                 console.log(data); 
                 $(".tinymce-noti").html(data);
              });
           event.preventDefault();
 

 
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
     /* 
      * AJAX POST FOR FORM SUBMISSION
      *
      */
       $('#submit').click(function(event) {
          var formData = 
            {
              'issue'         : $("input#issue").val(),
              'issuenum'      : $("input#issuenum").val(),
              'resolve'      : $("input#resolve").val(),
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

   /* 
    * GRAPH JS
    *
    */  
    <?php include_once('../sengoku/scripts/page_script_graphjs.js'); ?> 


    });
  </script>
 <!-- CHART -- >



<script>
$("#reset").click(function() {
  
    $(this).closest('form').find("input[type=text]").val("");
    $('#datetimepicker7') .datetimepicker('reset');
    tinyMCE.activeEditor.setContent('');
});


</script>






  </body>
</html>