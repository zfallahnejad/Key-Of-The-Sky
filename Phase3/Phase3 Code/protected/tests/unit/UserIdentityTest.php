
ob_start();

<?php


class UserIdentityTest extends CTestCase{
	
	
	
	public $fixtures = array( 
			'mosqueculturalliablees'=>':mosqueculturalliablee',
			'parents'=>':parent',
			'schools'=>':school',
			);
			
				
	
		
	public function setUp() 
		{
			parent::setUp();
			
            $mosqueculturalliablee = $this->mosqueculturalliablees['sample1'];
}
			
				
	public function testAutenticate()
        {
                $mockSession = $this->getMock('CHttpSession', array('regenerateID'));
				Yii::app()->setComponent('session', $mockSession);
				
				
				
				$command=Yii::app()->db->createCommand()
  				->select('mosqueculturalliablee.email,',
				'mosqueculturalliablee.password,',
   				'parent.email,','parent.password,','school.email,','school.password,')
    			->from(array('mosqueculturalliablee','parent','school'))
     			->queryAll();
			
				print_r ($command);
				foreach($command as $row){
					
					
					$identity = new UserIdentity($row['email'],$row['password']);
				
                	$identity->authenticate();
                	Yii::app()->user->login($identity);
                
                	$this->checkUser();
					$this->assertEquals(Yii::app()->user->name,$row['email']);
                
                	Yii::app()->user->logout();  echo "logout()";
					
					Yii::app()->user->clearStates();

                	$this->checkUser();
					
					$_SESSION = array();
				}
                
				                               
        }

        private function checkUser()
        {
                echo "\n\nStatus of current user:\n";
                echo "--------------------------\n";
                echo "User ID: ".Yii::app()->user->getId()."\n";
                echo "User Name: ".Yii::app()->user->name."\n";
                if (Yii::app()->user->isGuest)
                        echo "There is NO user logged in.\n\n";
                else 
                        echo "The user is logged in.\n\n";
        }
}
?>