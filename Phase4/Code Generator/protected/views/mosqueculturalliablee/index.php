<?php
/* @var $this MosqueculturalliableeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Mosqueculturalliablees',
);

$this->menu=array(
	array('label'=>'Create mosqueculturalliablee', 'url'=>array('create')),
	array('label'=>'Manage mosqueculturalliablee', 'url'=>array('admin')),
);
?>

<h1>Mosqueculturalliablees</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
