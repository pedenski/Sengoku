<?php 

class Validator {

	public function ifEmpty()
	{
		$required = array('title','severity','category','area','acty_date','textarea','tags');
		foreach($required as $key)
		{
			if(empty($_POST[$key]))
			{
				return true;
			}
		}
	}





}




 ?>