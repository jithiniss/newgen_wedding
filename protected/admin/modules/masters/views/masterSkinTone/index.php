<?php
/* @var $this MasterSkinToneController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Skin Tones',
);

$this->menu=array(
	array('label'=>'Create MasterSkinTone', 'url'=>array('create')),
	array('label'=>'Manage MasterSkinTone', 'url'=>array('admin')),
);
?>

<h1>Master Skin Tones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
