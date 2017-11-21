<?php 
session_start();
$page_title = "Tags";
if(isset($_GET['tagname'])) {
	$tagname = $_GET['tagname'];
}




include_once('lib/tags.class.php');
include_once('lib/users.class.php');
$tags = new Tags();
$Users = new Users();




include_once('html/tags_header.php');
include_once('html/navbar.php');
?>

<!-- HERO -->
<section class="hero is-primary">
<div class="hero-body">
<div class="container is-fluid">
  <h1 class="title">
  <?php echo $page_title;?>
  </h1>
  <h2 class="subtitle">
    Activity Tracker Dashboard
  </h2>
</div>
</div>
</section>


<?php




$a = $tags->Count_Top($limit = 10);
//print_r($a);


$tags->UserLists = $Users->Get_User_Listing();
$tags->TagLists = $a;

echo "<hr>";
$tags->Compare_Array();

print_r($tags->TagLists);
echo "<hr>";
print_r($tags->UserLists);
//styles

?>
<div class="container">


<?php 

$a = $tags->Get_Title_From_Tags($tagname);
?>
<table class="table is-bordered">
<?php
foreach($a as $r) { ?>
<tr>
	<td><?php echo $r['ActyID']; ?></td>
	<td><a href="page.php?id=<?php echo $r['ActyID']; ?>"> Link </a></td>
</tr>


<?php } ?>

</table>

<table class="table is-bordered">
<thead>
	<th>Tags</th>
	<th>Count</th>

</thead>


<tr>
	<td>  </td>
	<td>  </td>
</tr>

</table>

</div> <!-- /container -->

</body>
</html>