<?php
/* @var $this StaticPageController */
/* @var $model StaticPage */
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
                <h1 style="float: left;" class="title">Misuse Report</h1>
                <p style="float: left;margin-top: 8px;margin-left: 11px;" class="description">Manage Misuse Report</p>
        </div>

        <div class="breadcrumb-env">

                <ol class="breadcrumb bc-1" >
                        <li>
                                <a href="<?php echo Yii::app()->request->baseurl . '/admin.php/site/home'; ?>"><i class="fa-home"></i>Home</a>
                        </li>

                        <li class="active">

                                <strong>Manage Misuse Report</strong>
                        </li>
                </ol>

        </div>

</div>
<div class="row">


        <div class="col-sm-12">

                <div class="panel panel-default">
                        <?php
                        $this->widget('booster.widgets.TbGridView', array(
                            'type' => ' bordered condensed hover',
                            'id' => 'report-misuse-grid',
                            'dataProvider' => $model->search(),
                            'filter' => $model,
                            'columns' => array(
//		'id',
                                array(
                                    'name' => 'user_id',
                                    'value' => function($data) {
                                            return $data->user->first_name;
                                    }
                                ),
                                array(
                                    'name' => 'report_id',
                                    'value' => function($data) {
                                            return $data->user0->first_name;
                                    }
                                ),
                                array('name' => 'report_reason',
                                    'filter' => array(0 => 'Invalid', 1 => 'Fake or misleading information', 2 => 'Multiple Profiles', 3 => 'Phone number is incorrect', 4 => 'Photos are fake or obscene', 5 => 'Has sent abusive Emails/Chat', 6 => 'Is already married/engaged', 7 => 'Asking for money/scammer', 8 => 'Other misuse reason'),
                                    'value' => function($data) {
                                    if ($data->report_reason == 1) {
                                            return 'Fake or misleading information';
                                    } else if ($data->report_reason == 2) {
                                            return 'Multiple Profiles';
                                    } else if ($data->report_reason == 3) {
                                            return 'Phone number is incorrect';
                                    } else if ($data->report_reason == 4) {
                                            return 'Photos are fake or obscene';
                                    } else if ($data->report_reason == 5) {
                                            return 'Has sent abusive Emails/Chat';
                                    } else if ($data->report_reason == 6) {
                                            return 'Is already married/engaged';
                                    } else if ($data->report_reason == 7) {
                                            return 'Asking for money/scammer';
                                    } else if ($data->report_reason == 8) {
                                            return 'Other misuse reason';
                                    } else if ($data->report_reason == 0) {
                                            return 'Invalid';
                                    }
                            },
                                ),
                                'description',
                                /*
                                  'doc',
                                  'ub',
                                  'dou',
                                  'status',
                                 */
                                array(
                                    'htmlOptions' => array('nowrap' => 'nowrap'),
                                    'class' => 'booster.widgets.TbButtonColumn',
                                    'template' => '{delete}',
                                ),
                            ),
                        ));
                        ?>
                </div>
        </div>
</div>
