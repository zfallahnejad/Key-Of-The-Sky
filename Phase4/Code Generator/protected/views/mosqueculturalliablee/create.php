<?php
/* @var $this MosqueculturalliableeController */
/* @var $model mosqueculturalliablee */

$this->breadcrumbs=array(
	'Mosqueculturalliablees'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List mosqueculturalliablee', 'url'=>array('index')),
	array('label'=>'Manage mosqueculturalliablee', 'url'=>array('admin')),
);
?>

<h1>Create mosqueculturalliablee</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>