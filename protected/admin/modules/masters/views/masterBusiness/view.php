<?php
/* @var $this MasterBusinessController */
/* @var $model MasterBusiness */

$this->breadcrumbs=array(
	'Master Businesses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterBusiness', 'url'=>array('index')),
	array('label'=>'Create MasterBusiness', 'url'=>array('create')),
	array('label'=>'Update MasterBusiness', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterBusiness', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterBusiness', 'url'=>array('admin')),
);
?>

<h1>View MasterBusiness #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'type',
		'ub',
		'dou',
	),
)); ?>
