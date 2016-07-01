<?php
/* @var $this AwardsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Awards',
);

$this->menu=array(
	array('label'=>'Create Awards', 'url'=>array('create')),
	array('label'=>'Manage Awards', 'url'=>array('admin')),
);
?>

<h1>Awards</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
