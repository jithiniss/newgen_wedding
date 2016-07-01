<?php
/* @var $this FileUploadsController */
/* @var $model FileUploads */

$this->breadcrumbs=array(
	'File Uploads'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FileUploads', 'url'=>array('index')),
	array('label'=>'Create FileUploads', 'url'=>array('create')),
	array('label'=>'View FileUploads', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FileUploads', 'url'=>array('admin')),
);
?>

<h1>Update FileUploads <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>