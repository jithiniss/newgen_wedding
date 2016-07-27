

<section class="mynew">
    <div class="container">
        <div class="col-md-3">
            <?php
            $this->renderPartial('_leftSide', array('model' => $model));
            ?></div>
        <div class="col-md-9 actions">
            <div class="col-sm-2 col-xs-2 zeros  pull-left">
                <?php echo CHtml::link('Add New Service', array('vendor/addNewService'), array('class' => 'btn sub-btn btn-default add_new')); ?>
            </div>
            <div class="zeros">
                <div class="strip" style="">
                    <?php
                    if(!empty($services)) {
                            foreach($services as $service) {
                                    ?>
                                    <div  style="    min-height: 178px;
                                          border-bottom: 1px solid #d2d2d2;padding-top:20px;padding-bottom:20px;
                                          ">
                                              <?php
                                              if($service->image != '') {
                                                      $folder = Yii::app()->Upload->folderName(0, 1000, $service->vendor_id);
                                                      echo '<img width="125" style="border: 2px solid #d2d2d2;float:left;    margin: 16px;margin-top: 0;" src="' . Yii::app()->baseUrl . '/uploads/vendor/' . $folder . '/' . $service->vendor_id . '/services/' . $service->id . '/' . $service->image . '" />';
                                              }
                                              ?>
                                        <p style="    text-align: justify;
                                           padding: 19px;
                                           padding-top: 0;"><?php echo $service->description; ?>
                                            <?php echo CHtml::link('Edit', array('vendor/updateService', 'id' => $service->id), array('class' => 'btn btn-link')); ?>
                                        </p>
                                    </div>
                                    <?php
                            }
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>

</div>
</section>


