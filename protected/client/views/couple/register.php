<?php
/* @var $this CoupleDetailsController */
/* @var $model CoupleDetails */
/* @var $form CActiveForm */
?>

<section class="login">
        <div class="container wishes">
                <div class="row">
                        <div class="col-md-12 ">

                                <?php
                                $form = $this->beginWidget('CActiveForm', array(
                                    'id' => 'couple-details-register-form',
                                    // Please note: When you enable ajax validation, make sure the corresponding
                                    // controller action is handling ajax validation correctly.
                                    // See class documentation of CActiveForm for details on this,
                                    // you need to use the performAjaxValidation()-method described there.
                                    'enableAjaxValidation' => false,
                                ));
                                ?>

                                <div class="col-md-8 col-sm-12 col-xs-12 prime">


                                        <h1>Couple Register</h1>

                                        <div class="zeros">
                                                <?php if (Yii::app()->user->hasFlash('register_error1')): ?>
                                                        <div class="alert alert-danger">
                                                                <?php echo Yii::app()->user->getFlash('register_error1'); ?>
                                                        </div>
                                                <?php endif; ?>
                                                <?php if (Yii::app()->user->hasFlash('error')): ?>
                                                        <div class="alert alert-danger">
                                                                <?php echo Yii::app()->user->getFlash('error'); ?>
                                                        </div>
                                                <?php endif; ?>
                                                <?php if (Yii::app()->user->hasFlash('success')): ?>
                                                        <div class="alert alert-success">
                                                                <?php echo Yii::app()->user->getFlash('success'); ?>
                                                        </div>
                                                <?php endif; ?>
                                                <div class="common">

                                                        <div class="col-sm-3 col-xs-3 zeros">
                                                                <label for="textinput" class="control-label"><?php echo $form->labelEx($model, 'couple_name'); ?></label>
                                                        </div>
                                                        <div class="col-sm-1 col-xs-1 zeros">
                                                                <label for="textinput" class="control-label">:</label>
                                                        </div>
                                                        <div class="col-sm-8 col-xs-8 zeros">
                                                                <div class="form-group">
                                                                        <?php echo $form->textField($model, 'couple_name', array('class' => 'ui_apps', 'placeholder' => 'Couple Name')); ?>
                                                                        <?php echo $form->error($model, 'couple_name'); ?>
                                                                </div>
                                                        </div>

                                                </div>
                                                <div class="common">
                                                        <div class="col-sm-3 col-xs-3 zeros">
                                                                <label for="textinput" class="control-label"><?php echo $form->labelEx($model, 'bride_id'); ?> </label>
                                                        </div>
                                                        <div class="col-sm-1 col-xs-1 zeros">
                                                                <label for="textinput" class="control-label">:</label>
                                                        </div>
                                                        <div class="col-sm-8 col-xs-8 zeros">
                                                                <div class="form-group">
                                                                        <?php echo $form->textField($model, 'bride_id', array('class' => 'ui_apps', 'placeholder' => 'Bride ID')); ?>
                                                                        <?php echo $form->error($model, 'bride_id'); ?>
                                                                </div>
                                                        </div>

                                                </div>
                                                <div class="common">
                                                        <div class="col-sm-3 col-xs-3 zeros">
                                                                <label for="textinput" class="control-label"><?php echo $form->labelEx($model, 'bride_password'); ?> </label>
                                                        </div>
                                                        <div class="col-sm-1 col-xs-1 zeros">
                                                                <label for="textinput" class="control-label">:</label>
                                                        </div>
                                                        <div class="col-sm-8 col-xs-8 zeros">
                                                                <div class="form-group">
                                                                        <?php echo $form->textField($model, 'bride_password', array('class' => 'ui_apps', 'placeholder' => 'Bride Password')); ?>
                                                                        <?php echo $form->error($model, 'bride_password'); ?>
                                                                </div>
                                                        </div>

                                                </div>
                                                <div class="common">
                                                        <div class="col-sm-3 col-xs-3 zeros">
                                                                <label for="textinput" class="control-label"><?php echo $form->labelEx($model, 'groom_id'); ?> </label>
                                                        </div>
                                                        <div class="col-sm-1 col-xs-1 zeros">
                                                                <label for="textinput" class="control-label">:</label>
                                                        </div>
                                                        <div class="col-sm-8 col-xs-8 zeros">
                                                                <div class="form-group">
                                                                        <?php echo $form->textField($model, 'groom_id', array('class' => 'ui_apps', 'placeholder' => 'Groom ID')); ?>
                                                                        <?php echo $form->error($model, 'groom_id'); ?>
                                                                </div>
                                                        </div>

                                                </div>
                                                <div class="common">
                                                        <div class="col-sm-3 col-xs-3 zeros">
                                                                <label for="textinput" class="control-label"><?php echo $form->labelEx($model, 'groom_password'); ?> </label>
                                                        </div>
                                                        <div class="col-sm-1 col-xs-1 zeros">
                                                                <label for="textinput" class="control-label">:</label>
                                                        </div>
                                                        <div class="col-sm-8 col-xs-8 zeros">
                                                                <div class="form-group">
                                                                        <?php echo $form->textField($model, 'groom_password', array('class' => 'ui_apps', 'placeholder' => 'Groom Password')); ?>
                                                                        <?php echo $form->error($model, 'groom_password'); ?>
                                                                </div>
                                                        </div>

                                                </div>
                                                <div class="common">
                                                        <div class="col-sm-3 col-xs-3 zeros">
                                                                <label for="textinput" class="control-label"><?php echo $form->labelEx($model, 'couple_password'); ?> </label>
                                                        </div>
                                                        <div class="col-sm-1 col-xs-1 zeros">
                                                                <label for="textinput" class="control-label">:</label>
                                                        </div>
                                                        <div class="col-sm-8 col-xs-8 zeros">
                                                                <div class="form-group">
                                                                        <?php echo $form->textField($model, 'couple_password', array('class' => 'ui_apps', 'placeholder' => 'Couple Password')); ?>
                                                                        <?php echo $form->error($model, 'couple_password'); ?>
                                                                </div>
                                                        </div>

                                                </div>
                                                <div class="common">
                                                        <div class="col-sm-3 col-xs-3 zeros">
                                                                <label for="textinput" class="control-label"><?php echo $form->labelEx($model, 'confirm_password'); ?> </label>
                                                        </div>
                                                        <div class="col-sm-1 col-xs-1 zeros">
                                                                <label for="textinput" class="control-label">:</label>
                                                        </div>
                                                        <div class="col-sm-8 col-xs-8 zeros">
                                                                <div class="form-group">
                                                                        <?php echo $form->textField($model, 'confirm_password', array('class' => 'ui_apps', 'placeholder' => 'Confirm Password')); ?>
                                                                        <?php echo $form->error($model, 'confirm_password'); ?>
                                                                </div>
                                                        </div>

                                                </div>



                                                <div class="common tops">
                                                        <div class="col-sm-8 col-xs-8 zeros">
                                                                <input type="checkbox" required="true" name="vehicle" value="Car" id="register_agree"> &nbsp; &nbsp; I agree to the <a class="privacy" href="#">Privacy Policy</a> and <a class="privacy" href="#">T&C</a>
                                                                <div id="agrees"></div>
                                                        </div>
                                                        <div class="col-sm-4 col-xs-4 zeros">

                                                                <button  type="submit" id="firststep"  class="btn sub-btn btn-default">Submit</button>
                                                        </div>
                                                </div>

                                                <?php $this->endWidget(); ?>

                                        </div><!-- form -->
                                </div>
                        </div>
                        </section>