<?php
/* @var $this MasterMaritalStatusController */
/* @var $model MasterMaritalStatus */

$this->breadcrumbs=array(
	'Master Marital Statuses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterMaritalStatus', 'url'=>array('index')),
	array('label'=>'Create MasterMaritalStatus', 'url'=>array('create')),
	array('label'=>'Update MasterMaritalStatus', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterMaritalStatus', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterMaritalStatus', 'url'=>array('admin')),
);
?>

<h1>View MasterMaritalStatus #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'marital_status',
		'status',
		'cb',
		'ub',
		'doc',
		'dou',
	),
)); ?>
