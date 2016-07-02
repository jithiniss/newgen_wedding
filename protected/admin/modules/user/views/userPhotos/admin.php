<?php
/* @var $this UserDetailsController */
/* @var $model UserDetails */
?>
<style>
        .table th, td{
                text-align: center;
        }
        .table td{
                text-align: center;
        }
        .panel-default {
                overflow-x: scroll;
        }
        #user-details-grid table{
                width: 4200px;
        }
</style>


<div class="page-title">

        <div class="title-env">
                <h1 style="float: left;" class="title">User Details</h1>
                <p style="float: left;margin-top: 8px;margin-left: 11px;" class="description">Manage User Details</p>
        </div>

        <div class="breadcrumb-env">

                <ol class="breadcrumb bc-1" >
                        <li>
                                <a href="<?php echo Yii::app()->request->baseurl . '/site/home'; ?>"><i class="fa-home"></i>Home</a>
                        </li>

                        <li class="active">

                                <strong>Manage User Details</strong>
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
                            'id' => 'user-photos-grid',
                            'dataProvider' => $model->search(),
                            'filter' => $model,
                            'columns' => array(
//        'id',
                                array('name' => 'user_id',
                                    'value' => function($data) {
                                            return $data->user->first_name;
                                    },
                                    'type' => 'raw',
                                ),
                                array(
                                    'name' => 'photo_name',
                                    'value' => function($data) {
                                            if ($data->photo_name == "") {
                                                    $folder = Yii::app()->Upload->folderName(0, 1000, $data->user_id);
                                                    return '<img width="65" height="65" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->request->baseUrl . '/uploads/user/' . $folder . '/' . $data->user_id . '/album/' . $data->photo_name . '" />';
                                            } else {
                                                    $folder = Yii::app()->Upload->folderName(0, 1000, $data->user_id);
                                                    return '<img width="65" height="65" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->request->baseUrl . '/uploads/user/' . $folder . '/' . $data->user_id . '/album/' . $data->photo_name . '" />';
                                            }
                                    },
                                    'type' => 'raw'
                                ),
                                array(
                                    'name' => 'approval',
                                    'filter' => array(1 => 'Approved', 0 => 'Not Approved'),
                                    'value' => function($data) {
                                    return $data->approval == 1 ? 'Approved' : 'Not Approved';
                            }
                                ),
                                array(
                                    'name' => 'status',
                                    'filter' => array(1 => 'Enabled', 0 => 'Disabled'),
                                    'value' => function($data) {
                                    return $data->status == 1 ? 'Enabled' : 'Disabled';
                            }
                                ),
//                                'cb',
                                'doc',
                                /*
                                  'ub',
                                  'dou',
                                 */
                                array(
                                    'htmlOptions' => array('nowrap' => 'nowrap'),
                                    'class' => 'booster.widgets.TbButtonColumn',
                                    'template' => '{approve}{Not Approve}{user}{delete}',
                                    'buttons' => array
                                        (
                                        'approve' => array
                                            (
                                            'url' => 'Yii::app()->createUrl("/user/UserPhotos/approve", array("id"=>$data->id))',
                                            'label' => '<i class="fa fa-thumbs-o-up" style="font-size:20px;padding:2px;" aria-hidden="true"></i>',
                                            'visible' => '$data->approval == 1',
                                            'options' => array(
                                                'data-toggle' => 'tooltip',
                                                'title' => 'Approval'
                                            ),
                                        ),
                                        'Not Approve' => array
                                            (
                                            'url' => 'Yii::app()->createUrl("/user/UserPhotos/notapprove", array("id"=>$data->id))',
                                            'label' => '<i class="fa fa-thumbs-o-down" style="font-size:20px;padding:2px;" aria-hidden="true"></i>',
                                            'visible' => '$data->approval == 0',
                                            'options' => array(
                                                'data-toggle' => 'tooltip',
                                                'title' => 'Not Approve'
                                            ),
                                        ),
                                        'user' => array
                                            (
                                            'url' => 'Yii::app()->createUrl("/user/UserDetails/admin/user_approval/".$data->user_id)',
                                            'label' => '<i class="fa fa-user" style="font-size:20px;padding:2px;" aria-hidden="true"></i>',
                                            'options' => array(
                                                'data-toggle' => 'tooltip',
                                                'title' => 'User Detail'
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ));
                        ?>
                </div>

        </div>


</div>

