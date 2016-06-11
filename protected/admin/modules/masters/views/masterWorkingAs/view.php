<?php
/* @var $this MasterWorkingAsController */
/* @var $model MasterWorkingAs */

$this->breadcrumbs=array(
	'Master Working Ases'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterWorkingAs', 'url'=>array('index')),
	array('label'=>'Create MasterWorkingAs', 'url'=>array('create')),
	array('label'=>'Update MasterWorkingAs', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterWorkingAs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterWorkingAs', 'url'=>array('admin')),
);
?>

<h1>View MasterWorkingAs #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'working_as',
		'status',
		'cb',
		'ub',
		'doc',
		'dou',
	),
)); ?>
