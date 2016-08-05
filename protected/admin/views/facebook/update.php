<?php
/* @var $this FacebookController */
/* @var $model Facebook */

$this->breadcrumbs=array(
	'Facebooks'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Facebook', 'url'=>array('index')),
	array('label'=>'Create Facebook', 'url'=>array('create')),
	array('label'=>'View Facebook', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Facebook', 'url'=>array('admin')),
);
?>

<h1>Update Facebook <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>