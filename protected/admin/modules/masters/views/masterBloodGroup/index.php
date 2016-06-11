<?php
/* @var $this MasterBloodGroupController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Blood Groups',
);

$this->menu=array(
	array('label'=>'Create MasterBloodGroup', 'url'=>array('create')),
	array('label'=>'Manage MasterBloodGroup', 'url'=>array('admin')),
);
?>

<h1>Master Blood Groups</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
