<?php
/* @var $this MasterWorkingWithController */
/* @var $model MasterWorkingWith */
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
        <h1 style="float: left;" class="title">Plans</h1>
        <p style="float: left;margin-top: 8px;margin-left: 11px;" class="description">Manage Plans</p>
    </div>

    <div class="breadcrumb-env">

        <ol class="breadcrumb bc-1" >
            <li>
                <a href="<?php echo Yii::app()->request->baseurl . '/site/home'; ?>"><i class="fa-home"></i>Home</a>
            </li>

            <li class="active">

                <strong>Manage Plans</strong>
            </li>
        </ol>

    </div>

</div>
<div class="row">


    <div class="col-sm-12">

        <a class="btn btn-secondary btn-icon btn-icon-standalone" href="<?php echo Yii::app()->request->baseurl . '/admin.php/masters/plans/create'; ?>" id="add-note">
            <i class="fa-pencil"></i>
            <span>Add New Plan</span>
        </a>
        <div class="panel panel-default">

            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'plans-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    'plan_name',
                    'number_of_days',
                    'amount',
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