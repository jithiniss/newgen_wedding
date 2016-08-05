<?php
/* @var $this FacebookController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Facebooks',
);

$this->menu=array(
	array('label'=>'Create Facebook', 'url'=>array('create')),
	array('label'=>'Manage Facebook', 'url'=>array('admin')),
);
?>

<h1>Facebooks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
