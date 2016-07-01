<!DOCTYPE html>
<html lang="en">
        <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">

                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <meta name="description" content="Xenon Boostrap Admin Panel" />
                <meta name="author" content="" />
                <link rel="icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" type="image/x-icon">
                <title>NewGen-Wedding</title>

                <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Arimo:400,700,400italic">
                <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/theme/css/fonts/linecons/css/linecons.css">
                <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/theme/css/fonts/fontawesome/css/font-awesome.min.css">
                <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/theme/css/xenon-core.css">
                <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/theme/css/xenon-forms.css">
                <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/theme/css/xenon-components.css">
                <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/theme/css/xenon-skins.css">
                <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/theme/css/custom.css">


                <script>
                        var baseurl = "<?php print Yii::app()->request->baseUrl . "/admin.php/"; ?>";
                        var basepath = "<?php print Yii::app()->basePath; ?>";
                </script>
                <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
                <!--[if lt IE 9]>
                        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
                <![endif]-->


        </head>
        <body class="page-body">

                <div class="settings-pane">

                        <a href="#" data-toggle="settings-pane" data-animate="true">
                                &times;
                        </a>

                        <div class="settings-pane-inner">

                                <div class="row">

                                        <div class="col-md-4">

                                                <div class="user-info">

                                                        <div class="user-image">
                                                                <a href="extra-profile.html">
                                                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/theme/images/user-2.png" class="img-responsive img-circle" />
                                                                </a>
                                                        </div>

                                                        <div class="user-details">

                                                                <h3>
                                                                        <a href="extra-profile.html"><?php echo Yii::app()->session['admin']['name']; ?></a>

                                                                        <!-- Available statuses: is-online, is-idle, is-busy and is-offline -->
                                                                        <span class="user-status is-online"></span>
                                                                </h3>

                                                                <p class="user-title">Web Developer</p>

                                                                <div class="user-links">
                                                                        <a href="extra-profile.html" class="btn btn-primary">Edit Profile</a>
                                                                        <a href="extra-profile.html" class="btn btn-success">Upgrade</a>
                                                                </div>

                                                        </div>

                                                </div>

                                        </div>

                                        <div class="col-md-8 link-blocks-env">

                                                <div class="links-block left-sep">
                                                        <h4>
                                                                <span>Notifications</span>
                                                        </h4>

                                                        <ul class="list-unstyled">
                                                                <li>
                                                                        <input type="checkbox" class="cbr cbr-primary" checked="checked" id="sp-chk1" />
                                                                        <label for="sp-chk1">Messages</label>
                                                                </li>
                                                                <li>
                                                                        <input type="checkbox" class="cbr cbr-primary" checked="checked" id="sp-chk2" />
                                                                        <label for="sp-chk2">Events</label>
                                                                </li>
                                                                <li>
                                                                        <input type="checkbox" class="cbr cbr-primary" checked="checked" id="sp-chk3" />
                                                                        <label for="sp-chk3">Updates</label>
                                                                </li>
                                                                <li>
                                                                        <input type="checkbox" class="cbr cbr-primary" checked="checked" id="sp-chk4" />
                                                                        <label for="sp-chk4">Server Uptime</label>
                                                                </li>
                                                        </ul>
                                                </div>

                                                <div class="links-block left-sep">
                                                        <h4>
                                                                <a href="#">
                                                                        <span>Help Desk</span>
                                                                </a>
                                                        </h4>

                                                        <ul class="list-unstyled">
                                                                <li>
                                                                        <a href="#">
                                                                                <i class="fa-angle-right"></i>
                                                                                Support Center
                                                                        </a>
                                                                </li>
                                                                <li>
                                                                        <a href="#">
                                                                                <i class="fa-angle-right"></i>
                                                                                Submit a Ticket
                                                                        </a>
                                                                </li>
                                                                <li>
                                                                        <a href="#">
                                                                                <i class="fa-angle-right"></i>
                                                                                Domains Protocol
                                                                        </a>
                                                                </li>
                                                                <li>
                                                                        <a href="#">
                                                                                <i class="fa-angle-right"></i>
                                                                                Terms of Service
                                                                        </a>
                                                                </li>
                                                        </ul>
                                                </div>

                                        </div>

                                </div>

                        </div>

                </div>

                <div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

                        <!-- Add "fixed" class to make the sidebar fixed always to the browser viewport. -->
                        <!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
                        <!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->
                        <div class="sidebar-menu toggle-others collapsed fixed">

                                <div class="sidebar-menu-inner">

                                        <header class="logo-env" >

                                                <!-- logo -->
                                                <div class="logo">
                                                        <a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/site/home'; ?>" class="logo-expanded">
                                                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/admin-logo.png" width="80" alt="" />
                                                        </a>

                                                        <a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/site/home'; ?>" class="logo-collapsed">
                                                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/admin-logo.png" width="40" alt="" />
                                                        </a>
                                                </div>

                                                <!-- This will toggle the mobile menu and will be visible only on mobile devices -->
                                                <div class="mobile-menu-toggle visible-xs">
                                                        <a href="#" data-toggle="user-info-menu">
                                                                <i class="fa-bell-o"></i>
                                                                <span class="badge badge-success">7</span>
                                                        </a>

                                                        <a href="#" data-toggle="mobile-menu">
                                                                <i class="fa-bars"></i>
                                                        </a>
                                                </div>

                                                <!-- This will open the popup with user profile settings, you can use for any purpose, just be creative -->
                                                <div class="settings-icon">
                                                        <a href="#" data-toggle="settings-pane" data-animate="true">
                                                                <i class="linecons-cog"></i>
                                                        </a>
                                                </div>


                                        </header>



                                        <ul id="main-menu" class="main-menu">
                                                <!-- add class "multiple-expanded" to allow multiple submenus to open -->
                                                <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->

                                                <li>
                                                        <a href="">

                                                                <i class="fa-cogs"></i>
                                                                <span class="title" >Settings</span>
                                                        </a>
                                                        <ul>

                                                                <li>
                                                                        <?php echo CHtml::link('Admin Posts', array('/admin/adminPost/admin')); ?>
                                                                </li>
                                                                <li>
                                                                        <?php echo CHtml::link('Admin Users', array('/admin/adminUsers/admin')); ?>
                                                                </li>
                                                        </ul>
                                                </li>

                                                <li>
                                                        <?php echo CHtml::link('<i class="fa-users"></i><span class="title" >User Details</span>', array('/user/userDetails/admin')); ?>
                                                </li>
                                                <li>
                                                        <a href="">

                                                                <i class="fa-paperclip"></i>
                                                                <span class="title" >Static Contents</span>
                                                        </a>
                                                        <ul>
                                                                <li>
                                                                        <?php echo CHtml::link('Static Pages', array('/staticPage/admin')); ?>
                                                                        <?php echo CHtml::link('Banner', array('/Banner/admin')); ?>
                                                                </li>
                                                        </ul>
                                                </li>
                                                <li>
                                                        <a href="">

                                                                <i class="fa-database"></i>
                                                                <span class="title" >Masters</span>
                                                        </a>
                                                        <ul>

                                                                <li>
                                                                        <?php echo CHtml::link('Affluence Level', array('/masters/masterAffluenceLevel/admin')); ?>
                                                                </li>

                                                                <li>
                                                                        <?php echo CHtml::link('Annual Income', array('/masters/MasterAnnualIncome/admin')); ?>
                                                                </li>
                                                                <li>
                                                                        <?php echo CHtml::link('Blood Group', array('/masters/MasterBloodGroup/admin')); ?>
                                                                </li>
                                                                <li>
                                                                        <?php echo CHtml::link('Body Type', array('/masters/MasterBodyType/admin')); ?>
                                                                </li>
                                                                <li>
                                                                        <?php echo CHtml::link('Caste', array('/masters/MasterCaste/admin')); ?>
                                                                </li>
                                                                <li>
                                                                        <?php echo CHtml::link('City', array('/masters/MasterCity/admin')); ?>
                                                                </li>
                                                                <li>
                                                                        <?php echo CHtml::link('Country', array('/masters/MasterCountry/admin')); ?>
                                                                </li>
                                                                <li>
                                                                        <?php echo CHtml::link('Education Field', array('/masters/MasterEducationField/admin')); ?>
                                                                </li>
                                                                <li>
                                                                        <?php echo CHtml::link('Education Level', array('/masters/MasterEducationLevel/admin')); ?>
                                                                </li>
                                                                <li>
                                                                        <?php echo CHtml::link('Family Type', array('/masters/MasterFamilyType/admin')); ?>
                                                                </li>
                                                                <li>
                                                                        <?php echo CHtml::link('Family Value', array('/masters/MasterFamilyValue/admin')); ?>
                                                                </li>
                                                                <li>
                                                                        <?php echo CHtml::link('Health Information', array('/masters/MasterHealthInformation/admin')); ?>
                                                                </li>
                                                                <li>
                                                                        <?php echo CHtml::link('Occupation', array('/masters/MasterOccupation/admin')); ?>
                                                                </li>
                                                                <li>
                                                                        <?php echo CHtml::link('Religion', array('/masters/MasterReligion/admin')); ?>
                                                                </li>
                                                                <li>
                                                                        <?php echo CHtml::link('Skin Tone', array('/masters/MasterSkinTone/admin')); ?>
                                                                </li>
                                                                <li>
                                                                        <?php echo CHtml::link('State', array('/masters/MasterState/admin')); ?>
                                                                </li>
                                                                <li>
                                                                        <?php echo CHtml::link('Sub Caste', array('/masters/MasterSubCaste/admin')); ?>
                                                                </li>
                                                        </ul>
                                                </li>
                                                <li>
                                                        <a href="">

                                                                <i class="fa-paperclip"></i>
                                                                <span class="title" >Masters</span>
                                                        </a>
                                                        <ul>
                                                                <li>
                                                                        <?php echo CHtml::link('Add Story', array('/TellUsStory/admin')); ?>
                                                                        <?php echo CHtml::link('Story Approval', array('/TellUsStory/approve')); ?>
                                                                </li>
                                                        </ul>
                                                </li>


                                        </ul>

                                </div>

                        </div>

                        <div class="main-content">

                                <nav class="navbar user-info-navbar"  role="navigation"><!-- User Info, Notifications and Menu Bar -->

                                        <!-- Left links for user info navbar -->
                                        <ul class="user-info-menu left-links list-inline list-unstyled">

                                                <li class="hidden-sm hidden-xs">
                                                        <a href="#" data-toggle="sidebar">
                                                                <i class="fa-bars"></i>
                                                        </a>
                                                </li>

                                                <!--<li class="dropdown hover-line">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                        <i class="fa-envelope-o"></i>
                                                        <span class="badge badge-green">15</span>
                                                    </a>

                                                    <ul class="dropdown-menu messages">
                                                        <li>

                                                            <ul class="dropdown-menu-list list-unstyled ps-scrollbar">

                                                                <li class="active">
                                                                    <a href="#">
                                                                        <span class="line">
                                                                            <strong>Luc Chartier</strong>
                                                                            <span class="light small">- yesterday</span>
                                                                        </span>

                                                                        <span class="line desc small">
                                                                            This ain’t our first item, it is the best of the rest.
                                                                        </span>
                                                                    </a>
                                                                </li>

                                                                <li class="active">
                                                                    <a href="#">
                                                                        <span class="line">
                                                                            <strong>Salma Nyberg</strong>
                                                                            <span class="light small">- 2 days ago</span>
                                                                        </span>

                                                                        <span class="line desc small">
                                                                            Oh he decisively impression attachment friendship so if everything.
                                                                        </span>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a href="#">
                                                                        <span class="line">
                                                                            Hayden Cartwright
                                                                            <span class="light small">- a week ago</span>
                                                                        </span>

                                                                        <span class="line desc small">
                                                                            Whose her enjoy chief new young. Felicity if ye required likewise so doubtful.
                                                                        </span>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a href="#">
                                                                        <span class="line">
                                                                            Sandra Eberhardt
                                                                            <span class="light small">- 16 days ago</span>
                                                                        </span>

                                                                        <span class="line desc small">
                                                                            On so attention necessary at by provision otherwise existence direction.
                                                                        </span>
                                                                    </a>
                                                                </li>


                                                                <li class="active">
                                                                    <a href="#">
                                                                        <span class="line">
                                                                            <strong>Luc Chartier</strong>
                                                                            <span class="light small">- yesterday</span>
                                                                        </span>

                                                                        <span class="line desc small">
                                                                            This ain’t our first item, it is the best of the rest.
                                                                        </span>
                                                                    </a>
                                                                </li>

                                                                <li class="active">
                                                                    <a href="#">
                                                                        <span class="line">
                                                                            <strong>Salma Nyberg</strong>
                                                                            <span class="light small">- 2 days ago</span>
                                                                        </span>

                                                                        <span class="line desc small">
                                                                            Oh he decisively impression attachment friendship so if everything.
                                                                        </span>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a href="#">
                                                                        <span class="line">
                                                                            Hayden Cartwright
                                                                            <span class="light small">- a week ago</span>
                                                                        </span>

                                                                        <span class="line desc small">
                                                                            Whose her enjoy chief new young. Felicity if ye required likewise so doubtful.
                                                                        </span>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a href="#">
                                                                        <span class="line">
                                                                            Sandra Eberhardt
                                                                            <span class="light small">- 16 days ago</span>
                                                                        </span>

                                                                        <span class="line desc small">
                                                                            On so attention necessary at by provision otherwise existence direction.
                                                                        </span>
                                                                    </a>
                                                                </li>

                                                            </ul>

                                                        </li>

                                                        <li class="external">
                                                            <a href="mailbox-main.html">
                                                                <span>All Messages</span>
                                                                <i class="fa-link-ext"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>-->

                                                <!--<li class="dropdown hover-line">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                        <i class="fa-bell-o"></i>
                                                        <span class="badge badge-purple">7</span>
                                                    </a>

                                                    <ul class="dropdown-menu notifications">
                                                        <li class="top">
                                                            <p class="small">
                                                                <a href="#" class="pull-right">Mark all Read</a>
                                                                You have <strong>3</strong> new notifications.
                                                            </p>
                                                        </li>

                                                        <li>
                                                            <ul class="dropdown-menu-list list-unstyled ps-scrollbar">
                                                                <li class="active notification-success">
                                                                    <a href="#">
                                                                        <i class="fa-user"></i>

                                                                        <span class="line">
                                                                            <strong>New user registered</strong>
                                                                        </span>

                                                                        <span class="line small time">
                                                                            30 seconds ago
                                                                        </span>
                                                                    </a>
                                                                </li>

                                                                <li class="active notification-secondary">
                                                                    <a href="#">
                                                                        <i class="fa-lock"></i>

                                                                        <span class="line">
                                                                            <strong>Privacy settings have been changed</strong>
                                                                        </span>

                                                                        <span class="line small time">
                                                                            3 hours ago
                                                                        </span>
                                                                    </a>
                                                                </li>

                                                                <li class="notification-primary">
                                                                    <a href="#">
                                                                        <i class="fa-thumbs-up"></i>

                                                                        <span class="line">
                                                                            <strong>Someone special liked this</strong>
                                                                        </span>

                                                                        <span class="line small time">
                                                                            2 minutes ago
                                                                        </span>
                                                                    </a>
                                                                </li>

                                                                <li class="notification-danger">
                                                                    <a href="#">
                                                                        <i class="fa-calendar"></i>

                                                                        <span class="line">
                                                                            John cancelled the event
                                                                        </span>

                                                                        <span class="line small time">
                                                                            9 hours ago
                                                                        </span>
                                                                    </a>
                                                                </li>

                                                                <li class="notification-info">
                                                                    <a href="#">
                                                                        <i class="fa-database"></i>

                                                                        <span class="line">
                                                                            The server is status is stable
                                                                        </span>

                                                                        <span class="line small time">
                                                                            yesterday at 10:30am
                                                                        </span>
                                                                    </a>
                                                                </li>

                                                                <li class="notification-warning">
                                                                    <a href="#">
                                                                        <i class="fa-envelope-o"></i>

                                                                        <span class="line">
                                                                            New comments waiting approval
                                                                        </span>

                                                                        <span class="line small time">
                                                                            last week
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </li>

                                                        <li class="external">
                                                            <a href="#">
                                                                <span>View all notifications</span>
                                                                <i class="fa-link-ext"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>-->

                                                <!-- Added in v1.2 -->


                                        </ul>


                                        <!-- Right links for user info navbar -->
                                        <ul class="user-info-menu right-links list-inline list-unstyled">
                                                <li class="search-form"><!-- You can add "always-visible" to show make the search input visible -->

                                                        <form name="userinfo_search_form" method="get" action="extra-search.html">
                                                                <input type="text" name="s" class="form-control search-field" placeholder="Type to search..." />

                                                                <button type="submit" class="btn btn-link">
                                                                        <i class="linecons-search"></i>
                                                                </button>
                                                        </form>

                                                </li>

                                                <li class="dropdown user-profile">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/theme/images/user-4.png" alt="user-image" class="img-circle img-inline userpic-32" width="28" />
                                                                <span>
                                                                        <?php echo Yii::app()->session['admin']['name']; ?>
                                                                        <i class="fa-angle-down"></i>
                                                                </span>
                                                        </a>

                                                        <ul class="dropdown-menu user-profile-menu list-unstyled">
                                                                <li>
                                                                        <a href="<?php echo Yii::app()->request->baseUrl . '/admin..php/site/password' ?>">
                                                                                <i class="fa-wrench"></i>
                                                                                Settings
                                                                        </a>
                                                                </li>
                                                                <li>
                                                                        <a href="#profile">
                                                                                <i class="fa-user"></i>
                                                                                Profile
                                                                        </a>
                                                                </li>
                                                                <li>
                                                                        <a href="#help">
                                                                                <i class="fa-info"></i>
                                                                                Help
                                                                        </a>
                                                                </li>
                                                                <li class="last">
                                                                        <?php echo CHtml::link('<i class="fa-lock"></i>Logout', array('site/out')); ?>

                                                                </li>
                                                        </ul>
                                                </li>



                                        </ul>

                                </nav>

                                <?php echo $content; ?>


                                <footer class="main-footer sticky footer-type-1">

                                        <div class="footer-inner">

                                                <!-- Add your copyright text here -->
                                                <div class="footer-text">
                                                        &copy; 2015
                                                        <strong>NewGen Wedding </strong>

                                                </div>


                                                <!-- Go to Top Link, just add rel="go-top" to any link to add this functionality -->
                                                <div class="go-up">

                                                        <a href="#" rel="go-top">
                                                                <i class="fa-angle-up"></i>
                                                        </a>

                                                </div>

                                        </div>

                                </footer>
                        </div>




                </div>

                <div class="footer-sticked-chat"><!-- Start: Footer Sticked Chat -->

                        <script type="text/javascript">
                                function toggleSampleChatWindow()
                                {
                                        var $chat_win = jQuery("#sample-chat-window");

                                        $chat_win.toggleClass('open');

                                        if ($chat_win.hasClass('open'))
                                        {
                                                var $messages = $chat_win.find('.ps-scrollbar');

                                                if ($.isFunction($.fn.perfectScrollbar))
                                                {
                                                        $messages.perfectScrollbar('destroy');

                                                        setTimeout(function() {
                                                                $messages.perfectScrollbar();
                                                                $chat_win.find('.form-control').focus();
                                                        }, 300);
                                                }
                                        }

                                        jQuery("#sample-chat-window form").on('submit', function(ev)
                                        {
                                                ev.preventDefault();
                                        });
                                }

                                jQuery(document).ready(function($)
                                {
                                        $(".footer-sticked-chat .chat-user, .other-conversations-list a").on('click', function(ev)
                                        {
                                                ev.preventDefault();
                                                toggleSampleChatWindow();
                                        });

                                        $(".mobile-chat-toggle").on('click', function(ev)
                                        {
                                                ev.preventDefault();

                                                $(".footer-sticked-chat").toggleClass('mobile-is-visible');
                                        });
                                });
                        </script>



                        <a href="#" class="mobile-chat-toggle">
                                <i class="linecons-comment"></i>
                                <span class="num">6</span>
                                <span class="badge badge-purple">4</span>
                        </a>

                        <!-- End: Footer Sticked Chat -->
                </div>





                <!-- Bottom Scripts -->
                <script src="<?php echo Yii::app()->request->baseUrl; ?>/theme/js/TweenMax.min.js"></script>
                <script src="<?php echo Yii::app()->request->baseUrl; ?>/theme/js/resizeable.js"></script>
                <script src="<?php echo Yii::app()->request->baseUrl; ?>/theme/js/joinable.js"></script>
                <script src="<?php echo Yii::app()->request->baseUrl; ?>/theme/js/xenon-api.js"></script>
                <script src="<?php echo Yii::app()->request->baseUrl; ?>/theme/js/xenon-toggles.js"></script>


                <!-- JavaScripts initializations and stuff -->
                <script src="<?php echo Yii::app()->request->baseUrl; ?>/theme/js/xenon-custom.js"></script>

        </body>
</html>