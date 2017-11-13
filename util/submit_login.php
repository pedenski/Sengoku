<?php
session_start();

if(isset($_POST['submit'])) 
{
	include_once('../lib/users.class.php');
	$Users = new Users();

	 $username = htmlspecialchars($_POST['username']);
	 $password  = htmlspecialchars($_POST['password']);
	

	if($UserID = $Users->Login($username, $password))
	{
		$UserArr = $Users->GetUserData();
		//print_r($UserArr);
		//echo $UserArr['UserName'];
			//echo $_SESSION['SESSNAME'];
		header('location: ../index.php');

	}

	echo "Invalid User";
	


	




}//end isset
?>
