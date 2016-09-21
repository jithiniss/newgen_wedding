

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

                <a class="btn btn-secondary btn-icon btn-icon-standalone" href="<?php echo Yii::app()->request->baseurl . '/admin.php/enquiry/create'; ?>" id="add-note">
                        <i class="fa-pencil"></i>
                        <span>Add Contacts</span>
                </a>
                <div class="panel panel-default">
                        <?php
                        Yii::app()->clientScript->registerScript('search', "
            $('.search-button').click(function(){
            $('.search-form').toggle();
            return false;
            });
            $('.search-form form').submit(function(){
            $('#user-details-grid').yiiGridView('update', {
            data: $(this).serialize()
            });
            return false;
            });
            ");
                        ?>

                        <?php
                        $this->widget('booster.widgets.TbGridView', array(
                            'id' => 'enquiry-grid',
                            'dataProvider' => $model->search(),
                            'filter' => $model,
                            'columns' => array(
//                                'id',
                                'name',
                                'subject',
                                'mobile',
                                'email',
                                'message',
                                array(
                                    'htmlOptions' => array('nowrap' => 'nowrap'),
                                    'class' => 'booster.widgets.TbButtonColumn',
                                    'template' => '{update}{delete}{view}',
                                ),
                            ),
                        ));
                        ?>
                </div>
        </div>
</div>
