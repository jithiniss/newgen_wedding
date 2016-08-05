<?php
/* @var $this FacebookController */
/* @var $model Facebook */

$this->breadcrumbs = array(
    'Facebooks' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Facebook', 'url' => array('index')),
    array('label' => 'Create Facebook', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#facebook-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Facebooks</h1>



<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'facebook-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'user_id',
        'facebook_link',
        'verify_status',
        'cb',
        'ub',
        /*
          'doc',
          'dou',
          'status',
         */
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
