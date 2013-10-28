<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	
	public function authenticate()
	{
		
					$connection=Yii::app()->db;
					$connection->active=TRUE;
					$connect = mysql_connect("localhost","root","") or die("not connecting");
					mysql_select_db("skykeey",$connect) or die("no db :'(");
					$sql ="SELECT * FROM `mosqueculturalliablee` WHERE `email` ='$this->username'";

					$query = mysql_query($sql,$connect);
					 if ($query === FALSE) {
        				trigger_error(mysql_error());
    				}
					//echo  mysql_num_rows($query);
					$numrows = mysql_num_rows($query);
					if ($numrows!=0)
					{
					//while loop
					  while ($row = mysql_fetch_assoc($query))
					  {
					   $email = $row["email"];
					   $pasword = $row["pasword"];
					  }
					 $bad = '=?UTF-8?B?'.base64_encode($this->password).'?=';
					 
					  if($pasword === $bad)
					  	{$this->errorCode=self::ERROR_NONE;}
					  else
					      {$this->errorCode=self::ERROR_PASSWORD_INVALID;}
					}
					else
					  {$this->errorCode=self::ERROR_USERNAME_INVALID;}
					  
					return !$this->errorCode;
					mysql_close($connect);
		
		
	}
}