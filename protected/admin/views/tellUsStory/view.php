<?php
/* @var $this TellUsStoryController */
/* @var $model TellUsStory */

$this->breadcrumbs = array(
    'Tell Us Stories' => array('index'),
    $model->name,
);

$this->menu = array(
    // array('label' => 'List TellUsStory', 'url' => array('index')),
    array('label' => 'Create TellUsStory', 'url' => array('create')),
//    array('label' => 'Update TellUsStory', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete TellUsStory', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage TellUsStory', 'url' => array('admin')),
);
?>

<h1>View TellUsStory #<?php echo $model->id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
//		'id',
//		'user_id',
        'name',
        'email',
        'partner_name',
        'partner_email',
        'feedback',
        'wedding_date',
        array('name' => 'image',
            'value' => function($data) {
                    return '<img style="width:100px;height:100px;" src="' . Yii::app()->baseUrl . '/uploads/wedding/' . $data->id . '/wedding.' . $data->image . '">';
            },
            'type' => 'raw'
        ),
//		'field1',
//		'field2',
        'admin_approval',
//		'cb',
//		'ub',
//		'doc',
//		'dou',
//		'status',
    ),
));
?>
