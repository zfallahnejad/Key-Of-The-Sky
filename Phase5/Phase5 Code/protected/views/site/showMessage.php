<?php
	$this->pageTitle=Yii::app()->name . ' - Show Message';
	$this->breadcrumbs=array(
		'Show Message', );
	$commentId = (int) $_GET['commentId'];
	if (!($commentId>0)){
			$this->redirect(array('/site'));

		}
	$body = Yii::app()->db->createCommand()
				->select('Body,Subject,SenderName,ReceiverMail,SenderMail,Category')
				->from('comment')
				->where('commentId=:commentId', array(':commentId'=>$commentId))
				->queryAll();
	
	$userId = Yii::app()->user->getId();
	$userMail =Yii::app()->user->name;
	
	
	
	
?>






<div class="form">



<?php foreach($body as $row)
{ ?>

	
	<h2 class="header"><?php echo $row['Subject'];?>
        <span class="header-line" ></span> 
      </h2>
        
	  <div class="row-fluid" align="right">
      	
          <h3>
               <p><?php echo $row['Body'];?></p>
          </h3>
        </div>
		
		
		
		
		
	
	
		<span class="header-line" ></span> 
		<?php if ($userMail == $row['ReceiverMail']): ?>
		<p><small> <?php echo 'فرستنده : ',$row['SenderName'];?></small></p>
		
		<?php elseif ($userMail == $row['SenderMail']): ?>
		<p><small> <?php echo 'گیرنده : ',$row['ReceiverMail'];?></small></p>
		
		<?php else: ?>
		<?php endif; ?>
		<p><small> <?php echo 'دسته بندی : ',$row['Category'];?></small></p>
	

	

	<div class="row buttons" align="left">
		<?php $baseUrl = Yii::app()->request->baseUrl;	
		if ($userMail == $row['ReceiverMail']): 
		echo CHtml::link('<b>بازگشت به صندوق پیام های دریافتی</b>',Yii::app()->request->urlReferrer); 
		elseif ($userMail == $row['SenderMail']): 
		echo CHtml::link('<b>بازگشت به صندوق پیام های ارسالی</b>',Yii::app()->request->urlReferrer); 
		else: 
		endif; ?>
		
		<img src="<?php echo $baseUrl;?>/img/icons/smashing/30px-39.png"  >
	</div>

<?php } ?>

</div>

