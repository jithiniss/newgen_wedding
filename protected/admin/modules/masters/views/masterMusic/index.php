<?php
/* @var $this MasterMusicController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Musics',
);

$this->menu=array(
	array('label'=>'Create MasterMusic', 'url'=>array('create')),
	array('label'=>'Manage MasterMusic', 'url'=>array('admin')),
);
?>

<h1>Master Musics</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
