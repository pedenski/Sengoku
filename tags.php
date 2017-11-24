<?php 
session_start();
$page_title = "Tags";
$page = isset($_GET['page']) ? $_GET['page'] : 1;
if(isset($_GET['tagname'])) {
  $isset = 1;
	$tagname = $_GET['tagname'];

}




include_once('lib/tags.class.php');
include_once('lib/users.class.php');
include_once('lib/activity.class.php');
include_once('mods/pagination/pagination.php');
include_once('lib/actydetails.class.php');

$tags = new Tags();
$Users = new Users();
$Activity = new Activity();
$ActyDetails = new ActyDetails();

//pagination
$max = 15; //max items per page
$maxNum  = 5; //max number per page
$total = $Activity->CountRows_Titles(); //count all rows
$nav = new Pagination($max, $total, $page, $maxNum);

include_once('html/tags_header.php');
include_once('html/navbar.php');
?>

<!-- HERO -->
<section class="hero is-warning">
<div class="hero-body">
<div class="container">
  <h1 class="title">

  <?php if(isset($_GET['tagname'])) { echo ucfirst($tagname); } else { echo $page_title; } ?>
  </h1>
  <h2 class="subtitle">
    Tag listing
  </h2>
</div>
</div>
</section>


<?php




$taglists = $tags->Count_Top($limit = 20);



$tags->UserLists = $Users->Get_User_Listing();
$tags->TagLists = $taglists;

// echo "<hr>";
$tags->Compare_Array();

// print_r($tags->TagLists);
// echo "<hr>";
//print_r($tags->UserLists);
//styles

?>

<div class="container">
<div style="margin-bottom:25px"></div>


<div class="columns">

<div class="column"> <!-- TAGS --> 
  <div style="padding:20px; border-radius:5px; background:#f4f4f4;">
    <div class="content">
      <h4 style="margin-bottom:10px;">Top 20 Tags</h4>

      <div class="tags">
      <?php foreach($taglists as $t) { ?>
            <span class="tag is-danger"> <a href="tags.php?tagname=<?php echo $t['TagName']; ?>"><?php echo $t['TagName']; ?></a></span>
      <?php } ?>
      </div> <!--/tags -->
    </div> <!--/content-->
  </div> <!--/notification -->
</div> <!--/tag column-->

<div class="column"> <!-- USER TAGS --> 
  <div style="height:100%;padding:20px; border-radius:5px; background:#f4f4f4;">
    <div class="content">
      <h4 style="margin-bottom:10px;">User Tags</h4>

      <div class="tags">
      <?php foreach($tags->UserLists as $user) { ?>
            <span class="tag is-info"><a href="tags.php?tagname=<?php echo $user; ?>"><?php echo $user; ?></a></span>
      <?php } ?>
      </div> <!--/tags -->
    </div> <!--/content-->
  </div> <!--/notification -->
</div> <!--/tag column-->


</div> <!--/columns-->

<hr>

<?php if(isset($_GET['tagname'])) { ?>
 <div class="columns">
      <div class="column is-half">
       <!--    <div class="control has-icons-left has-icons-right"> -->
        <!--   <input class="input" type="text" name="search_text" id="search_text" placeholder="Search By Title"> -->
      <!--     <span class="icon is-small is-left">
          <i class="fa fa-search"></i>
          </span> -->
    <!--       </div> -->
        </td>
      </div>
    <div class="column is-half ">
      <div class="pagi is-pulled-right">
      <?php echo $nav->first(' <a href="tags.php?tagname='.$tagname.'">First</a>  ');
            echo $nav->numbers(' <a href="tags.php?tagname='.$tagname.'&page={nr}">{nr}</a>  ', '  <b>{nr}</b>  ');
            echo $nav->next(' <a href="tags.php?tagname='.$tagname.'&page={nr}">Next</a>  '); ?>
      </div> 
    </div>
  </div>
 <?php } ?>
  



<?php 
if(isset($_GET['tagname'])) {   
  $tags = $tags->Get_Title_From_Tags($tagname, $nav, $max);
  include_once('html/tags_table.php');
} ?>




</div> <!-- /container -->
<?php include_once('html/tags_footer.php'); ?>

