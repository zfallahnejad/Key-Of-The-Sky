<?php
/* @var $this RefrencepointController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Refrencepoints',
);

$this->menu=array(
	array('label'=>'Create refrencepoint', 'url'=>array('create')),
	array('label'=>'Manage refrencepoint', 'url'=>array('admin')),
);
?>

<h1>Refrencepoints</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
