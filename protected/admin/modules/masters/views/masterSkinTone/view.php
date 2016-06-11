<?php
/* @var $this MasterSkinToneController */
/* @var $model MasterSkinTone */

$this->breadcrumbs=array(
	'Master Skin Tones'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterSkinTone', 'url'=>array('index')),
	array('label'=>'Create MasterSkinTone', 'url'=>array('create')),
	array('label'=>'Update MasterSkinTone', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterSkinTone', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterSkinTone', 'url'=>array('admin')),
);
?>

<h1>View MasterSkinTone #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'skin_tone',
		'status',
		'cb',
		'ub',
		'doc',
		'dou',
	),
)); ?>
