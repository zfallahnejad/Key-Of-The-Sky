<?php
/* @var $this ParentclassController */
/* @var $data parentclass */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('parentCode')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->parentCode), array('view', 'id'=>$data->parentCode)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parentName')); ?>:</b>
	<?php echo CHtml::encode($data->parentName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parentFamily')); ?>:</b>
	<?php echo CHtml::encode($data->parentFamily); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('homePhone')); ?>:</b>
	<?php echo CHtml::encode($data->homePhone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mobileNum')); ?>:</b>
	<?php echo CHtml::encode($data->mobileNum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />


</div>