<?php 


class Tags  {

	private $conn;
	private $Tags;
	public $Acty_LastID;

	public function __construct($db)
	{
		$this->conn = $db->getConn();
		$this->Tags = $_POST['tags'];
	}

	public function Insert_Tags()
	{
		$q = "INSERT INTO tags SET 
		TagName = :TagName";

		$sql = $this->conn->prepare($q);
		
		//foreach entry of tags in DB, get its lastID, and insert it to TagMap Table then execute
		foreach($this->Tags as $k => &$v ) 
		{
			$sql->bindValue(":TagName",$v, PDO::PARAM_STR);
			$sql->execute();
			$this->LastTagID =  $this->conn->lastInsertID();  //get tag last id
			$this->Tag_Mapping(); //execute TagMapping
		}

	}

	public function Tag_Mapping()
	{		
		$q = "INSERT INTO tag_map SET 
			  ActyID = :ActyID,
			  TagID = :TagID";
		$sql = $this->conn->prepare($q);

		$sql->bindValue(":ActyID", $this->Acty_LastID);
		$sql->bindValue(":TagID",$this->LastTagID);
		$sql->execute();
	}

	
	
}





	// public function Have_Users($UserList)
	// {

	// 	foreach($this->Tags as $tag => $tagval)	
	// 	{
			
	// 		foreach($UserList as $user)
	// 		{
	// 			if($tagval == $user['UserName'])
				
	// 			{
	// 				unset($this->Tags[$tag]); //remove names
	// 				$this->Insert_Tags();

	// 			}

	// 		}
			
	// 	}


	// }



 ?>