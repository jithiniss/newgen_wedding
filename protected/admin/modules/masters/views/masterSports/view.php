<?php
/* @var $this MasterSportsController */
/* @var $model MasterSports */

$this->breadcrumbs=array(
	'Master Sports'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterSports', 'url'=>array('index')),
	array('label'=>'Create MasterSports', 'url'=>array('create')),
	array('label'=>'Update MasterSports', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterSports', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterSports', 'url'=>array('admin')),
);
?>

<h1>View MasterSports #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'sports',
		'status',
		'cb',
		'ub',
		'doc',
		'dou',
	),
)); ?>
