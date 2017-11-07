<?php 
include_once('database.class.php');

class Tags  {

	private $conn;
	
	public $Acty_LastID;
	public $UserLists;
	public $TagLists;
	public $Tagss;
	public $FormTags;

	public function retfrom()
	{
		return $this->FormTags;
	}

	public function __construct()
	{
		$db = new Database();
		$this->conn = $db->getConn();
	}


	public function Insert_Tags()
	{
		

		$q = "INSERT INTO tags SET 
		TagName = :TagName";

		$sql = $this->conn->prepare($q);
		
		//foreach entry of tags in DB, get its lastID, and insert it to TagMap Table then execute
		foreach($this->FormTags as $k => &$v ) 
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
			  TagID  = :TagID";
		$sql = $this->conn->prepare($q);

		$sql->bindValue(":ActyID", $this->Acty_LastID);
		$sql->bindValue(":TagID",$this->LastTagID);
		$sql->execute();
	}

	/*
	 * SELECT QUERIES
	 */

	public function Get_Tags($ActyID) 
	{
		$q = "SELECT tags.TagName, tags.TagID FROM tags
			  INNER JOIN tag_map ON tags.TagID = tag_map.TagID 
			  WHERE tag_map.ActyID = ?";
		$sql = $this->conn->prepare($q);
		$sql->bindParam(1, $ActyID);	  	
		$sql->execute();
		$this->TagLists = $sql->fetchALL(PDO::FETCH_ASSOC);
		
	}		


	
	public function Compare_Array()
	/* -- Issue with Comparing Arrays --
	 * array_diff & array_intersect doesnt work on 2 dimensionsal arrays
	 * @param TagLists & @param UserLists must be converted to 1D by using foreach loop.
	 * Once converted, use array_diff & array_intersect accordingly
	 */
	{
		$t = array(); //tags
		$u = array(); //users

	 	foreach($this->TagLists as $tagval)
        {
        	$t[] = $tagval['TagName'];
	         
	        foreach($this->UserLists as $userval)
	        {
	        	$u[] = $userval['UserName'];
	        }
        }

        $this->TagLists = array_diff($t, $u);
        $this->UserLists = array_intersect($t, $u);

	}







	/* DELETE */
	public function Delete_Tags($arrTags)
	{
		$q = "DELETE FROM tags WHERE TagID = ?";
		$sql = $this->conn->prepare($q);

		foreach($arrTags as $tags)
		{
			$sql->bindParam(1, $tags['TagID']);
			$sql->execute();
		}
		return "deleted";
	}


	public function Delete_TagMap($ActyID)
	{
		$q = "DELETE FROM tag_map WHERE ActyID = ?";
		$sql = $this->conn->prepare($q);
		$sql->bindParam(1, $ActyID);
		$sql->execute();
		
	}

	public function ret()
	{
		return $this->UserList;
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