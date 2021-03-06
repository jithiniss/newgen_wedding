<?php
/* @var $this MasterServicesController */
/* @var $model MasterServices */
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
        <h1 style="float: left;" class="title">Master Services</h1>
        <p style="float: left;margin-top: 8px;margin-left: 11px;" class="description">Manage Master Services</p>
    </div>

    <div class="breadcrumb-env">

        <ol class="breadcrumb bc-1" >
            <li>
                <a href="<?php echo Yii::app()->request->baseurl . '/site/home'; ?>"><i class="fa-home"></i>Home</a>
            </li>

            <li class="active">

                <strong>Manage Master Services</strong>
            </li>
        </ol>

    </div>

</div>
<div class="row">


    <div class="col-sm-12">

        <a class="btn btn-secondary btn-icon btn-icon-standalone" href="<?php echo Yii::app()->request->baseurl . '/admin.php/masters/masterServices/create'; ?>" id="add-note">
            <i class="fa-pencil"></i>
            <span>Add Master Services</span>
        </a>
        <div class="panel panel-default">
            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'master-services-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    'name',
                    array(
                        'name' => 'field',
                        'value' => function($data) {
                                if($data->field == "") {

                                } else {

                                        return '<img width="65" height="65" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->baseUrl . '/uploads/services/' . $data->id . '/' . $data->field . '" />';
                                }
                        },
                        'type' => 'raw'
                    ),
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

