<?php
/* @var $this RefrencepointController */
/* @var $model refrencepoint */

$this->breadcrumbs=array(
	'Refrencepoints'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List refrencepoint', 'url'=>array('index')),
	array('label'=>'Manage refrencepoint', 'url'=>array('admin')),
);
?>

<h1>Create refrencepoint</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>