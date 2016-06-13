<?php
/* @var $this MasterCasteController */
/* @var $model MasterCaste */
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
        <h1 style="float: left;" class="title">Master Castes</h1>
        <p style="float: left;margin-top: 8px;margin-left: 11px;" class="description">Manage Master Castes</p>
    </div>

    <div class="breadcrumb-env">

        <ol class="breadcrumb bc-1" >
            <li>
                <a href="<?php echo Yii::app()->request->baseurl . '/site/home'; ?>"><i class="fa-home"></i>Home</a>
            </li>

            <li class="active">

                <strong>Manage Master Castes</strong>
            </li>
        </ol>

    </div>

</div>
<div class="row">


    <div class="col-sm-12">

        <a class="btn btn-secondary btn-icon btn-icon-standalone" href="<?php echo Yii::app()->request->baseurl . '/admin.php/masters/masterCaste/create'; ?>" id="add-note">
            <i class="fa-pencil"></i>
            <span>Add Master Castes</span>
        </a>
        <div class="panel panel-default">
            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'master-caste-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    array(
                        'name' => 'religion_id',
                        'value' => '$data->religion->religion',
                        'filter' => CHtml::listData(MasterReligion::model()->findAllByAttributes(array('status' => 1)), 'id', 'religion')
                    ),
                    'caste',
                    array(
                        'name' => 'status',
                        'filter' => array(1 => 'Enabled', 0 => 'Disabled'),
                        'value' => function($data) {
                        return $data->status == 1 ? 'Enabled' : 'Disabled';
                }
                    ),
                    array(
                        'htmlOptions' => array('nowrap' => 'nowrap'),
                        'class' => 'booster.widgets.TbButtonColumn',
                        'template' => '{update}{delete}',
                    ),
                ),
            ));
            ?>
        </div>

    </div>


</div>

