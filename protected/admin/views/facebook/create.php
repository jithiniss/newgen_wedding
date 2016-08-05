<?php
/* @var $this FacebookController */
/* @var $model Facebook */

$this->breadcrumbs=array(
	'Facebooks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Facebook', 'url'=>array('index')),
	array('label'=>'Manage Facebook', 'url'=>array('admin')),
);
?>

<h1>Create Facebook</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>