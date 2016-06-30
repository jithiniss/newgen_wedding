<?php
/* @var $this TellUsStoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tell Us Stories',
);

$this->menu=array(
	array('label'=>'Create TellUsStory', 'url'=>array('create')),
	array('label'=>'Manage TellUsStory', 'url'=>array('admin')),
);
?>

<h1>Tell Us Stories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
