<?php
/* @var $this MasterDietController */
/* @var $model MasterDiet */

$this->breadcrumbs=array(
	'Master Diets'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterDiet', 'url'=>array('index')),
	array('label'=>'Create MasterDiet', 'url'=>array('create')),
	array('label'=>'Update MasterDiet', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterDiet', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterDiet', 'url'=>array('admin')),
);
?>

<h1>View MasterDiet #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'diet',
		'status',
		'cb',
		'ub',
		'doc',
		'dou',
	),
)); ?>
