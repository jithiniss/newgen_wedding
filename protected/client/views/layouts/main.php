<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/admin-logo1.png" type="image/x-icon">
        <title>NewGen-Wedding</title>

        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>
        <link href="<?= Yii::app()->baseUrl ?>/css/font-awesome.min.css" rel="stylesheet">
<!--        <link href="<?= Yii::app()->baseUrl ?>/css/bootstrap.min.css" rel="stylesheet">-->
        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->baseUrl ?>/css/simpleMobileMenu.css" />
        <link href="<?= Yii::app()->baseUrl ?>/css/style.css" rel="stylesheet">
        <link href="<?= Yii::app()->baseUrl ?>/css/custom.css" rel="stylesheet">
        <link href="<?= Yii::app()->baseUrl ?>/css/chat.css" rel="stylesheet">
        <link href="<?= Yii::app()->baseUrl ?>/css/slick.css" rel="stylesheet">
        <link href="<?= Yii::app()->baseUrl ?>/css/slick-theme.css" rel="stylesheet">
        <script>
                var baseurl = "<?php print Yii::app()->request->baseUrl . "/index.php/"; ?>";
                var basepath = "<?php print Yii::app()->basePath; ?>";
        </script>
        <script src="<?= Yii::app()->baseUrl ?>/js/custom.js"></script>

        <style>
            #mask {
                background-color: #e4007d;
                bottom: 0;
                height: 100%;
                left: 0;
                position: fixed;
                right: 0;
                top: 0;
                z-index: 100000;
            }

            #loader {
                background-image: url(<?= Yii::app()->baseUrl ?>/images/loader.gif);
                background-position: center center;
                background-repeat: no-repeat;
                height: 200px;
                left: 50%;
                margin: -100px 0 0 -100px;
                position: absolute;
                top: 50%;
                width: 200px;
            }

            .dropup {
                position: fixed;
                width: 100%;
                margin: 0 auto;
                z-index: 200000;
                top: 0;
                box-shadow: 1px 1px 11px 1px rgba(0, 0, 0, 0.26);
            }

        </style>




    </head>

    <body id="home-1">
        <?php if(!isset(Yii::app()->session['vendor']) && Yii::app()->session['vendor'] == '') { ?>
                <div id="mask">
                    <div id="loader">
                    </div>
                </div>

        <?php } ?>



        <div id="static_cnt" class="">
            <section class="main-head-2">
                <div class="container">
                    <div class="row">
                        <div class="hidden-xs hidden-sm">
                            <div class="col-md-2 col-sm-4">
                                <div class="dropdown">
                                    <?php echo CHtml::link('<img class="bars" src="' . Yii::app()->baseUrl . '/images/logo.png">', array('site/index')); ?>

                                    <ul class="dropdown-menu categories">
                                        <li><a href="#">menu 1</a></li>
                                        <li><a href="#">menu 2</a></li>
                                        <li><a href="#">menu 3</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-10 col-sm-8">
                                <nav class="navbar navbar-inverse">
                                    <div class="nop">
                                        <ul class="nav navbar-nav">
                                            <?php if(!isset(Yii::app()->session['vendor']) && Yii::app()->session['vendor'] == '') { ?>
                                                    <li class="active"><?php echo CHtml::link('Home', array('site/index')); ?></li>
                                                    <li><?php echo CHtml::link('Wedding Planner', array('weddingPlanner/index')); ?></li>

                                                    <li><?php echo CHtml::link('Membership Plans', array('site/index', '#' => 'upgrade')); ?></li>
                                                    <li><?php echo CHtml::link('Search', array('Search/index')); ?></li>
                                                    <li><a href="#">Contact Us</a></li>
                                                    <li class="colors"><a href="#">Couples</a></li>
                                            <?php } ?>
                                            <?php
                                            if(isset(Yii::app()->session['user']) && Yii::app()->session['user'] != '') {
                                                    if(Yii::app()->session['user']['register_step'] == 4 || Yii::app()->session['user']['register_step'] == 5) {
                                                            ?>
                                                            <li class="colors">
                                                                <?php echo CHtml::link('<i class="fa locks fa-user"></i>Hi, ' . Yii::app()->session['user']['first_name'], array('Myaccount/Index')); ?></li>

                                                            <?php
                                                    } else {
                                                            ?>
                                                            <li class="colors"><a ><i class="fa locks fa-user"></i>Hi, <?php echo Yii::app()->session['user']['first_name']; ?></a></li>

                                                            <?php
                                                    }
                                                    ?>

                                                    <li class="colors"> <?php echo CHtml::link('<i class="fa locks fa-lock"></i>Log Out', array('site/logout')); ?></li>
                                            <?php } else if(isset(Yii::app()->session['vendor']) && Yii::app()->session['vendor'] != '') { ?>
                                                    <li class="colors">
                                                        <?php echo CHtml::link('<i class="fa locks fa-user"></i>Hi, ' . Yii::app()->session['vendor']['first_name'] . ' ' . Yii::app()->session['vendor']['last_name'], array('vendor/index')); ?></li>

                                                    <li class="colors"> <?php echo CHtml::link('<i class="fa locks fa-lock"></i>Log Out', array('vendor/logout')); ?></li>

                                                    <?php
                                            } else {
                                                    ?>
                                                    <li class="colors"> <?php echo CHtml::link('<i class="fa locks fa-lock"></i>Vendor', array('vendor/index')); ?></li>
                                                    <li class="colors"> <?php echo CHtml::link('<i class="fa locks fa-lock"></i>Login', array('site/login')); ?></li>
                                                    <li class="colors"> <?php echo CHtml::link('<i class="fa locks fa-user-plus"></i>Register', array('register/FirstStep')); ?></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navigation visible-xs visible-sm">
                    <div class="col-md-12">
                        <nav>
                            <a href="index.php"><img class="bars" src="<?= Yii::app()->baseUrl ?>/images/logo.png"></a>
                            <a href="javascript:void(0)" class="smobitrigger ion-navicon-round"><span><i class="fa fa-align-justify"></i></span></a>
                            <ul class="mobimenu">

                                <div id="cssmenu">
                                    <ul>
                                        <li> <div id="custom-search-input">
                                                <div class="input-group col-md-12">
                                                    <input type="text" class="form-control input-lg" placeholder="Search" />
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-info btn-lg" type="button">
                                                            <i class="glyphicon glyphicon-search"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div></li>
                                        <li><a href="index.html"><span>Home</span></a></li>
                                        <li><a href="<?= Yii::app()->baseUrl ?>/index.php/site/about"><span>About Us</span></a></li>
                                        <li><a href="#"><span>Products</span></a></li>
                                        <li><a href="#"><span>Offers & Deals</span></a></li>
                                        <li class="has-sub"><a href="#"><span>categories</span></a>
                                            <ul>
                                                <li><a href="#"><span>Sub</span></a></li>
                                                <li><a href="#"><span>Sub</span></a></li>
                                                <li><a href="#"><span>Sub</span></a></li>
                                                <li><a href="#"><span>Sub</span></a></li>
                                            </ul>
                                        </li>
                                        <li class="has-sub"><a href="#"><span>categories</span></a>
                                            <ul>
                                                <li><a href="#"><span>Sub</span></a></li>
                                                <li><a href="#"><span>Sub</span></a></li>
                                                <li><a href="#"><span>Sub</span></a></li>
                                                <li><a href="#"><span>Sub</span></a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#"><span>categories</span></a></li>
                                        <li><a href="#"><span>categories</span></a></li>
                                        <li><a href="<?= Yii::app()->baseUrl ?>/index.php/site/faq"><span>faqs</span></a></li>
                                    </ul>
                                </div>

                            </ul>
                        </nav>
                    </div>
                </div>
            </section>
        </div>

        <?php
        if(isset(Yii::app()->session['user']['id'])) {
                $requestssents = Requests::model()->findAll(array("condition" => "user_id = " . Yii::app()->session['user']['id'] . " AND status = 2 "));
                $requestsrecievs = Requests::model()->findAll(array("condition" => "partner_id =  '" . Yii::app()->session['user']['user_id'] . "'"));

                if(!empty($requestssents)) {
                        foreach($requestssents as $requestssent) {
                                $user_ids .= UserDetails::model()->findByAttributes(array('user_id' => $requestssent->partner_id))->id . ',';
                        }
                }
                if(!empty($requestsrecievs)) {
                        foreach($requestsrecievs as $requestsreciev) {
                                $user_ids .= $requestsreciev->user_id . ',';
                        }
                }
                $user_ids = trim($user_ids, ",");

                $model = UserDetails::model()->findAll(array('condition' => 'FIND_IN_SET(id, "' . $user_ids . '")'));
                $this->renderPartial('//chat/chat', array('models' => $model));
        }
        ?>



        <?php echo $content; ?>








        <footer>
            <div class="container">
                <div class="row">
                    <div class="victoria col col-xs-6 col-sm-4 col-md-3">
                        <img src="<?= Yii::app()->baseUrl ?>/images/foot.png" alt="" class="img img-responsive center-block luv">
                        <div class="visible-md visible-lg">
                            <h6>Copyright &copy 2016.</h6>
                            <h6> All rights reserved.</h6>
                            <h3>Developed By</h3>
                            <a target="new" href="http://www.intersmartsolution.com/"><img class="res" src="<?= Yii::app()->baseUrl ?>/images/inter.png"></a>

                        </div>

                    </div> <!-- end of victoria -->

                    <div class="footer-about col col-xs-6 col-sm-4 col-md-2">
                        <h2>Newgen</h2>


                        <ul>
                            <li><a href="<?= Yii::app()->baseUrl ?>/index.php/site/static/page/about-us">About Us</a></li>
                            <li><a href="<?= Yii::app()->baseUrl ?>/index.php/site/awards">Awards</a></li>
                            <li><a href="<?= Yii::app()->baseUrl ?>/index.php/site/faq">FAQ</a></li>
                            <li><a href="#">Event Management</a></li>
                            <li><a href="#">Plans</a></li>
                            <li><a href="<?= Yii::app()->baseUrl ?>/index.php/site/contact">Contact Us</a></li>
                        </ul>


                    </div> <!-- end of footer-about  -->

                    <div class="explore col col-xs-6 col-sm-4 col-md-2">
                        <h2>Quick Links</h2>


                        <ul>
                            <li><a href="<?= Yii::app()->baseUrl ?>/index.php/site/static/page/privacy-policy">Privacy Policy</a></li>
                            <li><a href="<?= Yii::app()->baseUrl ?>/index.php/site/static/page/terms">Terms and Conditions</a></li>
                            <li><a href="<?= Yii::app()->baseUrl ?>/index.php/site/static/page/company-profile">Company Profile</a></li>
                            <li><a href="<?= Yii::app()->baseUrl ?>/index.php/site/static/page/securitytips">Security Tips</a></li>
                            <li><a href="#">Upgrade</a></li>
                            <li><a href="<?= Yii::app()->baseUrl ?>/index.php/featuredstory">Success Story</a></li>
                        </ul>
                    </div> <!-- end of explore  -->
                    <div class="clearfix visible-sm"></div>
                    <div class="usefull-links col col-xs-6 col-sm-4 col-md-2">
                        <h2>Downloads</h2>
                        <ul>
                            <li><a href="#">Download Mobile App</a></li>
                            <li><a href="#"><img src="<?= Yii::app()->baseUrl ?>/images/btn1.jpg"></a></li>
                            <li><a href="#"><img src="<?= Yii::app()->baseUrl ?>/images/btn2.jpg"></a></li>

                        </ul>







                    </div> <!-- end of usefull-links  -->

                    <div class="usefull-links col col-xs-6 col-md-3">
                        <h2>Help & Support</h2>
                        <p>Lorem ipsum dolor sit a met con
                            seret adipiscing elit sed diam nonunem.</p>

                    </div> <!-- end of usefull-links  -->
                </div> <!-- end of row -->

            </div>
        </footer>
        <section class="foots visible-sm visible-xs">
            <div class="container">

                <div class="row copyright">
                    <div class="col col-md-6">
                        <p>Copyright &copy 2016.
                            All rights reserved.</p>
                    </div>

                    <div class="col col-md-6">
                        <h2>Developed By <a href="http://www.intersmartsolution.com/"><img class="rest" src="<?= Yii::app()->baseUrl ?>/images/inter.png"></a></h2>
                    </div>
                </div>
            </div>
        </section>
<!--        <script src="js/jquery-1.11.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>-->
        <script src="<?= Yii::app()->baseUrl ?>/js/slick.min.js"></script>
        <?php
        if(isset(Yii::app()->session['user']['id']) && Yii::app()->session['user']['id'] != '') {
                $email_verify = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
        } else {
                $email_verify = '';
        }
        ?>
        <div class="modal fade" id="emailVerification" role="dialog">
            <div class="modal-dialog">
                <?php echo $email_verify->email_verification;
                ?>
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">


                    </div>
                    <div class="modal-body">
                        <h1>Confirm your Email Address</h1>
                        <p style="font-size: 15px;padding-bottom:0px;">A confirmation email has been sent to <b><?= $email_verify->email; ?></b>. Click on the confirmation link in the email to activate your account. </p>
                        <ul class="list-inline list-unstyled">
                            <li> <p style="color: #663366;"><?php echo CHtml::link('<i class="fa  fa-envelope"></i> Need to resend the email', array('register/ResendMail')); ?></p></li>
                            <li><p style="color: #663366;"><?php echo CHtml::link('<i class="fa locks fa-lock"></i> Log Out', array('site/logout')); ?></p></li>
                        </ul>


                    </div>

                </div>

            </div>
        </div>




        <script>
                $(window).scroll(function () {

                    var body = $("html, body");

                    var threshold = 90;
                    if ($(window).scrollTop() <= threshold)
                        $('#static_cnt').removeClass('dropup');
                    else
                        $('#static_cnt').addClass('dropup');
                });
                $(document).ready(function () {

                    var body = $("html, body");

                    var threshold = 90;
                    if ($(window).scrollTop() <= threshold)
                        $('#static_cnt').removeClass('dropup');
                    else
                        $('#static_cnt').addClass('dropup');
                });

        </script>


        <script src="<?= Yii::app()->baseUrl ?>/js/simpleMobileMenu.js"></script>
        <script type="text/javascript">

                jQuery(document).ready(function ($) {
                    $('.smobitrigger').smplmnu();
                });

        </script>

        <script>

                (function ($) {
                    $(document).ready(function () {
                        $('#cssmenu ul ul li:odd').addClass('odd');
                        $('#cssmenu ul ul li:even').addClass('even');
                        $('#cssmenu > ul > li > a').click(function () {
                            $('#cssmenu li').removeClass('active');
                            $(this).closest('li').addClass('active');
                            var checkElement = $(this).next();
                            if ((checkElement.is('ul')) && (checkElement.is(':visible'))) {
                                $(this).closest('li').removeClass('active');
                                checkElement.slideUp('normal');
                            }
                            if ((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
                                $('#cssmenu ul ul:visible').slideUp('normal');
                                checkElement.slideDown('normal');
                            }
                            if ($(this).closest('li').find('ul').children().length == 0) {
                                return true;
                            } else {
                                return false;
                            }
                        });
                    });
                })(jQuery);


        </script>
        <?php if(!isset(Yii::app()->session['vendor']) && Yii::app()->session['vendor'] == '') { ?>
                <script>

                        (function () {
                            "use strict";

                            $(window).load(function () {
                                $("#loader").fadeOut();
                                $("#mask").delay(10000).fadeOut("slow");
                            });
                        })(jQuery);

                        window.onload = function () {
                            document.getElementById('mask').style.display = 'none';
                        };
                </script>
        <?php } ?>
<!--        <script type="text/javascript">
                $(document).ready(function () {
                    setTimeout(function () {
                        $("#myModal").modal('show');
                    }, 4000);


                });
        </script>-->
    </body>

</html>
<?php
if($email_verify != '') {
        if($email_verify->email_verification == 0 && $email_verify->register_step == 4) {
                ?>
                <script type="text/javascript">
                        $(document).ready(function () {

                            $("#emailVerification").modal({backdrop: 'static', keyboard: false});

                        });
                </script>
                <?php
        }
}
?>