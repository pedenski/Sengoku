


<script
src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"
integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk="
crossorigin="anonymous"></script>
<!--TAG EDITOR JS -->   
<script src="mods/TagEditor/jquery.caret.min.js"></script>
<script src="mods/TagEditor/jquery.tag-editor.js"></script>
<script src="mods/ChartJS/Chart.min.js"></script>

<!--DATETIME PICKER -->
<script src="mods/DatePicker/datetimepicker.full.js"></script>
<script src="mods/DatePicker/zconfig.js"></script>

<script>
//Retrieve Content of clicked LogID then display on div.tinymce-noti
$("span.log").click(function() {
  var logid = $(this).data('logid');

  $("input#issuenum").val(logid);
  $("input#resolve").val(1);
  $("input#issue").val("0");

  var formData =   {
  'logid'         : logid
  };

  // process the form
  $.ajax
  ({
    type        : 'POST', 
    url         : 'util/get_logid.php',
    data        : formData
  })
  .done(function(data) {
    console.log(data); 
  
  $(".tinymce-noti").html(data);
  });
  event.preventDefault();
});
</script>


<script>
$(document).ready(function() {
  /* 
  * AJAX POST FOR FORM SUBMISSION
  *
  */
  $('#submit').click(function(event) {
  var formData = 
  {
    'issue'         : $("input#issue").val(),
    'issuenum'      : $("input#issuenum").val(),
    'resolve'      :  $("input#resolve").val(),
    'pageid'        : $("input#pageid[name=pageid]").val(),
    'acty_date'     : $("input[name=acty_date]").val(), 
    'severity'      : $("select#severity option:selected" ).prop("value"),
    'textarea'      : $("textarea#textarea[name=textarea]").val()
  };

  // process the form
  $.ajax
  ({
    type        : 'POST', 
    url         : 'util/submit_log.php',
    data        : formData
  })
    .done(function(data) {
     console.log(data); 
     $('table#logtable').append($(data)).fadeIn('slow'); //insert on table
  });
  event.preventDefault();
  });

 /* Chart
  * Load ChartJS on .Ready
  */
  <?php include_once('scripts/page_script_graphjs.js'); ?> 
});
</script>
</body>
</html>