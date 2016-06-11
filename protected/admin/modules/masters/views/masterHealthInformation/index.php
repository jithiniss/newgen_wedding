<?php
/* @var $this MasterHealthInformationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Health Informations',
);

$this->menu=array(
	array('label'=>'Create MasterHealthInformation', 'url'=>array('create')),
	array('label'=>'Manage MasterHealthInformation', 'url'=>array('admin')),
);
?>

<h1>Master Health Informations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
