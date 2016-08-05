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
        <h1 style="float: left;" class="title">Facebook Link Verification</h1>
        <p style="float: left;margin-top: 8px;margin-left: 11px;" class="description">Facebook Link Verification</p>
    </div>

    <div class="breadcrumb-env">

        <ol class="breadcrumb bc-1" >
            <li>
                <a href="<?php echo Yii::app()->request->baseurl . '/site/home'; ?>"><i class="fa-home"></i>Home</a>
            </li>

            <li class="active">

                <strong>Facebook Link Verification</strong>
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
                'id' => 'facebook-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
//                    'id',
//                    'user_id',
                    array('name' => 'user_id',
                        'value' => function($data) {
                                $user = UserDetails::model()->findByPk($data->user_id);
                                return $user->first_name;
                        },
                        'type' => 'raw',
                    ),
                    'facebook_link',
//                    'verify_status',
                    array(
                        'name' => 'verify_status',
                        'filter' => array(1 => 'Verified', 0 => 'Not Verified'),
                        'value' => function($data) {
                        return $data->verify_status == 1 ? 'Verified' : 'Not Verified';
                }
                    ),
//                    'cb',
//                    'ub',
                    /*
                      'doc',
                      'dou',
                      'status',
                     */
                    array(
                        'htmlOptions' => array('nowrap' => 'nowrap'),
                        'class' => 'booster.widgets.TbButtonColumn',
                        'template' => '{verified}{Not verified}',
                        'buttons' => array
                            (
                            'verified' => array
                                (
                                'url' => 'Yii::app()->createUrl("/facebook/notVerify", array("id"=>$data->id))',
                                'label' => '<i class="fa fa-thumbs-o-up" style="font-size:20px;padding:2px;" aria-hidden="true"></i>',
                                'visible' => '$data->verify_status == 1',
                                'options' => array(
                                    'data-toggle' => 'tooltip',
                                    'title' => 'Verified'
                                ),
                            ),
                            'Not verified' => array
                                (
                                'url' => 'Yii::app()->createUrl("/facebook/verify", array("id"=>$data->id))',
                                'label' => '<i class="fa fa-thumbs-o-down" style="font-size:20px;padding:2px;" aria-hidden="true"></i>',
                                'visible' => '$data->verify_status == 0',
                                'options' => array(
                                    'data-toggle' => 'tooltip',
                                    'title' => 'Not Verified'
                                ),
                            ),
//                            'user' => array
//                                (
//                                'url' => 'Yii::app()->createUrl("/user/UserDetails/admin/user_approval/".$data->user_id)',
//                                'label' => '<i class="fa fa-user" style="font-size:20px;padding:2px;" aria-hidden="true"></i>',
//                                'options' => array(
//                                    'data-toggle' => 'tooltip',
//                                    'title' => 'User Detail'
//                                ),
//                            ),
                        ),
                    ),
                ),
            ));
            ?>
        </div>

    </div>


</div>

