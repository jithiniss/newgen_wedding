<?php
/* @var $this MasterReligionController */
/* @var $model MasterReligion */

$this->breadcrumbs=array(
	'Master Religions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterReligion', 'url'=>array('index')),
	array('label'=>'Create MasterReligion', 'url'=>array('create')),
	array('label'=>'Update MasterReligion', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterReligion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterReligion', 'url'=>array('admin')),
);
?>

<h1>View MasterReligion #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'religion',
		'status',
		'cb',
		'ub',
		'doc',
		'dou',
	),
)); ?>
