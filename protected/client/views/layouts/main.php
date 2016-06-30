<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Newgen </title>
        <link rel="icon" href="<?php echo Yii::app()->baseUrl; ?>/images/favicon.png" type="image/x-icon" />
        <link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl; ?>/images/favicon.png" type="image/x-icon" />

        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>
        <link href="<?= Yii::app()->baseUrl ?>/css/font-awesome.min.css" rel="stylesheet">
<!--        <link href="<?= Yii::app()->baseUrl ?>/css/bootstrap.min.css" rel="stylesheet">-->
        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->baseUrl ?>/css/simpleMobileMenu.css" />
        <link href="<?= Yii::app()->baseUrl ?>/css/style.css" rel="stylesheet">
        <link href="<?= Yii::app()->baseUrl ?>/css/custom.css" rel="stylesheet">
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

        <div id="mask">
            <div id="loader">
            </div>
        </div>





        <div id="static_cnt" class="">
            <section class="main-head-2">
                <div class="container">
                    <div class="row">
                        <div class="hidden-xs hidden-sm">
                            <div class="col-md-3 col-sm-4">
                                <div class="dropdown">
                                    <?php echo CHtml::link('<img class="bars" src="' . Yii::app()->baseUrl . '/images/logo.png">', array('site/index')); ?>

                                    <ul class="dropdown-menu categories">
                                        <li><a href="#">menu 1</a></li>
                                        <li><a href="#">menu 2</a></li>
                                        <li><a href="#">menu 3</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9 col-sm-8">
                                <nav class="navbar navbar-inverse">
                                    <div class="nop">
                                        <ul class="nav navbar-nav">
                                            <li class="active"><a href="#">Home</a></li>
                                            <li><a href="#">Wedding Planner</a></li>
                                            <li><a href="#">Membership Plans</a></li>
                                            <li><a href="#">Contact Us</a></li>
                                            <li class="colors"><a href="#">Couples</a></li>

                                            <?php
                                            if(isset(Yii::app()->session['user']['id']) && Yii::app()->session['user']['id'] != '') {
                                                    ?>

                                                    <li class="colors"><a href="#"><i class="fa locks fa-user"></i>Hi, <?php echo Yii::app()->session['user']['first_name']; ?></a></li>
                                                    <li class="colors"> <?php echo CHtml::link('<i class="fa locks fa-lock"></i>Log Out', array('site/logout')); ?></li>
                                                    <?php
                                            } else {
                                                    ?>
                                                    <li class="colors"><a href="#"><i class="fa locks fa-lock"></i>Vendor</a></li>
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
                                        <li><a href="#"><span>About Us</span></a></li>
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
                                        <li><a href="#"><span>faqs</span></a></li>
                                    </ul>
                                </div>

                            </ul>
                        </nav>
                    </div>
                </div>
            </section>
        </div>





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
                            <a href="http://www.intersmartsolution.com/"><img class="res" src="<?= Yii::app()->baseUrl ?>/images/inter.png"></a>

                        </div>

                    </div> <!-- end of victoria -->

                    <div class="footer-about col col-xs-6 col-sm-4 col-md-2">
                        <h2>Newgen</h2>


                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Awards</a></li>
                            <li><a href="#">Advertise With Us</a></li>
                            <li><a href="#">Event Management</a></li>
                            <li><a href="#">Plans</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>


                    </div> <!-- end of footer-about  -->

                    <div class="explore col col-xs-6 col-sm-4 col-md-2">
                        <h2>Quick Links</h2>


                        <ul>
                            <li><a href="#">Privacy and You</a></li>
                            <li><a href="#">Terms and Conditions</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Security Tips</a></li>
                            <li><a href="#">Upgrade</a></li>
                            <li><a href="#">Success Story</a></li>
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
    </body>

</html>
