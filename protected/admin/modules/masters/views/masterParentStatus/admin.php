<?php
/* @var $this MasterParentStatusController */
/* @var $model MasterParentStatus */
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
        <h1 style="float: left;" class="title">Master Parent Statuses</h1>
        <p style="float: left;margin-top: 8px;margin-left: 11px;" class="description">Manage Master Parent Statuses</p>
    </div>

    <div class="breadcrumb-env">

        <ol class="breadcrumb bc-1" >
            <li>
                <a href="<?php echo Yii::app()->request->baseurl . '/site/home'; ?>"><i class="fa-home"></i>Home</a>
            </li>

            <li class="active">

                <strong>Manage Master Parent Statuses</strong>
            </li>
        </ol>

    </div>

</div>
<div class="row">


    <div class="col-sm-12">

        <a class="btn btn-secondary btn-icon btn-icon-standalone" href="<?php echo Yii::app()->request->baseurl . '/admin.php/masters/masterParentStatus/create'; ?>" id="add-note">
            <i class="fa-pencil"></i>
            <span>Add Master Parent Statuses</span>
        </a>
        <div class="panel panel-default">
            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'master-parent-status-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    array(
                        'name' => 'category',
                        'filter' => array(1 => 'Father', 2 => 'Mother', 3 => 'Both'),
                        'value' => function($data) {
                        if ($data->status == 1)
                                return 'Father';
                        else if ($data->status == 2)
                                return 'Father';
                        else if ($data->status == 3)
                                return 'Both';
                        else {
                                return 'Invalid';
                        }
                }
                    ),
                    'parent_status',
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

