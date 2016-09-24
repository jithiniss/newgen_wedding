
<section class="login">
        <div class="container">
                <div class="row">
                        <div class="col-md-12">

                                <div class="new_form">
                                        <h1>Couple Login</h1>
                                        <?php
                                        $form = $this->beginWidget('CActiveForm', array(
                                            'id' => 'login-form',
                                            // Please note: When you enable ajax validation, make sure the corresponding
                                            // controller action is handling ajax validation correctly.
                                            // There is a call to performAjaxValidation() commented in generated controller code.
                                            // See class documentation of CActiveForm for details on this.
                                            'enableAjaxValidation' => false,
                                        ));
                                        ?>
                                        <?php if (Yii::app()->user->hasFlash('login_error')): ?>
                                                <div class="alert alert-danger ">
                                                        <?php echo Yii::app()->user->getFlash('login_error'); ?>
                                                </div>
                                        <?php endif; ?>
                                        <?php if (Yii::app()->user->hasFlash('login_list')): ?>
                                                <div class="alert alert-danger ">
                                                        <?php echo Yii::app()->user->getFlash('login_list'); ?>
                                                </div>
                                        <?php endif; ?>
                                        <div class="form-group">
                                                <?php echo $form->textField($model, 'bride_id', array('size' => 60, 'maxlength' => 100, 'class' => 'form-new', 'placeholder' => 'Bride ID')); ?>
                                                <?php echo $form->error($model, 'bride_id'); ?>

                                        </div>
                                        <div class="form-group">

                                                <?php echo $form->textField($model, 'groom_id', array('size' => 60, 'maxlength' => 100, 'class' => 'form-new', 'placeholder' => 'Groom ID')); ?>
                                                <?php echo $form->error($model, 'groom_id'); ?>
                                        </div>
                                        <div class="form-group">

                                                <?php echo $form->passwordField($model, 'couple_password', array('size' => 60, 'maxlength' => 100, 'class' => 'form-new', 'placeholder' => 'Couple Password')); ?>
                                                <?php echo $form->error($model, 'couple_password'); ?>
                                        </div>

                                        <button type="submit" class="btn new-btn btn-default">Submit</button>

                                        <?php $this->endWidget(); ?>

                                        <div class="col-md-6 col-sm-6 col-xs-6 padd">
                                                <?php echo CHtml::link('Forgot Password', array('Couple/forgotpassword'), array('class' => 'forgot')); ?>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-6 padd">

                                                <a class="new">New to Newgen</a>
                                                <?php echo CHtml::link('Sign Up Free', array('Couple/Register'), array('class' => 'free')); ?>

                                        </div>



                                </div>
                        </div>
                </div>
        </div>
</section>
