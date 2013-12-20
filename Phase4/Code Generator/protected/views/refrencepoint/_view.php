<?php
/* @var $this RefrencepointController */
/* @var $data refrencepoint */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('actId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->actId), array('view', 'id'=>$data->actId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('actPoint')); ?>:</b>
	<?php echo CHtml::encode($data->actPoint); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('actTopic')); ?>:</b>
	<?php echo CHtml::encode($data->actTopic); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userID')); ?>:</b>
	<?php echo CHtml::encode($data->userID); ?>
	<br />


</div>