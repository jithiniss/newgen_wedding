<?php
/* @var $this MasterHobbiesController */
/* @var $model MasterHobbies */

$this->breadcrumbs=array(
	'Master Hobbies'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterHobbies', 'url'=>array('index')),
	array('label'=>'Create MasterHobbies', 'url'=>array('create')),
	array('label'=>'Update MasterHobbies', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterHobbies', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterHobbies', 'url'=>array('admin')),
);
?>

<h1>View MasterHobbies #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'hobbies',
		'status',
		'cb',
		'ub',
		'doc',
		'dou',
	),
)); ?>
