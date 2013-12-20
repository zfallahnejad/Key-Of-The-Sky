<?php
/* @var $this ParentclassController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Parentclasses',
);

$this->menu=array(
	array('label'=>'Create parentclass', 'url'=>array('create')),
	array('label'=>'Manage parentclass', 'url'=>array('admin')),
);
?>

<h1>Parentclasses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
