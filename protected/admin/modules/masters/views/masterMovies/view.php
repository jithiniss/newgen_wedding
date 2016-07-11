<?php
/* @var $this MasterMoviesController */
/* @var $model MasterMovies */

$this->breadcrumbs=array(
	'Master Movies'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterMovies', 'url'=>array('index')),
	array('label'=>'Create MasterMovies', 'url'=>array('create')),
	array('label'=>'Update MasterMovies', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterMovies', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterMovies', 'url'=>array('admin')),
);
?>

<h1>View MasterMovies #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'movies',
		'status',
		'cb',
		'ub',
		'doc',
		'dou',
	),
)); ?>
