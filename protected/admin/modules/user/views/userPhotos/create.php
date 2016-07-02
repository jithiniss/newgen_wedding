<?php
/* @var $this UserPhotosController */
/* @var $model UserPhotos */

$this->breadcrumbs=array(
	'User Photoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserPhotos', 'url'=>array('index')),
	array('label'=>'Manage UserPhotos', 'url'=>array('admin')),
);
?>

<h1>Create UserPhotos</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>