<?php
/* @var $this FileUploadsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'File Uploads',
);

$this->menu=array(
	array('label'=>'Create FileUploads', 'url'=>array('create')),
	array('label'=>'Manage FileUploads', 'url'=>array('admin')),
);
?>

<h1>File Uploads</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
