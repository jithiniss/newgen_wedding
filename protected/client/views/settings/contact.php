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
                    <li><a href="#">Account Settings</a></li>
                    <li><a href="#">Contact Filters</a></li>
                    <li><a href="#">Email / SMS Alerts</a></li>
                    <li><a href="#">Privacy Options</a></li>
                    <li><a href="#">Hide / Delete Profile</a></li>

                </ul>
            </div>
            <div class="col-md-9">
                <h4>My Account</h4>
                <div class="zeros">
                    <!--****-->
                    <div class="strip">
                        <div class="rel">
                            <div class="rel-1">
                                <h2>Contacts</h2>
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
                                <?php
                                if ($account->hasErrors()) {
                                        echo CHtml::errorSummary($account);
                                }
                                ?>
                                <!--                                    <div class="col-sm-3 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label">Email</label>
                                                                    </div>
                                                                    <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label">:</label>
                                                                    </div>
                                                                    <div class="col-sm-8 col-xs-8 zeros">
                                                                        <div class="form-group">
                                                                            <input type="text" class="ui_apps" id="email" value="<?php // echo $account->email                                 ?>">
                                                                        </div>
                                                                    </div>-->
                                <div class="col-sm-3 col-xs-3 zeros">
                                    <label for="textinput" class="control-label">Contact</label>
                                </div>
                                <div class="col-sm-1 col-xs-1 zeros">
                                    <label for="textinput" class="control-label">:</label>
                                </div>
                                <div class="col-sm-8 col-xs-8 zeros">
                                    <div class="form-group">
                                        <?php echo $form->textField($account, 'contact_number', array('size' => 60, 'maxlength' => 200, 'class' => 'ui_apps')); ?>
                                        <?php echo $form->error($account, 'contact_number'); ?>
                                    </div>
                                </div>
                                <?php echo CHtml::submitButton('Save', array('class' => 'btn btn-secondary btn-single pull-right', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
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