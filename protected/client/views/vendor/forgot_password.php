
<section class="login forgot">
        <div class="container">
                <div class="row">
                        <div class="col-md-12">

                                <div class="new_form">


                                        <?php if (Yii::app()->user->hasFlash('success1')) { ?>
                                                <div>
                                                        <h4><?php echo Yii::app()->user->getFlash('success1'); ?></h4>
                                                        <?php echo Yii::app()->user->getFlash('success2'); ?>
                                                </div>
                                        <?php } else { ?>
                                                <h1>Forgot Password?</h1>
                                                <?php if (Yii::app()->user->hasFlash('error')): ?>
                                                        <div class="alert alert-danger">
                                                                <?php echo Yii::app()->user->getFlash('error'); ?>
                                                        </div>
                                                <?php endif; ?>

                                                <form role="form"  method="post">
                                                        <div class="form-group">

                                                                <input type="email" class="form-new" id="email" placeholder="Email" name="email">
                                                        </div>

                                                        <button type="submit" name="btn_submit" class="btn new-btn btn-default" style="margin-bottom: 0;">Reset My Password</button>

                                                </form>
                                                <h2>Don't Worry!just fill in your email and we'll help you reset your password.</h2>
                                        <?php } ?>
                                </div>
                        </div>
                </div>
        </div>
</section>

