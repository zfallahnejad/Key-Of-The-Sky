<?php
/* @var $this StudentController */
/* @var $data student */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('stCode')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->stCode), array('view', 'id'=>$data->stCode)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stName')); ?>:</b>
	<?php echo CHtml::encode($data->stName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stFamily')); ?>:</b>
	<?php echo CHtml::encode($data->stFamily); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fatherName')); ?>:</b>
	<?php echo CHtml::encode($data->fatherName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('school')); ?>:</b>
	<?php echo CHtml::encode($data->school); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('birthdate')); ?>:</b>
	<?php echo CHtml::encode($data->birthdate); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('picture')); ?>:</b>
	<?php echo CHtml::encode($data->picture); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parentCode')); ?>:</b>
	<?php echo CHtml::encode($data->parentCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::encode($data->Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('schoolId')); ?>:</b>
	<?php echo CHtml::encode($data->schoolId); ?>
	<br />

	*/ ?>

</div>