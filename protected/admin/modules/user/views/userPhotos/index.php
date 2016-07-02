<?php
/* @var $this UserPhotosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Photoses',
);

$this->menu=array(
	array('label'=>'Create UserPhotos', 'url'=>array('create')),
	array('label'=>'Manage UserPhotos', 'url'=>array('admin')),
);
?>

<h1>User Photoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
