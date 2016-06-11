<?php
/* @var $this MasterEducationFieldController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Education Fields',
);

$this->menu=array(
	array('label'=>'Create MasterEducationField', 'url'=>array('create')),
	array('label'=>'Manage MasterEducationField', 'url'=>array('admin')),
);
?>

<h1>Master Education Fields</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
