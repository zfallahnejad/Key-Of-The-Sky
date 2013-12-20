<?php
/* @var $this CommentController */
/* @var $data comment */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('commentId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->commentId), array('view', 'id'=>$data->commentId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SenderName')); ?>:</b>
	<?php echo CHtml::encode($data->SenderName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SenderMail')); ?>:</b>
	<?php echo CHtml::encode($data->SenderMail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ReceiverMail')); ?>:</b>
	<?php echo CHtml::encode($data->ReceiverMail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Category')); ?>:</b>
	<?php echo CHtml::encode($data->Category); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Subject')); ?>:</b>
	<?php echo CHtml::encode($data->Subject); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Body')); ?>:</b>
	<?php echo CHtml::encode($data->Body); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
	<?php echo CHtml::encode($data->Status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SendDate')); ?>:</b>
	<?php echo CHtml::encode($data->SendDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SendTime')); ?>:</b>
	<?php echo CHtml::encode($data->SendTime); ?>
	<br />

	*/ ?>

</div>