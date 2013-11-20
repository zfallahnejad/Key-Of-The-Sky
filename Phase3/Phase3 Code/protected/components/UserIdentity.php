<?php
/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{	
	private $_id;
	public function authenticate()
	{		
		$connection=Yii::app()->db;
		$connection->active=TRUE;
		$connect = mysql_connect("localhost","root","") or die("not connecting");
		mysql_select_db("skykeey",$connect) or die("no db :'(");
		$find1 =mysql_query("SELECT Count(*) FROM `mosqueculturalliablee` WHERE `email` ='$this->username'",$connect);
		$count1=mysql_fetch_row($find1);
		$find2 =mysql_query("SELECT Count(*) FROM `school` WHERE `email` ='$this->username'",$connect);
		$count2=mysql_fetch_row($find2);
		$find3 =mysql_query("SELECT Count(*) FROM `parent` WHERE `email` ='$this->username'",$connect);
		$count3=mysql_fetch_row($find3);
		if ($count1[0]==1){
			$sql ="SELECT * FROM `mosqueculturalliablee` WHERE `email` ='$this->username'";
			$query = mysql_query($sql,$connect);
			if ($query === FALSE) {
        		trigger_error(mysql_error());
    		}
			$numrows = mysql_num_rows($query);
			if ($numrows!=0)
			{
				//while loop
				while ($row = mysql_fetch_assoc($query)){
					$email = $row["email"];
					$password = $row["password"];
				}
				$TempP = sha1($this->password);
				 
				if($password === $TempP){
					$this->errorCode=self::ERROR_NONE;
					// Store the role in a session:
					$this->setState('role', 'mosqueculturalliablee');
					$this->_id = 1;
				}
				else{
					$this->errorCode=self::ERROR_PASSWORD_INVALID;
				}
			}
			else{
				$this->errorCode=self::ERROR_USERNAME_INVALID;
			}
		}
		elseif($count2[0]==1)
		{	
			$sql ="SELECT * FROM `school` WHERE `email` ='$this->username'";
		
			$query = mysql_query($sql,$connect);
			if ($query === FALSE) {
        		trigger_error(mysql_error());
    		}
			$numrows = mysql_num_rows($query);
			if ($numrows!=0)
			{
				//while loop
				while ($row = mysql_fetch_assoc($query)){
					$email = $row["email"];
					$password = $row["password"];
				}
				$TempP = sha1($this->password);
				 
				if($password === $TempP){
					$this->errorCode=self::ERROR_NONE;
					// Store the role in a session:
		    		$this->setState('role', 'school');
					$this->_id = 2;
				}
				else{
					$this->errorCode=self::ERROR_PASSWORD_INVALID;
				}
			}
			else{
				$this->errorCode=self::ERROR_USERNAME_INVALID;
			}
		}
		elseif($count3[0]==1)
		{	
			$sql ="SELECT * FROM `parent` WHERE `email` ='$this->username'";
		
			$query = mysql_query($sql,$connect);
			if ($query === FALSE) {
        		trigger_error(mysql_error());
    		}
			$numrows = mysql_num_rows($query);
			if ($numrows!=0)
			{
				//while loop
				while ($row = mysql_fetch_assoc($query)){
					$email = $row["email"];
					$password = $row["password"];
				}
				$TempP = sha1($this->password);
				 
				if($password === $TempP){
					$this->errorCode=self::ERROR_NONE;
					// Store the role in a session:
		    		$this->setState('role', 'parent');
					$this->_id = 3;
				}
				else{
					$this->errorCode=self::ERROR_PASSWORD_INVALID;
				}
			}
			else{
				$this->errorCode=self::ERROR_USERNAME_INVALID;
			}
		}
		mysql_close($connect);			  
		return !$this->errorCode;					
	}
	public function getId()
	{
		return $this->_id;
	}
}