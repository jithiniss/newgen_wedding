<div class="clearfix"></div>
<script type="text/javascript">
        $(document).ready(function () {
                $("#form1").submit(function () {
                        var pass1 = $('#password1').val();
                        var pass2 = $('#password2').val();
                        if (pass1 && pass2 != "") {
                                if (pass1 != pass2) {
                                        $('#password_error').text('password doesnot match');
                                        return false;
                                } else {
                                        $('#password_error').text('');
                                        return true;
                                }

                        }
                });
                $('.pass').keyup(function () {
                        var pass1 = $('#password1').val();
                        var pass2 = $('#password2').val();
                        if (pass1 && pass2 != "") {
                                if (pass1 != pass2) {
                                        $('#password_error').text('password doesnot match');
                                } else {
                                        $('#password_error').text('');
                                }

                        }

                });
        });
</script>
<section class="login forgot">
        <div class="container">
                <div class="row">
                        <div class="col-md-12">

                                <div class="new_form">
                                        <h1>Reset Your Password</h1>
                                        <?php if (Yii::app()->user->hasFlash('success')): ?>
                                                <div class="alert alert-success">
                                                        <strong>Success!</strong> <?php echo Yii::app()->user->getFlash('success'); ?>
                                                </div>
                                        <?php endif; ?>
                                        <?php if (Yii::app()->user->hasFlash('error')): ?>
                                                <div class="alert alert-danger">
                                                        <strong>Danger!</strong><?php echo Yii::app()->user->getFlash('error'); ?>
                                                </div>
                                        <?php endif; ?>

                                        <form action="<?php echo Yii::app()->request->baseUrl; ?>/index.php/ForgotPassword/Newpassword/" method="post" id="form1" name="form1">




                                                <div class="form-group">

                                                        <input type="password" class="form-new pass" id="password1" name="password1" required="required" placeholder="New Password">
                                                </div>
                                                <div class="form-group">
                                                        <input type="password" class="form-new pass" id="password2" name="password2" required="required" placeholder="Confirm Password">
                                                        <div id="password_error"></div>
                                                </div>

                                                <button type="submit"  name="btn_submit" class="btn new-btn btn-default">Reset my password</button>
                                                <!--<input type="submit" name="btn_submit" value="Reset my password" class="new-btn btn-default">-->
                                        </form>

                                </div>


                        </div>

                </div>




        </div>
</div>
</div>