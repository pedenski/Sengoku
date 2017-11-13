$(document).ready(function() 
//All that requires .ready
{
/* SEVERITY 
 * Prepare severity value for form submission. 
 * Convert string to numeric value (as activity_severity table req)
 */
var $SeverityValue = "2"; //default value
$(function () {
  var $range = $("#range");
  $("#range").ionRangeSlider(
  {
    grid: true,
    grid_snap: true,
    from: 1,
    values: ["Low", "Medium", "High" ]
  });

  $range.on("change", function () {
    value = $range.prop("value");
    if(value == "Low")    { $SeverityValue = "0"; }
    if(value == "Medium") { $SeverityValue = "1"; }
    if(value == "High")   { $SeverityValue = "2"; }
    console.log("Value: " + $SeverityValue + "-" + value);
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
    //'severity'      : $("#range").prop("value"),
    'severity'      : $SeverityValue,
    'textarea'      : $("textarea#textarea[name=textarea]").val()
  };
     
  // process the form
  $.ajax
  ({
      type        : 'POST', 
      url         : 'util/submit_newActy.php',
      data        : formData
  })
  .done(function(data) 
  {   
       var data = $.parseJSON(data);
           new jBox('Notice', 
           {
              theme: 'NoticeFancy',
              attributes: 
              {
                x: 'left',
                y: 'bottom'
              },
              color: getColor(),
              title: getZ(data),
              maxWidth: 600,
              audio: 'mods/jbox/Source/audio/bling2',
              volume: 80,
              autoClose: Math.random() * 8000 + 2000,
              animation: {open: 'slide:bottom', close: 'slide:left'},
              delayOnHover: true,
              showCountdown: true,
              closeButton: true
          });

    if(data['success'] == true ) {
      location.href = "page.php?id="+data['ActyID'];  
    } //if
  }); //.done
//event.preventDefault();
});
});