


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

<script type="text/javascript">
var actyid = <?php echo json_encode($ActyID); ?>;
</script>

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
  * INIT CHARTJS
  */
  $.ajax({
    url: "html/page_graph_entries.php",
    method: "GET",
    data: {actyid: actyid},
    success: function(data) 
    {

      $('#loading_icon').hide();
      var parsed = $.parseJSON(data);
      a = parsed.days;
      b = parsed.arr;

      console.log(b); 
  
      var data = {
        labels : a,
        datasets : [
          { 
            label : false,
            data : b,
            borderWidth : 1,
            backgroundColor : "rgba(233, 62, 62, 0.45)",
            borderColor : "#FF3860",
            pointBackgroundColor : "#411515",
            fill: 'false',
            lineTension : 0,
            pointRadius : 0,
          }
          
        ]
      };

      var ctx = $("#line-chartcanvas");
      

      var options = {

        title : {
          display : true,
          position : "top",
          text : "2017 Top tags",
          fontSize : 14,
          fontColor : "#00C4A7"
        },
        legend : {
          display : true,
          display: false, //disable label
          position : "bottom"
        },
        scales : {
          yAxes : [{
            ticks : {
              min : 0
            }
          }]
        }
      };

      var chart = new Chart( ctx, {
        type : "line",
        data : data,
        options : options
      });

    
    },
  });
   

 /* 
  * AJAX POST FOR FORM SUBMISSION
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
     updateChart(); //activate function 
  });
  event.preventDefault();
  });

function updateChart() {
 /* 
  * Update chart on log submission
  */
  $.ajax({
    url: "html/page_graph_entries.php",
    method: "GET",
    data: {actyid: actyid},
    success: function(data) 
    {

      $('#loading_icon').hide();
      var parsed = $.parseJSON(data);
      a = parsed.days;
      b = parsed.arr;

      console.log(b); 
     
      var data = {
        labels : a,
        datasets : [
          { 
            label : false,
            data : b,
            borderWidth : 1,
            backgroundColor : "rgba(233, 62, 62, 0.45)",
            borderColor : "#FF3860",
            pointBackgroundColor : "#411515",
            fill: 'false',
            lineTension : 0,
            pointRadius : 0,
          }
          
        ]
      };

      var ctx = $("#line-chartcanvas");
  
      var options = {

        title : {
          display : true,
          position : "top",
          text : "2017 Top tags",
          fontSize : 14,
          fontColor : "#00C4A7"
        },
        legend : {
          display : true,
          display: false, //disable label
          position : "bottom"
        },
        scales : {
          yAxes : [{
            ticks : {
              min : 0
            }
          }]
        }
      };

      var chart = new Chart( ctx, {
        type : "line",
        data : data,
        options : options
      });

    
    },

  
  });

}


}); //$(document).ready(function()
</script>




 <script src="scripts/page_script_graphjs.js"></script>
</body>
</html>