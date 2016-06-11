<?php
/* @var $this MasterEducationLevelController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Education Levels',
);

$this->menu=array(
	array('label'=>'Create MasterEducationLevel', 'url'=>array('create')),
	array('label'=>'Manage MasterEducationLevel', 'url'=>array('admin')),
);
?>

<h1>Master Education Levels</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
