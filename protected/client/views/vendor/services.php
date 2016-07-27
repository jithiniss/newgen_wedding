

<section class="mynew">
    <div class="container">
        <div class="col-md-3">
            <?php
            $this->renderPartial('_leftSide', array('model' => $model));
            ?></div>
        <div class="col-md-9 mynewgenz actions">
            <h4>Add New</h4>
            <div class="zeros">
                <!--****-->
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'service-form',
                    'htmlOptions' => array('enctype' => 'multipart/form-data'),
                    // Please note: When you enable ajax validation, make sure the corresponding
                    // controller action is handling ajax validation correctly.
                    // There is a call to performAjaxValidation() commented in generated controller code.
                    // See class documentation of CActiveForm for details on this.
                    'enableAjaxValidation' => true,
                ));
                ?>
                <div class="strip" style="    padding-top: 22px;">

                    <div class="strip-padding">

                        <div class="common">
                            <div class="col-sm-3 col-xs-3 zeros">
                                <label for="textinput" class="control-label">Service Category<span class="required">*</span></label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-8 col-xs-8 zeros">
                                <div class="form-group">

                                    <?php echo CHtml::activeDropDownList($service, 'category_id', CHtml::listData(MasterServices::model()->findAllByAttributes(array('status' => 1)), 'id', 'name'), array('empty' => '--Please select--', 'class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>

                                    <?php echo $form->error($service, 'category_id');
                                    ?>
                                </div>
                            </div>

                        </div>
                        <div class="common">
                            <div class="col-sm-3 col-xs-3 zeros">
                                <label for="textinput" class="control-label">Service Name</label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-8 col-xs-8 zeros">
                                <div class="form-group" style="font-weight:bold;">

                                    <?php echo $form->textField($service, 'name', array('size' => 60, 'maxlength' => 200, 'class' => 'ui_apps')); ?>
                                    <?php echo $form->error($service, 'name'); ?>
                                </div>
                            </div>

                        </div>

                        <div class="common">
                            <div class="col-sm-3 col-xs-3 zeros">
                                <label for="textinput" class="control-label">Address</label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-8 col-xs-8 zeros">
                                <div class="form-group" style="font-weight:bold;">

                                    <?php echo $form->textArea($service, 'address', array('rows' => 6, 'cols' => 50, 'class' => 'ui_apps', 'style' => 'height: 100px;')); ?>
                                    <?php echo $form->error($service, 'address'); ?>
                                </div>
                            </div>

                        </div>

                        <div class="common">
                            <div class="col-sm-3 col-xs-3 zeros">
                                <label for="textinput" class="control-label">Description</label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-8 col-xs-8 zeros">
                                <div class="form-group" style="font-weight:bold;">

                                    <?php echo $form->textArea($service, 'description', array('rows' => 6, 'cols' => 50, 'class' => 'ui_apps', 'style' => 'height: 100px;')); ?>
                                    <?php echo $form->error($service, 'description'); ?>
                                </div>
                            </div>

                        </div>

                        <div class="common">
                            <div class="col-sm-3 col-xs-3 zeros">
                                <label for="textinput" class="control-label">Phone No</label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-8 col-xs-8 zeros">
                                <div class="form-group" style="font-weight:bold;">

                                    <?php echo $form->textField($service, 'phn_no', array('size' => 60, 'maxlength' => 200, 'class' => 'ui_apps')); ?>
                                    <?php echo $form->error($service, 'phn_no'); ?>
                                </div>
                            </div>

                        </div>
                        <div class="common">
                            <div class="col-sm-3 col-xs-3 zeros">
                                <label for="textinput" class="control-label">Email Id</label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-8 col-xs-8 zeros">
                                <div class="form-group" style="font-weight:bold;">

                                    <?php echo $form->textField($service, 'email', array('size' => 60, 'maxlength' => 200, 'class' => 'ui_apps')); ?>
                                    <?php echo $form->error($service, 'email'); ?>
                                </div>
                            </div>

                        </div>
                        <div class="common">
                            <div class="col-sm-3 col-xs-3 zeros">
                                <label for="textinput" class="control-label">Website</label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-8 col-xs-8 zeros">
                                <div class="form-group" style="font-weight:bold;">

                                    <?php echo $form->textField($service, 'website', array('size' => 60, 'maxlength' => 200, 'class' => 'ui_apps')); ?>
                                    <?php echo $form->error($service, 'website'); ?>
                                </div>
                            </div>

                        </div>


                        <div class="common">
                            <div class="col-sm-3 col-xs-3 zeros">
                                <label for="textinput" class="control-label">Map</label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-8 col-xs-8 zeros">
                                <div class="form-group" style="font-weight:bold;">

                                    <?php echo $form->textArea($service, 'map', array('rows' => 6, 'cols' => 50, 'class' => 'ui_apps', 'style' => 'height: 100px;')); ?>
                                    <?php echo $form->error($service, 'map'); ?>
                                </div>
                            </div>

                        </div>

                        <div class="common">
                            <div class="col-sm-3 col-xs-3 zeros">
                                <label for="textinput" class="control-label">Video</label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-8 col-xs-8 zeros">
                                <div class="form-group" style="font-weight:bold;">

                                    <?php echo $form->textField($service, 'video', array('size' => 60, 'maxlength' => 200, 'class' => 'ui_apps')); ?>
                                    <?php echo $form->error($service, 'video'); ?>
                                </div>
                            </div>

                        </div>
                        <div class="common">
                            <div class="col-sm-3 col-xs-3 zeros">
                                <label for="textinput" class="control-label">Facebook</label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-8 col-xs-8 zeros">
                                <div class="form-group" style="font-weight:bold;">

                                    <?php echo $form->textField($service, 'facebook', array('size' => 60, 'maxlength' => 200, 'class' => 'ui_apps')); ?>
                                    <?php echo $form->error($service, 'facebook'); ?>
                                </div>
                            </div>

                        </div>
                        <div class="common">
                            <div class="col-sm-3 col-xs-3 zeros">
                                <label for="textinput" class="control-label">Google Plus</label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-8 col-xs-8 zeros">
                                <div class="form-group" style="font-weight:bold;">

                                    <?php echo $form->textField($service, 'google_plus', array('size' => 60, 'maxlength' => 200, 'class' => 'ui_apps')); ?>
                                    <?php echo $form->error($service, 'google_plus'); ?>
                                </div>
                            </div>

                        </div>
                        <div class="common">
                            <div class="col-sm-3 col-xs-3 zeros">
                                <label for="textinput" class="control-label">Twitter</label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-8 col-xs-8 zeros">
                                <div class="form-group" style="font-weight:bold;">

                                    <?php echo $form->textField($service, 'twitter', array('size' => 60, 'maxlength' => 200, 'class' => 'ui_apps')); ?>
                                    <?php echo $form->error($service, 'twitter'); ?>
                                </div>
                            </div>

                        </div>
                        <div class="common">
                            <div class="col-sm-3 col-xs-3 zeros">
                                <label for="textinput" class="control-label">Linkedin</label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-8 col-xs-8 zeros">
                                <div class="form-group" style="font-weight:bold;">

                                    <?php echo $form->textField($service, 'linkdin', array('size' => 60, 'maxlength' => 200, 'class' => 'ui_apps')); ?>
                                    <?php echo $form->error($service, 'linkdin'); ?>
                                </div>
                            </div>

                        </div>
                        <div class="common">
                            <div class="col-sm-3 col-xs-3 zeros">
                                <label for="textinput" class="control-label">Image</label>
                            </div>
                            <div class="col-sm-1 col-xs-1 zeros">
                                <label for="textinput" class="control-label">:</label>
                            </div>
                            <div class="col-sm-8 col-xs-8 zeros">
                                <div class="form-group" style="font-weight:bold;">

                                    <?php echo $form->fileField($service, 'image', array('size' => 60, 'maxlength' => 200, 'class' => 'ui_apps')); ?>
                                    <?php echo $form->error($service, 'image'); ?>
                                    <?php
                                    if($service->image != '' && $service->id != "") {
                                            $folder = Yii::app()->Upload->folderName(0, 1000, $service->vendor_id);
                                            echo '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->baseUrl . '/uploads/vendor/' . $folder . '/' . $service->vendor_id . '/services/' . $service->id . '/' . $service->image . '" />';
                                    }
                                    ?>
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-3 col-xs-3 zeros  pull-right">
                            <button type="submit" class="btn sub-btn btn-default">Submit</button></div>




                    </div>
                </div>

                <?php $this->endWidget(); ?>

            </div>

        </div>
    </div>

</div>
</section>


