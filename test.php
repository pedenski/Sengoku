<?php
$page = isset($_GET['page']) ? $_GET['page'] : 1;

$page_title = "Sengoku";

include_once('lib/database.class.php');
include_once('lib/activity.class.php');
include_once('lib/tags.class.php');
include_once('lib/users.class.php');
include_once('mods/pagination/pagination.php');
include_once('lib/actydetails.class.php');

$db = new Database();
$Activity = new Activity($db);
$Tags = new Tags($db);
$Users = new Users($db);
$ActyDetails = new ActyDetails();

$max = 12; //max items per page
$maxNum  = 15; //max number per page
$total = $Activity->CountRows_Titles(); //count all rows
$nav = new Pagination($max, $total, $page, $maxNum);

//styles
include_once('html/index_header.php');
include_once('html/navbar.php'); 

?>


 <div class="container">

     <input class="input" type="text" name="search_text" id="search_text" placeholder="Search by Title">

   <div id="result"></div>
</div>


<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"util/search.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>

<?php include_once('html/index_footer.php'); ?>