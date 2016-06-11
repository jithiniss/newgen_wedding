<?php
/* @var $this MasterAffluenceLevelController */
/* @var $model MasterAffluenceLevel */

$this->breadcrumbs=array(
	'Master Affluence Levels'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterAffluenceLevel', 'url'=>array('index')),
	array('label'=>'Create MasterAffluenceLevel', 'url'=>array('create')),
	array('label'=>'Update MasterAffluenceLevel', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterAffluenceLevel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterAffluenceLevel', 'url'=>array('admin')),
);
?>

<h1>View MasterAffluenceLevel #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'affluence_level',
		'status',
		'cb',
		'ub',
		'doc',
		'dou',
	),
)); ?>
