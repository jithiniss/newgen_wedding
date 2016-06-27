
<section class="login forgot">
        <div class="container">
                <div class="row">
                        <div class="col-md-12">

                                <div class="new_form">

                                        <?php if (Yii::app()->user->hasFlash('error')): ?>
                                                <div class="alert alert-danger">
                                                        <strong>Sorry!</strong><?php echo Yii::app()->user->getFlash('error'); ?>
                                                </div>
                                        <?php endif; ?>
                                        <h1>Forgot Password?</h1>
                                        <h2>Don't Worry!just fill in your email and we'll help your rest your password.</h2>
                                        <form role="form" action="<?php echo Yii::app()->request->baseUrl; ?>/index.php/ForgotPassword/index" method="post">
                                                <div class="form-group">

                                                        <input type="email" class="form-new" id="email" placeholder="Email" name="email">
                                                </div>

                                                <button type="submit" name="btn_submit" class="btn new-btn btn-default">Reset My Password</button>

                                        </form>
                                </div>
                        </div>
                </div>
        </div>
</section>

