<?php
/* @var $this MasterProfileForController */
/* @var $model MasterProfileFor */

$this->breadcrumbs=array(
	'Master Profile Fors'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterProfileFor', 'url'=>array('index')),
	array('label'=>'Create MasterProfileFor', 'url'=>array('create')),
	array('label'=>'Update MasterProfileFor', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterProfileFor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterProfileFor', 'url'=>array('admin')),
);
?>

<h1>View MasterProfileFor #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'profile_for',
		'status',
		'cb',
		'ub',
		'doc',
		'dou',
	),
)); ?>
