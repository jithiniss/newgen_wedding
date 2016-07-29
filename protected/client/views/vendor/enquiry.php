
<link href="<?= Yii::app()->baseUrl ?>/css/new.css" rel="stylesheet">
<section class="vendors">
    <div class="container">



        <div class="row">

            <?php
            $this->renderPartial('_leftSide', array('model' => $model));
            ?>



            <div class="col-md-9">

                <div class="vendormy case-box-main">
                    <?php
                    if(!empty($enquiry)) {
                            foreach($enquiry as $enquirys) {
                                    ?>
                                    <div class="vendor_1">

                                        <?php
                                        if($service->image != '') {
                                                $folder = Yii::app()->Upload->folderName(0, 1000, $service->vendor_id);
                                                $servicePic = explode('.', $service->image);
                                                echo '<img class="ven" src="' . Yii::app()->baseUrl . '/uploads/vendor/' . $folder . '/' . $service->vendor_id . '/services/' . $service->id . '/' . $servicePic[0] . '_194_136.' . $servicePic[1] . '" />';
                                        }
                                        ?>

                                        <p><?php echo $service->description; ?>

                                        </p>
                                        <?php echo CHtml::link('Edit >>', array('vendor/updateService', 'id' => $service->id), array('class' => 'btn btn-link pull-right')); ?>

                                    </div>


                                    <?php
                            }
                    }
                    ?>

                </div>
            </div>







        </div>

    </div>
</section>



