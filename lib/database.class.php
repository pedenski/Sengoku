<?php

class Database {
	//creds
	private $dbn = 'mysql:dbname=sengoku;host=localhost;';
	private $user = 'root';
	private $password = '';

	public $conn;

 
    // get the database connection
    public function getConn(){
        $this->conn = null;
        try{
 		  $this->conn = new PDO($this->dbn, $this->user, $this->password);
          $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
          echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}



/*  Sengoku table
        activity_titles
            ActyID (int)    
            ActyTitle (varchar 100)
            UserID (int)
            SeverityID (int)
            CategoryID (int)
            ActyStartDate (timestamp)
        activity_details
            ActyID (int)
            DetailID (int)
            DetailText (text)
        activity_severity
            SeverityID (int)
            SeverityName (varchar)
            UserID (int)
            Created (timestamp)        
        users
            UserID (int)
            UserName (varchar)
            Password (varchar)
            Created (timestamp)
            LastLogin (timestamp)



















*/



?>
