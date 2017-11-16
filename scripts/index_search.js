$(document).ready(function(){

 load_data();
 function load_data(query) {
  $.ajax({
   url:"util/search.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
  //  $('table#topics').prepend($(data)).fadeIn('slow');
   $('#result').html(data);

   }
  });
 }
 
 $('#search_text').keyup(function() {
  var search = $(this).val();
  if(search != '') {
   load_data(search);
  $('table#topics').hide();
  } else {
   $('table#topics').show(); 
   load_data();

  }
 });
});