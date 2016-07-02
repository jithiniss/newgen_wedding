<?php
/* @var $this UserPhotosController */
/* @var $model UserPhotos */

$this->breadcrumbs=array(
	'User Photoses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserPhotos', 'url'=>array('index')),
	array('label'=>'Create UserPhotos', 'url'=>array('create')),
	array('label'=>'View UserPhotos', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UserPhotos', 'url'=>array('admin')),
);
?>

<h1>Update UserPhotos <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>