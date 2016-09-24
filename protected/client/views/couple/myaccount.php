

<link href="<?= Yii::app()->baseUrl ?>/css/new.css" rel="stylesheet">
<section class="vendors">
        <div class="container">



                <div class="row">

                        <?php
                        $this->renderPartial('_leftSide', array('model' => $model));
                        ?>



                        <div class="col-md-9">
                                <?php echo CHtml::link('Add New', array('vendor/addNewService'), array('class' => 'connect-86')); ?>

                                <div class="vendormy case-box-main">


                                </div>
                        </div>







                </div>

        </div>
</section>



