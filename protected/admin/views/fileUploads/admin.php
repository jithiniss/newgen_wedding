<style>
    .table th, td{
        text-align: center;
    }
    .table td{
        text-align: center;
    }
    .view,.update,.delete {
        margin: 5px;
    }
    #slider-grid td{
        max-width: 250px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

</style>
<div class="page-title">

    <div class="title-env">
        <h1 style="float: left;" class="title">Files</h1>
        <p style="float: left;margin-top: 8px;margin-left: 11px;" class="description">Manage Files</p>
    </div>

    <div class="breadcrumb-env">

        <ol class="breadcrumb bc-1" >
            <li>
                <?php echo CHtml::link('<i class="fa-home"></i>Home', array('site/home')); ?>
            </li>

            <li class="active">

                <strong>Manage Files</strong>
            </li>
        </ol>

    </div>

</div>

<div class="row">


    <div class="col-sm-12">

        <a class="btn btn-secondary btn-icon btn-icon-standalone" href="<?php echo Yii::app()->request->baseUrl . '/admin.php/FileUploads/create'; ?>" id="add-note">

            <i class="fa-pencil"></i>
            <span>Add File</span>
        </a>

        <div class="search-form" style="display:none">
            <?php
            $this->renderPartial('_search', array(
                'model' => $model,
            ));
            ?>
        </div>
        <div class="panel panel-default">
            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'slider-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    'heading',
                    array('name' => 'file',
                        'filter' => '',
                        'value' => function($data) {
                                if ($data->file != '') {
                                        return Yii::app()->getBaseUrl(true) . '/uploads/files/' . $data->id . '/' . $data->heading . '.' . $data->file;
                                }
                        },
                        'type' => 'raw',
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