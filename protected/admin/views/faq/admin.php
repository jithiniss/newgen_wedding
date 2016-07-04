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
                <h1 style="float: left;" class="title">FAQ</h1>
                <p style="float: left;margin-top: 8px;margin-left: 11px;" class="description">Manage StaticPage</p>
        </div>

        <div class="breadcrumb-env">

                <ol class="breadcrumb bc-1" >
                        <li>
                                <a href="<?php echo Yii::app()->request->baseurl . '/admin.php/site/home'; ?>"><i class="fa-home"></i>Home</a>
                        </li>

                        <li class="active">

                                <strong>Manage FAQ</strong>
                        </li>
                </ol>

        </div>

</div>
<div class="row">


        <div class="col-sm-12">

                <a class="btn btn-secondary btn-icon btn-icon-standalone" href="<?php echo Yii::app()->request->baseurl . '/admin.php/faq/create'; ?>" id="add-note">
                        <i class="fa-pencil"></i>
                        <span>Add FAQ</span>
                </a>
                <div class="panel panel-default">
                        <?php
                        $this->widget('zii.widgets.grid.CGridView', array(
                            'id' => 'faq-grid',
                            'dataProvider' => $model->search(),
                            'filter' => $model,
                            'columns' => array(
                                'id',
                                'question',
                                'answer',
                                // 'cb',
                                //  'dou',
                                array(
                                    'class' => 'CButtonColumn',
                                ),
                            ),
                        ));
                        ?>
                </div>

        </div>


</div>

