<style>
    .slick-dots li{
        background-color: transparent;
    }
</style>
<section class="religion">
    <div class="container">
        <div class="row">

            <div class="col-md-3 newgens">
                <h3>Settings</h3>
                <ul class="list-unstyled">
                    <?php
                    $this->renderPartial('_leftSideSettings');
                    ?>

                </ul>
            </div>
            <div class="col-md-9">
                <h4>My Account</h4>
                <div class="zeros">
                    <!--****-->
                    <div class="strip">
                        <div class="rel">
                            <div class="rel-1">
                                <h2>Address</h2>
                            </div>


                        </div>
                        <div class="strip-padding">

                            <?php
                            $form = $this->beginWidget('CActiveForm', array(
                                'id' => 'userdetails-form',
                                // Please note: When you enable ajax validation, make sure the corresponding
                                // controller action is handling ajax validation correctly.
                                // There is a call to performAjaxValidation() commented in generated controller code.
                                // See class documentation of CActiveForm for details on this.
                                'enableAjaxValidation' => false,
                            ));
                            ?>
                            <div class="common">

                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">Address</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-label">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <div class="form-group">
                                        <?php echo $form->textArea($account, 'address', array('class' => 'ui_apps', 'style' => 'width: 450px; height: 80px;')); ?>
                                        <?php echo $form->error($account, 'address'); ?>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">Country <span class="required">*</span></label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-label">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <div class="form-group">
                                        <?php echo CHtml::activeDropDownList($account, 'country', CHtml::listData(MasterCountry::model()->findAllByAttributes(array('status' => 1)), 'id', 'country'), array('empty' => '--Please select--', 'class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                        <?php echo $form->error($account, 'country'); ?>

                                    </div>
                                </div>

                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">State <span class="required">*</span></label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-label">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <div class="form-group">
                                        <?php
                                        $state_options = array();
                                        if ($account->country != '') {
                                                $states = MasterState::model()->findAllByAttributes(array('country_id' => $account->country));
                                                if (!empty($states)) {
                                                        $state_options[""] = "--Select--";
                                                        foreach ($states as $state) {
                                                                $state_options[$state->id] = $state->state;
                                                        }
                                                } else {
                                                        $state_options[""] = "--Select--";
                                                        $state_options[0] = "Other";
                                                }
                                        } else {
                                                $state_options[""] = '--select--';
                                        }
                                        ?>
                                        <?php echo CHtml::activeDropDownList($account, 'state', $state_options, array('class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                        <?php echo $form->error($account, 'state'); ?>
                                    </div>
                                </div>



                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">City <span class="required">*</span></label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-label">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <div class="form-group">

                                        <?php
                                        $city_options = array();
                                        if ($account->state != '') {
                                                $cities = MasterState::model()->findAllByAttributes(array('country_id' => $account->state));
                                                if (!empty($cities)) {
                                                        $city_options[""] = "Select";
                                                        foreach ($cities as $city) {
                                                                $city_options[$city->id] = $city->city;
                                                        }
                                                } else {
                                                        $city_options[""] = "Select";
                                                        $city_options[0] = "Other";
                                                }
                                        } else {
                                                $city_options[""] = 'Select';
                                        }
                                        ?>
                                        <?php echo CHtml::activeDropDownList($account, 'city', $city_options, array('class' => 'aps', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                        <?php echo $form->error($account, 'city'); ?>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">Pin/Zip Code</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-label">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <div class="form-group">
                                        <?php echo $form->textfield($account, 'zip_code', array('class' => 'ui_apps')); ?>
                                        <?php echo $form->error($account, ' zip_code'); ?>
                                    </div>
                                </div>
                                <?php echo CHtml::submitButton('Save ', array('class' => 'btn btn-secondary btn-single pull-right', 'style' => 'border-radius:0px;
                                                padding: 10px 50px;
                                                 ')); ?>
                            </div>
                            <?php $this->endWidget(); ?>
                        </div>
                    </div>
                    <!--****-->
                </div>
            </div>
        </div>
    </div>
</section>