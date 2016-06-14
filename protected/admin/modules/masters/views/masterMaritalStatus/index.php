<?php
/* @var $this MasterMaritalStatusController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Marital Statuses',
);

$this->menu=array(
	array('label'=>'Create MasterMaritalStatus', 'url'=>array('create')),
	array('label'=>'Manage MasterMaritalStatus', 'url'=>array('admin')),
);
?>

<h1>Master Marital Statuses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
