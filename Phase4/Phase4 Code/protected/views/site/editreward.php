		<h2 class="header">لیست جایزه ها<span class="header-line"></span></h2>
		<div id='container' style="direction:rtl" align="right">
		<?php
		$this->pageTitle=Yii::app()->name . ' - edit reward';
			$this->breadcrumbs=array(
		'Editreward', );
	$mail=Yii::app()->user->name;
	$mosqueId = Yii::app()->db->createCommand()->select('Id')->from('mosqueculturalliablee')->where('email=:mail', array(':mail'=>$mail))->queryScalar();
	$mosqueName = Yii::app()->db->createCommand()
				->select('mosqueName')
				->from('mosqueculturalliablee')
				->where('Id=:Id',array('Id'=>$mosqueId))
				->queryScalar();
	$rewards = Yii::app()->db->createCommand()
				->select('neededPoint,rewardTopic,Id')
				->from('reward')
				->where('Id=:Id',array('Id'=>$mosqueId))
				->queryAll();  
		?>
		<?php
	if(isset($_GET["delete"])){
		$connection=Yii::app()->db;
		$connection->active=TRUE;
		$sql="delete from reward WHERE (Id=:Id and rewardTopic='$_GET[code]') ";
		$command=$connection->createCommand($sql);
	$mail=Yii::app()->user->name;
	$mosqueId = Yii::app()->db->createCommand()->select('Id')->from('mosqueculturalliablee')->where('email=:mail', array(':mail'=>$mail))->queryScalar();
		$command->bindParam(":Id",$mosqueId,PDO::PARAM_STR);
		$command->execute();
		$connection->active=FALSE;
		$this->redirect('editreward');	
	} 
?>
	  	<div id="object-browser">
		<div id="items" >
			<table class="table table-striped">
				<thead>
            		<tr>
                		<th><div align="right">جایزه</div></th>
                    	<th><div align="right">امتیاز</div></th>
						<th><div align="left">تغییر امتیاز</div></th>
                    	<th><div align="left">حذف امتیاز</div></th>

                	</tr>
            	</thead>
				<tbody>
					<div id='wrapper'>
        				<div id='content'>
							<?php
								foreach($rewards as $row)
								{
									?>
									<tr id='io'>
										<td>
											<div>
            									<h4 align="right" >
													<?php echo $row['rewardTopic'];?>
												</h4>
											</div>	
										</td>
										<td>
											<div >
            									<h4 align="right">
													<?php echo $row['neededPoint'];?>
												</h4>
											</div>
										</td>
										<td>
											<div >
            									<h4 align="left">
													<a <?php echo CHtml::link('تغییر',array('site/editprize','rewardTopic'=>$row['rewardTopic']));?></a>
												</h4>
											</div>
										</td>
										<td>
											<div >
            									<h4 align="left">
													<a href="?delete&code=<?php print $row["rewardTopic"]; ?>" onclick="javascript: return confirm('Are You Sure?');"  >حذف</a>
												</h4>
											</div>
										</td>
									</tr>
									<?php
								}
							?>
						</div>
					</div>
				</tbody>
			</table>
		</div>
	</div>
	</div>