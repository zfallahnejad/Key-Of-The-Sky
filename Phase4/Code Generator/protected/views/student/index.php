<?php
/* @var $this StudentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Students',
);

$this->menu=array(
	array('label'=>'Create student', 'url'=>array('create')),
	array('label'=>'Manage student', 'url'=>array('admin')),
);
?>

<h1>Students</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
