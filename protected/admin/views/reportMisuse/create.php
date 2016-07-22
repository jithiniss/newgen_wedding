<?php
/* @var $this ReportMisuseController */
/* @var $model ReportMisuse */

$this->breadcrumbs=array(
	'Report Misuses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ReportMisuse', 'url'=>array('index')),
	array('label'=>'Manage ReportMisuse', 'url'=>array('admin')),
);
?>

<h1>Create ReportMisuse</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>