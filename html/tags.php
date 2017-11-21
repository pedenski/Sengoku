<?php 

include_once('../lib/tags.class.php');
include_once('../lib/users.class.php');


$tags = new Tags();
$users = new Users();

$a = $tags->Count_Top($limit = 10);
print_r($a);


$tags->UserLists = $users->Get_User_Listing();
$tags->TagLists = $a;

echo "<hr>";
$tags->Compare_Array();

print_r($tags->TagLists);
echo "<hr>";
print_r($tags->UserLists);
//styles
include_once('index_header.php');
?>

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


</body>
</html>