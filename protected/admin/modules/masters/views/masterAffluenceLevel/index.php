<?php
/* @var $this MasterAffluenceLevelController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Affluence Levels',
);

$this->menu=array(
	array('label'=>'Create MasterAffluenceLevel', 'url'=>array('create')),
	array('label'=>'Manage MasterAffluenceLevel', 'url'=>array('admin')),
);
?>

<h1>Master Affluence Levels</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
