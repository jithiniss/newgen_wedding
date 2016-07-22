<?php
/* @var $this ReportMisuseController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Report Misuses',
);

$this->menu=array(
	array('label'=>'Create ReportMisuse', 'url'=>array('create')),
	array('label'=>'Manage ReportMisuse', 'url'=>array('admin')),
);
?>

<h1>Report Misuses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
