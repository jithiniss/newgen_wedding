<?php
/* @var $this MasterWorkingWithController */
/* @var $model MasterWorkingWith */

$this->breadcrumbs=array(
	'Master Working Withs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterWorkingWith', 'url'=>array('index')),
	array('label'=>'Create MasterWorkingWith', 'url'=>array('create')),
	array('label'=>'Update MasterWorkingWith', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterWorkingWith', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterWorkingWith', 'url'=>array('admin')),
);
?>

<h1>View MasterWorkingWith #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'working_with',
		'status',
		'cb',
		'ub',
		'doc',
		'dou',
	),
)); ?>
