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
                <h1 style="float: left;" class="title">StaticPage</h1>
                <p style="float: left;margin-top: 8px;margin-left: 11px;" class="description">Manage StaticPage</p>
        </div>

        <div class="breadcrumb-env">

                <ol class="breadcrumb bc-1" >
                        <li>
                                <a href="<?php echo Yii::app()->request->baseurl . '/admin.php/site/home'; ?>"><i class="fa-home"></i>Home</a>
                        </li>

                        <li class="active">

                                <strong>Manage StaticPage</strong>
                        </li>
                </ol>

        </div>

</div>
<div class="row">


        <div class="col-sm-12">

                <a class="btn btn-secondary btn-icon btn-icon-standalone" href="<?php echo Yii::app()->request->baseurl . '/admin.php/staticPage/create'; ?>" id="add-note">
                        <i class="fa-pencil"></i>
                        <span>Add Static Page</span>
                </a>
                <div class="panel panel-default">
                        <?php
                        $this->widget('booster.widgets.TbGridView', array(
                            'type' => ' bordered condensed hover',
                            'id' => 'static-page-grid',
                            'dataProvider' => $model->search(),
                            'filter' => $model,
                            'columns' => array(
                                //'id',
                                'category_name',
                                /*    array('name' => 'parent',
                                  'filter' => CHtml::listData(StaticPage::model()->findAll(), 'id', 'category_name'),
                                  'value' => function($data) {
                                  return StaticPage::model()->findByPk($data->parent)->category_name;
                                  },
                                  ), */
                                //'side_menu',
                                //'header_visibility',
                                //'sort_order',
                                // 'has_page',
                                //'canonical_name',
                                // 'link',
                                'title',
                                'heading',
                                //'small_content',
                                //'big_content',
                                //'small_image',
                                //'banner',
                                //'big_image',
                                array('name' => 'status',
                                    'filter' => array(0 => 'Disabled', 1 => 'Enabled'),
                                    'value' => function($data) {
                                    if ($data->status == 1) {
                                            return 'Enabled';
                                    } else if ($data->status == 0) {
                                            return 'Disabled';
                                    }
                            },
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

