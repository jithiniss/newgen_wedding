<?php
/* @var $this MasterBloodGroupController */
/* @var $model MasterBloodGroup */

$this->breadcrumbs=array(
	'Master Blood Groups'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterBloodGroup', 'url'=>array('index')),
	array('label'=>'Create MasterBloodGroup', 'url'=>array('create')),
	array('label'=>'Update MasterBloodGroup', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterBloodGroup', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterBloodGroup', 'url'=>array('admin')),
);
?>

<h1>View MasterBloodGroup #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'blood_group',
		'status',
		'cb',
		'ub',
		'doc',
		'dou',
	),
)); ?>
