<?php
/* @var $this MasterReligionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Religions',
);

$this->menu=array(
	array('label'=>'Create MasterReligion', 'url'=>array('create')),
	array('label'=>'Manage MasterReligion', 'url'=>array('admin')),
);
?>

<h1>Master Religions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
