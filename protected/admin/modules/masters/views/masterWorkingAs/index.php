<?php
/* @var $this MasterWorkingAsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Working Ases',
);

$this->menu=array(
	array('label'=>'Create MasterWorkingAs', 'url'=>array('create')),
	array('label'=>'Manage MasterWorkingAs', 'url'=>array('admin')),
);
?>

<h1>Master Working Ases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
