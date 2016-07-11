<?php
/* @var $this MasterMoviesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Movies',
);

$this->menu=array(
	array('label'=>'Create MasterMovies', 'url'=>array('create')),
	array('label'=>'Manage MasterMovies', 'url'=>array('admin')),
);
?>

<h1>Master Movies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
