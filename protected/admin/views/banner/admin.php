<?php
/* @var $this BannerController */
/* @var $model Banner */
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
                <h1 style="float: left;" class="title">Banner</h1>
                <p style="float: left;margin-top: 8px;margin-left: 11px;" class="description">Manage Banner</p>
        </div>

        <div class="breadcrumb-env">

                <ol class="breadcrumb bc-1" >
                        <li>
                                <a href="<?php echo Yii::app()->request->baseurl . '/admin.php/site/home'; ?>"><i class="fa-home"></i>Home</a>
                        </li>

                        <li class="active">

                                <strong>Manage Banner</strong>
                        </li>
                </ol>

        </div>

</div>
<div class="row">


        <div class="col-sm-12">

                <a class="btn btn-secondary btn-icon btn-icon-standalone" href="<?php echo Yii::app()->request->baseurl . '/admin.php/banner/create'; ?>" id="add-note">
                        <i class="fa-pencil"></i>
                        <span>Add Banner</span>
                </a>
                <div class="panel panel-default">
                        <?php
                        $this->widget('booster.widgets.TbGridView', array(
                            'type' => ' bordered condensed hover',
                            'id' => 'banner-grid',
                            'dataProvider' => $model->search(),
                            'filter' => $model,
                            'columns' => array(
                                'id',
                                'page',
                                'banner',
                                /* 'image',
                                  'cb',
                                  'ub',

                                  'doc',
                                  'dou',
                                 */
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

