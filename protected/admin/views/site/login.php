<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Xenon Boostrap Admin Panel" />
        <meta name="author" content="" />

        <title>NewGen-Wedding</title>

        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Arimo:400,700,400italic">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/theme/css/fonts/linecons/css/linecons.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/theme/css/fonts/fontawesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/theme/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/theme/css/xenon-core.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/theme/css/xenon-forms.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/theme/css/xenon-components.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/theme/css/xenon-skins.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/theme/css/custom.css">

        <script src="<?php echo Yii::app()->request->baseUrl; ?>/theme/js/jquery-1.11.1.min.js"></script>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->


    </head>
    <body class="page-body login-page">
        <style>
            .errorMessage{
                font-size: 14px;
                color: rgb(176, 0, 0);
                margin: 5px 11px;
            }
        </style>

        <div class="login-container">

            <div class="row">

                <div class="col-sm-6">

                    <script type="text/javascript">
                            jQuery(document).ready(function ($)
                            {
                                // Reveal Login form
                                setTimeout(function () {
                                    $(".fade-in-effect").addClass('in');
                                }, 1);


                                // Validation and Ajax action
                                $("form#login").validate({
                                    rules: {
                                        username: {
                                            required: true
                                        },
                                        passwd: {
                                            required: true
                                        }
                                    },
                                    messages: {
                                        username: {
                                            required: 'Please enter your username.'
                                        },
                                        passwd: {
                                            required: 'Please enter your password.'
                                        }
                                    },
                                    // Form Processing via AJAX
                                    submitHandler: function (form)
                                    {
                                        show_loading_bar(70); // Fill progress bar to 70% (just a given value)

                                        var opts = {
                                            "closeButton": true,
                                            "debug": false,
                                            "positionClass": "toast-top-full-width",
                                            "onclick": null,
                                            "showDuration": "300",
                                            "hideDuration": "1000",
                                            "timeOut": "5000",
                                            "extendedTimeOut": "1000",
                                            "showEasing": "swing",
                                            "hideEasing": "linear",
                                            "showMethod": "fadeIn",
                                            "hideMethod": "fadeOut"
                                        };

                                        $.ajax({
                                            url: "data/login-check.php",
                                            method: 'POST',
                                            dataType: 'json',
                                            data: {
                                                do_login: true,
                                                username: $(form).find('#username').val(),
                                                passwd: $(form).find('#passwd').val(),
                                            },
                                            success: function (resp)
                                            {
                                                show_loading_bar({
                                                    delay: .5,
                                                    pct: 100,
                                                    finish: function () {

                                                        // Redirect after successful login page (when progress bar reaches 100%)
                                                        if (resp.accessGranted)
                                                        {
                                                            window.location.href = 'dashboard-1.html';
                                                        }
                                                        else
                                                        {
                                                            toastr.error("You have entered wrong password, please try again. User and password is <strong>demo/demo</strong> :)", "Invalid Login!", opts);
                                                            $(form).find('#passwd').select();
                                                        }
                                                    }
                                                });

                                            }
                                        });

                                    }
                                });

                                // Set Form focus
                                $("form#login .form-group:has(.form-control):first .form-control").focus();
                            });
                    </script>

                    <!-- Errors container -->
                    <div class="errors-container">


                    </div>

                    <!-- Add class "fade-in-effect" for login form effect -->
                    <form method="post" role="form" id="login" class="login-form fade-in-effect">
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'rfp-rfq-form',
                            // Please note: When you enable ajax validation, make sure the corresponding
                            // controller action is handling ajax validation correctly.
                            // There is a call to performAjaxValidation() commented in generated controller code.
                            // See class documentation of CActiveForm for details on this.
                            'enableAjaxValidation' => true,
                            'htmlOptions' => array('enctype' => 'multipart/form-data', 'class' => "form-horizontal"),
                        ));
                        ?>
                        <div class="login-header">
                            <a href="dashboard-1.html" class="logo">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/admin-logo.png" alt="" width="80" />
                                <span>NewGen-Wedding Admin log in</span>
                            </a>

                            <p>Dear user, log in to access the admin area!</p>
                        </div>


                        <div class="form-group">
                            <?php echo $form->textField($model, 'user_name', array('size' => 60, 'maxlength' => 500, 'class' => "form-control input-dark", 'placeholder' => "User name", 'autocomplete' => "off")); ?>
                            <?php echo $form->error($model, 'user_name'); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->passwordField($model, 'password', array('size' => 60, 'maxlength' => 500, 'class' => "form-control input-dark", 'placeholder' => "Password", 'autocomplete' => "off")); ?>
                            <?php echo $form->error($model, 'password'); ?>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-dark  btn-block text-left" name="yt0">
                                <i class="fa-lock"></i>
                                Log In
                            </button>
                        </div>

                        <div class="login-footer">
                            <a href="#">Forgot your password?</a>

                            <div class="info-links">
                                <a href="#">ToS</a> -
                                <a href="#">Privacy Policy</a>
                            </div>

                        </div>

                    </form>

                    <!-- External login -->
                    <div class="external-login">
                        <!-- <a href="#" class="facebook">
                                <i class="fa-facebook"></i>
                                Facebook Login
                        </a>


                        <a href="<?php _hash(); ?>" class="twitter">
                                <i class="fa-twitter"></i>
                                Login with Twitter
                        </a>

                        <a href="<?php _hash(); ?>" class="gplus">
                                <i class="fa-google-plus"></i>
                                Login with Google Plus
                        </a>
                        -->
                    </div>

                </div>

            </div>

        </div>



        <!-- Bottom Scripts -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/theme/js/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/theme/js/TweenMax.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/theme/js/resizeable.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/theme/js/joinable.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/theme/js/xenon-api.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/theme/js/xenon-toggles.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/theme/js/jquery-validate/jquery.validate.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/theme/js/toastr/toastr.min.js"></script>


        <!-- JavaScripts initializations and stuff -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/theme/js/xenon-custom.js"></script>

    </body>
</html>