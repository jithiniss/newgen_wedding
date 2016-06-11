<?php
/* @var $this MasterEducationLevelController */
/* @var $model MasterEducationLevel */

$this->breadcrumbs=array(
	'Master Education Levels'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterEducationLevel', 'url'=>array('index')),
	array('label'=>'Create MasterEducationLevel', 'url'=>array('create')),
	array('label'=>'Update MasterEducationLevel', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterEducationLevel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterEducationLevel', 'url'=>array('admin')),
);
?>

<h1>View MasterEducationLevel #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'education_level',
		'status',
		'cb',
		'ub',
		'doc',
		'dou',
	),
)); ?>
