<?php
/* @var $this MasterEducationFieldController */
/* @var $model MasterEducationField */

$this->breadcrumbs=array(
	'Master Education Fields'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterEducationField', 'url'=>array('index')),
	array('label'=>'Create MasterEducationField', 'url'=>array('create')),
	array('label'=>'Update MasterEducationField', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterEducationField', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterEducationField', 'url'=>array('admin')),
);
?>

<h1>View MasterEducationField #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'education_field',
		'status',
		'cb',
		'ub',
		'doc',
		'dou',
	),
)); ?>
