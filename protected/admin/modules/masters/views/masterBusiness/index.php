<?php
/* @var $this MasterBusinessController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Businesses',
);

$this->menu=array(
	array('label'=>'Create MasterBusiness', 'url'=>array('create')),
	array('label'=>'Manage MasterBusiness', 'url'=>array('admin')),
);
?>

<h1>Master Businesses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
