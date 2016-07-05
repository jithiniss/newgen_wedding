<?php
/* @var $this PlansController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Plans',
);

$this->menu=array(
	array('label'=>'Create Plans', 'url'=>array('create')),
	array('label'=>'Manage Plans', 'url'=>array('admin')),
);
?>

<h1>Plans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
