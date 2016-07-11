<?php
/* @var $this MasterMusicController */
/* @var $model MasterMusic */

$this->breadcrumbs=array(
	'Master Musics'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterMusic', 'url'=>array('index')),
	array('label'=>'Create MasterMusic', 'url'=>array('create')),
	array('label'=>'Update MasterMusic', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterMusic', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterMusic', 'url'=>array('admin')),
);
?>

<h1>View MasterMusic #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'music',
		'status',
		'cb',
		'ub',
		'doc',
		'dou',
	),
)); ?>
