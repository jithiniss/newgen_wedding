<?php
/* @var $this ReportMisuseController */
/* @var $model ReportMisuse */

$this->breadcrumbs=array(
	'Report Misuses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ReportMisuse', 'url'=>array('index')),
	array('label'=>'Create ReportMisuse', 'url'=>array('create')),
	array('label'=>'View ReportMisuse', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ReportMisuse', 'url'=>array('admin')),
);
?>

<h1>Update ReportMisuse <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>