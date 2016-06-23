<section class="login">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="new_form">
                    <h1>Login</h1>
                    <?php if(Yii::app()->user->hasFlash('login_error')): ?>
                            <div class="alert alert-danger login_error">
                                <?php echo Yii::app()->user->getFlash('login_error'); ?>
                            </div>
                    <?php endif; ?>
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
                    <div class="form-group">
                        <?php echo $form->textField($login, 'email', array('size' => 60, 'maxlength' => 100, 'class' => 'form-new', 'placeholder' => 'Enter Your Email Address or NEWGEN UserID')); ?>
                        <?php echo $form->error($login, 'email'); ?>

                    </div>
                    <div class="form-group">

                        <?php echo $form->passwordField($login, 'password', array('size' => 60, 'maxlength' => 100, 'class' => 'form-new', 'placeholder' => 'Enter Your NEWGEN Password')); ?>
                        <?php echo $form->error($login, 'password'); ?>
                    </div>

                    <button type="submit" class="btn new-btn btn-default">Submit</button>

                    <?php $this->endWidget(); ?>

                    <div class="col-md-6 col-sm-6 col-xs-6 padd">
                        <a class="forgot" href="#">Forgot Password</a>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-6 padd">

                        <a class="new">New to Newgen</a>
                        <?php echo CHtml::link('Sign Up Free', array('register/FirstStep'), array('class' => 'free')); ?>

                    </div>



                </div>
            </div>
        </div>
    </div>
</section>
