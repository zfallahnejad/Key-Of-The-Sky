<?php
/* @var $this SchoolController */
/* @var $data school */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('schoolId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->schoolId), array('view', 'id'=>$data->schoolId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('schoolName')); ?>:</b>
	<?php echo CHtml::encode($data->schoolName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('schoolPhone')); ?>:</b>
	<?php echo CHtml::encode($data->schoolPhone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('schoolAddress')); ?>:</b>
	<?php echo CHtml::encode($data->schoolAddress); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('teacherName')); ?>:</b>
	<?php echo CHtml::encode($data->teacherName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('teacherFamily')); ?>:</b>
	<?php echo CHtml::encode($data->teacherFamily); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('teacherPhone')); ?>:</b>
	<?php echo CHtml::encode($data->teacherPhone); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	*/ ?>

</div>