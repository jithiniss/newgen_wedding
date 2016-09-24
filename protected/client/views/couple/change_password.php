
<section class="mynew">
        <div class="container">
                <div class="row">
                        <?php
                        $this->renderPartial('_leftSide', array('model' => $model));
                        ?>
                        <div class="col-md-9 mynewgenz actions">
                                <div class="zeros">
                                        <h4>My Profile Details</h4>
                                        <?php
                                        $form = $this->beginWidget('CActiveForm', array(
                                            'id' => 'couple-details-accountsettings-form',
                                            'htmlOptions' => array('enctype' => 'multipart/form-data'),
                                            // Please note: When you enable ajax validation, make sure the corresponding
                                            // controller action is handling ajax validation correctly.
                                            // See class documentation of CActiveForm for details on this,
                                            // you need to use the performAjaxValidation()-method described there.
                                            'enableAjaxValidation' => false,
                                        ));
                                        ?>
                                        <div class="strip" style="    padding-top: 22px;">
                                                <div class="strip-padding">
                                                        <?php if (Yii::app()->user->hasFlash('success')): ?>
                                                                <div class="alert alert-success">
                                                                        <?php echo Yii::app()->user->getFlash('success'); ?>
                                                                </div>
                                                        <?php endif; ?>
                                                        <?php if (Yii::app()->user->hasFlash('error')): ?>
                                                                <div class="alert alert-danger">
                                                                        <?php echo Yii::app()->user->getFlash('error'); ?>
                                                                </div>
                                                        <?php endif; ?>
                                                        <?php if (Yii::app()->user->hasFlash('pass_error')): ?>
                                                                <div class="alert alert-danger">
                                                                        <?php echo Yii::app()->user->getFlash('pass_error'); ?>
                                                                </div>
                                                        <?php endif; ?>
                                                        <div class="common">
                                                                <form  method="post"  action="<?= Yii::app()->baseUrl . '/index.php/couple/ChangePassword' ?>" id="form1" class="chng_pass_frm">

                                                                        <div class="chnge_passwrd">
                                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                                        <label for="textinput" class="control-label">Current Password</label>
                                                                                </div>
                                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                                        <label for="textinput" class="control-label">:</label>
                                                                                </div>
                                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                                        <div class="form-group">
                                                                                                <input  class="ui_apps" type="password" name="current_pass" required="true" id="current" placeholder="Current Password">
                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                        <div class="chnge_passwrd">
                                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                                        <label for="textinput" class="control-label">New Password</label>
                                                                                </div>
                                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                                        <label for="textinput" class="control-label">:</label>
                                                                                </div>
                                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                                        <div class="form-group">
                                                                                                <input  class="ui_apps pass" type="password" name="new_password" id="password1" required="true" placeholder="New Password">
                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                        <div  class="chnge_passwrd">
                                                                                <div class="col-sm-3 col-xs-3 zeros">
                                                                                        <label for="textinput" class="control-label">Confirm Password</label>
                                                                                </div>
                                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                                        <label for="textinput" class="control-label">:</label>
                                                                                </div>
                                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                                        <div class="form-group">
                                                                                                <input  class="ui_apps pass" type="password" name="confirm_pass" id="password2" required="true" placeholder="Re-enter Password">
                                                                                                <div id="password_error"></div>
                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                        <div class="col-sm-4 col-xs-4 zeros">
                                                                                <button type="submit" name="CoupleDetail" class="btn sub-btn btn-default">Submit</button>
                                                                        </div>

                                                                </form>
                                                        </div>


                                                </div>
                                        </div>

                                        <?php $this->endWidget(); ?>

                                        <!-- form -->
                                </div>
                        </div>
                        </section>


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
