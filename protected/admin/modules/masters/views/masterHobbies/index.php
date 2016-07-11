<?php
/* @var $this MasterHobbiesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Hobbies',
);

$this->menu=array(
	array('label'=>'Create MasterHobbies', 'url'=>array('create')),
	array('label'=>'Manage MasterHobbies', 'url'=>array('admin')),
);
?>

<h1>Master Hobbies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
