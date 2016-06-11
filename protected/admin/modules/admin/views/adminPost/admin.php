<?php
/* @var $this AdminPostController */
/* @var $model AdminPost */
?>
<style>
    .table th, td{
        text-align: center;
    }
    .table td{
        text-align: center;
    }
</style>


<div class="page-title">

    <div class="title-env">
        <h1 style="float: left;" class="title">Admin Posts</h1>
        <p style="float: left;margin-top: 8px;margin-left: 11px;" class="description">Manage Admin Posts</p>
    </div>

    <div class="breadcrumb-env">

        <ol class="breadcrumb bc-1" >
            <li>
                <a href="<?php echo Yii::app()->request->baseurl.'/site/home'; ?>"><i class="fa-home"></i>Home</a>
            </li>

            <li class="active">

                <strong>Manage Admin Posts</strong>
            </li>
        </ol>

    </div>

</div>
<div class="row">


    <div class="col-sm-12">

        <a class="btn btn-secondary btn-icon btn-icon-standalone" href="<?php echo Yii::app()->request->baseurl.'/admin.php/admin/adminPost/create'; ?>" id="add-note">
            <i class="fa-pencil"></i>
            <span>Add Admin Posts</span>
        </a>
        <div class="panel panel-default">
            <?php $this->widget('booster.widgets.TbGridView', array(
            'type' => ' bordered condensed hover',
            'id'=>'admin-post-grid',
            'dataProvider'=>$model->search(),
            'filter'=>$model,
            'columns'=>array(
            		'id',
		'post_name',
		'static_content',
		'dynamic_content',
		'slider',
		'gallery',
		/*
		'contact_us',
		'social_media',
		'other',
		'site_content',
		'service',
		'news',
		'settings',
		'status',
		'doc',
		'dou',
		'cb',
		'ub',
		*/

            array(
            'htmlOptions' => array('nowrap' => 'nowrap'),
            'class' => 'booster.widgets.TbButtonColumn',
            'template' => '{update}{delete}',
            ),
            ),
            )); ?>
        </div>

    </div>


</div>

