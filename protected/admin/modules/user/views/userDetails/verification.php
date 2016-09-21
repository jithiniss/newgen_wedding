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
</style>


<div class="page-title">

    <div class="title-env">
        <h1 style="float: left;" class="title">Phone Verification</h1>
        <p style="float: left;margin-top: 8px;margin-left: 11px;" class="description">Phone Verification</p>
    </div>

    <div class="breadcrumb-env">

        <ol class="breadcrumb bc-1" >
            <li>
                <a href="<?php echo Yii::app()->request->baseurl . '/site/home'; ?>"><i class="fa-home"></i>Home</a>
            </li>

            <li class="active">

                <strong>Phone Verification</strong>
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
                'id' => 'user-details-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
//                    'id',
                    'first_name',
                    'mobile_number',
//                    array('name' => 'user_id',
//                        'value' => function($data) {
//                                $user = UserDetails::model()->findByPk($data->user_id);
//                                return $user->first_name;
//                        },
//                        'type' => 'raw',
//                    ),
//                    'facebook_link',
//                    'verify_status',
                    array(
                        'name' => 'mobile_verify',
                        'value' => function($data) {
                                return $data->mobile_verify == 1 ? 'Verified' : 'Not Verified';
                        },
                        'filter' => array(1 => 'Verified', 0 => 'Not Verified'),
                    ),
                    array(
                        'htmlOptions' => array('nowrap' => 'nowrap'),
                        'class' => 'booster.widgets.TbButtonColumn',
                        'template' => '{verified}{Not verified}',
                        'buttons' => array
                            (
                            'verified' => array
                                (
                                'url' => 'Yii::app()->createUrl("/user/userDetails/notVerify", array("id"=>$data->id))',
                                'label' => '<i class="fa fa-thumbs-o-up" style="font-size:20px;padding:2px;" aria-hidden="true"></i>',
                                'visible' => '$data->mobile_verify == 1',
                                'options' => array(
                                    'data-toggle' => 'tooltip',
                                    'title' => 'Verified'
                                ),
                            ),
                            'Not verified' => array
                                (
                                'url' => 'Yii::app()->createUrl("/user/userDetails/verify", array("id"=>$data->id))',
                                'label' => '<i class="fa fa-thumbs-o-down" style="font-size:20px;padding:2px;" aria-hidden="true"></i>',
                                'visible' => '$data->mobile_verify == 0',
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
//                    'cb',
//                    'ub',
                /*
                  'doc',
                  'dou',
                  'status',
                 */
//                    array(
//                        'htmlOptions' => array('nowrap' => 'nowrap'),
//                        'class' => 'booster.widgets.TbButtonColumn',
//                        'template' => '{verified}{Not verified}',
//                        'buttons' => array
//                            (
//                            'verified' => array
//                                (
//                                'url' => 'Yii::app()->createUrl("/facebook/notVerify", array("id"=>$data->id))',
//                                'label' => '<i class="fa fa-thumbs-o-up" style="font-size:20px;padding:2px;" aria-hidden="true"></i>',
//                                'visible' => '$data->verify_status == 1',
//                                'options' => array(
//                                    'data-toggle' => 'tooltip',
//                                    'title' => 'Verified'
//                                ),
//                            ),
//                            'Not verified' => array
//                                (
//                                'url' => 'Yii::app()->createUrl("/facebook/verify", array("id"=>$data->id))',
//                                'label' => '<i class="fa fa-thumbs-o-down" style="font-size:20px;padding:2px;" aria-hidden="true"></i>',
//                                'visible' => '$data->verify_status == 0',
//                                'options' => array(
//                                    'data-toggle' => 'tooltip',
//                                    'title' => 'Not Verified'
//                                ),
//                            ),
//                            'user' => array
//                                (
//                                'url' => 'Yii::app()->createUrl("/user/UserDetails/admin/user_approval/".$data->user_id)',
//                                'label' => '<i class="fa fa-user" style="font-size:20px;padding:2px;" aria-hidden="true"></i>',
//                                'options' => array(
//                                    'data-toggle' => 'tooltip',
//                                    'title' => 'User Detail'
//                                ),
//                            ),
//                        ),
//                    ),
                ),
            ));
            ?>
        </div>

    </div>


</div>

