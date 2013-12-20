<?php
/* @var $this MosqueculturalliableeController */
/* @var $model mosqueculturalliablee */

$this->breadcrumbs=array(
	'Mosqueculturalliablees'=>array('index'),
	$model->name=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List mosqueculturalliablee', 'url'=>array('index')),
	array('label'=>'Create mosqueculturalliablee', 'url'=>array('create')),
	array('label'=>'View mosqueculturalliablee', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage mosqueculturalliablee', 'url'=>array('admin')),
);
?>

<h1>Update mosqueculturalliablee <?php echo $model->Id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>