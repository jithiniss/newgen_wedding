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

                                <!--<form action="action_page.php">-->
                                <div class="zeros">
                                        <!--****-->
                                        <div class="strip">
                                                <div class="rel">
                                                        <div class="rel-1">
                                                                <h2>Hide Your Account</h2>
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
                                                                        <label for="textinput" class="control-label">Hide</label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label">:</label>
                                                                </div>
                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                        <div class="form-group">
                                                                                <?php
                                                                                echo $form->dropDownList($model, 'hide_for', array('' => 'Hide For', '7' => '7 Days', '15' => '15 Days', '1mnth' => '1 month'), array('class' => 'ui_apps'));
                                                                                ?>
                                                                                <?php echo $form->error($model, 'hide_for'); ?>
                                                                        </div>
                                                                </div>
                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                        <label for="textinput" class="control-label">Reason For Hide</label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label">:</label>
                                                                </div>
                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                        <div class="form-group">
                                                                                <?php echo $form->textField($model, 'hide_reason', array('maxlength' => 50, 'class' => 'ui_apps')); ?>
                                                                                <?php echo $form->error($model, 'hide_reason'); ?>
                                                                        </div>
                                                                </div>
                                                                <?php echo CHtml::submitButton('Hide', array('class' => 'btn btn-secondary btn-single pull-right', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
                                                        </div>
                                                        <?php $this->endWidget(); ?>
                                                </div>

                                        </div>
                                        <div class="strip">
                                                <div class="rel">
                                                        <div class="rel-1">
                                                                <h2>Delete Your Account</h2>
                                                        </div>
                                                </div>
                                                <div class="strip-padding">
                                                        <form action="<?php echo Yii::app()->baseUrl ?>/index.php/Settings/DeleteAccount" method="post">

                                                                <div class="common">
                                                                        <div class="col-sm-4 col-xs-6 zeros">
                                                                                <label for="textinput" class="control-label">Do you want to delete your account?</label>
                                                                        </div>
                                                                        <div class="col-sm-4 col-xs-4 zeros"><?php echo $form->radioButtonList($model, 'status', array('1' => 'Yes', '2' => 'No'), array('class' => 'row'), array('name' => 'account_status')); ?>
                                                                        </div>
                                                                        <button type="submit" class="btn btn-secondary btn-single pull-right" style="border-radius:0px;padding: 10px 50px;" name="account_submit">Delete</button>
                                                                </div>
                                                        </form>
                                                </div>

                                        </div>

                                        <!--****-->

                                </div>
                                <!--</form>-->
                        </div>
                </div>

        </div>
</section>