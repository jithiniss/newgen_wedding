<?php
/* @var $this TellUsStoryController */
/* @var $model TellUsStory */
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
        <h1 style="float: left;" class="title">Success Stories</h1>
        <p style="float: left;margin-top: 8px;margin-left: 11px;" class="description">Manage Success Stories</p>
    </div>

    <div class="breadcrumb-env">

        <ol class="breadcrumb bc-1" >
            <li>
                <a href="<?php echo Yii::app()->request->baseurl . '/admin.php/site/home'; ?>"><i class="fa-home"></i>Home</a>
            </li>

            <li class="active">

                <strong>Manage Success Stories</strong>
            </li>
        </ol>

    </div>

</div>
<div class="row">


    <div class="col-sm-12">

        <a class="btn btn-secondary btn-icon btn-icon-standalone" href="<?php echo Yii::app()->request->baseurl . '/admin.php/TellUsStory/create'; ?>" id="add-note">
            <i class="fa-pencil"></i>
            <span>Add Success Stories</span>
        </a>
        <div class="panel panel-default">
            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'tell-us-story-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
//        'id',
//        'user_id',
                    'name',
                    'email',
                    'partner_name',
                    'partner_email',
                    array(
                        'name' => 'admin_approval',
                        'filter' => array(1 => 'Approved', 0 => 'Not Approved'),
                        'value' => function($data) {
                        return $data->admin_approval == 1 ? 'Approved' : 'Not Approved';
                }
                    ),
                    /*
                      'feedback',
                      'wedding_date',
                      'image',
                      'field1',
                      'field2',
                      'admin_approval',
                      'cb',
                      'ub',
                      'doc',
                      'dou',
                      'status',
                     *
                     * 'offers' => array(
                      'url' => 'Yii::app()->request->baseUrl."/admin.php/userDetails/offers/id/".$data->id',
                      'label' => '<i class="fa fa-tags" style="font-size:20px;padding:2px;"></i>',
                      'options' => array(
                      'data-toggle' => 'tooltip',
                      'title' => 'offers',
                      'target' => '_blank',
                      ),
                      ),
                     */
                    array(
                        'htmlOptions' => array('nowrap' => 'nowrap'),
                        'class' => 'booster.widgets.TbButtonColumn',
//                        'template' => '{view}{up}{delete}',
                        'template' => '{approve} {Not Approve} {view} {delete}',
                        'buttons' => array
                            (
                            'approve' => array
                                (
                                'url' => 'Yii::app()->createUrl("/TellUsStory/approve", array("id"=>$data->id))',
                                'label' => '<i class="fa fa-thumbs-o-up" style="font-size:20px;padding:2px;" aria-hidden="true"></i>',
                                'visible' => '$data->admin_approval == 0',
                                'options' => array(
                                    'data-toggle' => 'tooltip',
                                    'title' => 'Approve'
                                ),
                            ),
                            'Not Approve' => array
                                (
                                'url' => 'Yii::app()->createUrl("/TellUsStory/notapprove", array("id"=>$data->id))',
                                'label' => '<i class="fa fa-thumbs-o-down" style="font-size:20px;padding:2px;" aria-hidden="true"></i>',
                                'visible' => '$data->admin_approval == 1',
                                'options' => array(
                                    'data-toggle' => 'tooltip',
                                    'title' => 'Not Approve'
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
