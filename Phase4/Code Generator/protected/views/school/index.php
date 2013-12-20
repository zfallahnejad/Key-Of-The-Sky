<?php
/* @var $this SchoolController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Schools',
);

$this->menu=array(
	array('label'=>'Create school', 'url'=>array('create')),
	array('label'=>'Manage school', 'url'=>array('admin')),
);
?>

<h1>Schools</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
