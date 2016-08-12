<style>
        .slick-dots li{
                background-color: transparent;
        }
        .test{
                position: relative;
                cursor: pointer;
                text-align: center;
                overflow: hidden;
                visibility: hidden;
        }
        #my-file { visibility: hidden; }
</style>

<section class="mynew">
        <div class="container">
                <div class="row">
                        <div class="col-md-3 mynewgen nest">

                                <div class="messagez">
                                        <form method="post" id="photo_update" enctype="multipart/form-data"  >
                                                <?php
                                                if ($user->photo != '') {
                                                        $userPic = explode('.', $user->photo);
                                                        $folder = Yii::app()->Upload->folderName(0, 1000, $user->id);
                                                        ?>
                                                        <img class="center-block line" src="<?php echo Yii::app()->baseUrl . '/uploads/user/' . $folder . '/' . $user->id . '/profile/' . $userPic[0] . '_149_178' . '.' . $userPic[1]; ?>">
                                                <?php } else {
                                                        ?>
                                                        <?php if ($user->gender == 1) { ?>
                                                                <img class="center-block line" src="<?php echo Yii::app()->request->baseUrl; ?>/images/demo-male.jpg">
                                                        <?php } else if ($user->gender == 2) { ?>
                                                                <img class="center-block line" src="<?php echo Yii::app()->request->baseUrl; ?>/images/demo-female.jpg">

                                                                <?php
                                                        }
                                                }
                                                ?>

                                                <input type="file"  name="fileToUpload" class="test" id="my-file"/>
                                                <ul class="list-unstyled">
                                                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Profile/MyPhotos" ><img class="access" src="<?php echo Yii::app()->request->baseUrl; ?>/images/ab1.png">Add Photos</a></li>
                                                        <li> <?php echo CHtml::link('<img class="access" src="' . Yii::app()->request->baseUrl . '/images/ab2.png">My Profile', array('profile/MyProfile')); ?></li>
                                                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/settings"><img class="access" src="<?php echo Yii::app()->request->baseUrl; ?>/images/ab3.png">Settings</a></li>
                                                </ul>
                                        </form>
                                </div>
                        </div>

                        <div class="col-md-9 mynewgenz nop strongz">
                                <h4><?php echo $user->first_name; ?> <span class="ng">| <?php echo $user->user_id; ?></span> </h4>


                                <?php if (Yii::app()->user->hasFlash('plan_success')): ?>
                                        <div class="alert alert-success">
                                                <?php echo Yii::app()->user->getFlash('plan_success'); ?>
                                        </div>
                                <?php endif; ?>
                                <?php if (Yii::app()->user->hasFlash('plan_error')): ?>
                                        <div class="alert alert-danger">
                                                <?php echo Yii::app()->user->getFlash('plan_error'); ?>
                                        </div>
                                <?php endif; ?>

                                <div class="prog-1">
                                        <span class="may">Your Profile Complete  </span>
                                </div>

                                <div class="prog-2">
                                        <div id="ui-progressbar">
                                                <?php
                                                if ($user->photo == '') {
                                                        $photo = 10;
                                                } else {
                                                        $photo = 0;
                                                }
                                                $profile_comple = $user->register_step * 20 - $photo;
                                                ?>
                                                <div id="ui-progress" style="width:<?php echo $profile_comple; ?>%">
                                                </div>
                                                <span class="calculate"><?php echo $profile_comple; ?>%</span>

                                        </div>
                                </div>

                                <div class="clearfix"></div>
                                <div class="badgez">
                                        <h3>Trust Badge</h3>


                                        <div class="trust">
                                                <i class="fa circles fa-check-circle-o"></i>

                                                <img class="k1" src="<?php echo Yii::app()->request->baseUrl; ?>/images/k1.png">
                                        </div>
                                        <div class="trust">
                                                <?php
                                                if ($user->oauth_uid != '') {
                                                        ?>
                                                        <i class = "fa circles fa-check-circle-o"></i>
                                                <?php }
                                                ?>
                                                <img class="k1" src="<?php echo Yii::app()->request->baseUrl; ?>/images/k2.png">
                                        </div>
                                        <div class="trust">
                                                <img class="k1" src="<?php echo Yii::app()->request->baseUrl; ?>/images/k3.png">
                                        </div>
                                        <div class="trust">
                                                <a href="#" data-toggle="modal"  data-target="#myModal_share"><img class="k1" src="<?php echo Yii::app()->request->baseUrl; ?>/images/share_.png" style="width: 56px;height: 49px;"></a>
                                        </div>
                                </div>





                                <div class="stripuser">

                                        <div class="gen">
                                                <div class="rel-1">
                                                        <h2>Your current plan -
                                                                <?php
                                                                if ($my_plan->status != 0) {
                                                                        echo $my_plan->plan_name;
                                                                } else {
                                                                        echo Plans::model()->findByPk(1)->plan_name;
                                                                }
                                                                ?> </h2>

                                                </div>

                                                <div class="rel-2">
                                                        <?php if ($my_plan->status != 0) { ?>
                                                                <h6>
                                                                        <?php echo CHtml::link('Upgrade<i class="fa cart fa-caret-right"></i>', array('register/FifthStep'), array("class" => "edits")); ?>
                                                                </h6>
                                                        <?php } ?>
                                                </div>
                                        </div>
                                        <?php if ($my_plan->status != 0) { ?>
                                                <div class="strip-paddingz">


                                                        <div class="col-md-6">
                                                                <div class="run">
                                                                        <div class="col-sm-5 col-xs-6 zeros">
                                                                                <label for="textinput" class="control-labelz">Send Interest </label>
                                                                        </div>
                                                                        <div class="col-sm-1 col-xs-1 zeros">
                                                                                <label for="textinput" class="control-labelz">:</label>
                                                                        </div>
                                                                        <div class="col-sm-6 col-xs-5 zeros">
                                                                                <label for="textinput" class="control-labelz"><?php echo $my_plan->Interest == 1 ? 'Yes' : 'No'; ?></label>
                                                                        </div>
                                                                </div>
                                                                <div class="run">
                                                                        <div class="col-sm-5 col-xs-6 zeros">
                                                                                <label for="textinput" class="control-labelz">SMS Alert </label>
                                                                        </div>
                                                                        <div class="col-sm-1 col-xs-1 zeros">
                                                                                <label for="textinput" class="control-labelz">:</label>
                                                                        </div>
                                                                        <div class="col-sm-6 col-xs-5 zeros">
                                                                                <label for="textinput" class="control-labelz"><?php echo $my_plan->sms_alerts == 1 ? 'Yes' : 'No'; ?></label>
                                                                        </div>
                                                                </div>
                                                                <div class="run">
                                                                        <div class="col-sm-5 col-xs-6 zeros">
                                                                                <label for="textinput" class="control-labelz">Email alert </label>
                                                                        </div>
                                                                        <div class="col-sm-1 col-xs-1 zeros">
                                                                                <label for="textinput" class="control-labelz">:</label>
                                                                        </div>
                                                                        <div class="col-sm-6 col-xs-5 zeros">
                                                                                <label for="textinput" class="control-labelz"><?php echo $my_plan->email_alerts == 1 ? 'Yes' : 'No'; ?></label>
                                                                        </div>
                                                                </div>
                                                                <div class="run">
                                                                        <div class="col-sm-5 col-xs-6 zeros">
                                                                                <label for="textinput" class="control-labelz">Featured Profile</label>
                                                                        </div>
                                                                        <div class="col-sm-1 col-xs-1 zeros">
                                                                                <label for="textinput" class="control-labelz">:</label>
                                                                        </div>
                                                                        <div class="col-sm-6 col-xs-5 zeros">
                                                                                <label for="textinput" class="control-labelz"><?php echo $my_plan->featured == 1 ? 'Yes' : 'No'; ?></label>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                                <?php if ($my_plan->view_contact != 0) { ?>
                                                                        <div class="run">

                                                                                <div class="col-sm-5 col-xs-6 zeros">
                                                                                        <label for="textinput" class="control-labelz">View Contact Left </label>
                                                                                </div>
                                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                                        <label for="textinput" class="control-labelz">:</label>
                                                                                </div>
                                                                                <div class="col-sm-6 col-xs-5 zeros">
                                                                                        <label for="textinput" class="control-labelz">
                                                                                                <?php
                                                                                                if ($my_plan->status != 0) {
                                                                                                        echo ($my_plan->view_contact - $my_plan->view_contact_left) . '  (' . $my_plan->view_contact . '/' . $my_plan->view_contact_left . ')';
                                                                                                } else {
                                                                                                        echo ($my_plan->view_contact - $my_plan->view_contact_left);
                                                                                                }
                                                                                                ?></label>
                                                                                </div>
                                                                        </div>
                                                                <?php } ?>

                                                                <div class="run">
                                                                        <div class="col-sm-5 col-xs-6 zeros">
                                                                                <label for="textinput" class="control-labelz">Number of Days Left</label>
                                                                        </div>
                                                                        <div class="col-sm-1 col-xs-1 zeros">
                                                                                <label for="textinput" class="control-labelz">:</label>
                                                                        </div>
                                                                        <div class="col-sm-6 col-xs-5 zeros">
                                                                                <label for="textinput" class="control-labelz">
                                                                                        <?php
                                                                                        if ($my_plan->status != 0) {
                                                                                                echo ($my_plan->number_of_days - $my_plan->number_of_days_left) . '  (' . $my_plan->number_of_days . '/' . $my_plan->number_of_days_left . ')';
                                                                                        } else {
                                                                                                echo ($my_plan->number_of_days - $my_plan->number_of_days_left);
                                                                                        }
                                                                                        ?>
                                                                        </div>
                                                                </div>
                                                                <?php if ($my_plan->send_message != 0) { ?>
                                                                        <div class="run">
                                                                                <div class="col-sm-5 col-xs-6 zeros">
                                                                                        <label for="textinput" class="control-labelz">Send	Message </label>
                                                                                </div>
                                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                                        <label for="textinput" class="control-labelz">:</label>
                                                                                </div>
                                                                                <div class="col-sm-6 col-xs-5 zeros">
                                                                                        <label for="textinput" class="control-labelz">
                                                                                                <?php
                                                                                                if ($my_plan->status != 0) {
                                                                                                        echo ($my_plan->send_message - $my_plan->send_message_left) . '  (' . $my_plan->send_message . '/' . $my_plan->send_message_left . ')';
                                                                                                } else {
                                                                                                        echo ($my_plan->send_message - $my_plan->send_message_left);
                                                                                                }
                                                                                                ?>
                                                                                </div>
                                                                        </div>
                                                                <?php } ?>
                                                                <div class="run">
                                                                        <div class="col-sm-5 col-xs-6 zeros">
                                                                                <label for="textinput" class="control-labelz">Search</label>
                                                                        </div>
                                                                        <div class="col-sm-1 col-xs-1 zeros">
                                                                                <label for="textinput" class="control-labelz">:</label>
                                                                        </div>
                                                                        <div class="col-sm-6 col-xs-5 zeros">
                                                                                <label for="textinput" class="control-labelz"><?php echo $my_plan->search == 1 ? 'Yes' : 'No'; ?></label>
                                                                        </div>
                                                                </div>



                                                        </div>
                                                </div>
                                        <?php } else {
                                                ?>
                                                <div class="strip-paddingz">
                                                        <h4 style="padding-left:0;">Upgrade & unlock... </h4>
                                                        <div class="col-md-6">
                                                                <ul class="list-unstyled control-labelz" style="line-height: 24px;">
                                                                        <li><i class='fa fa-caret-right'></i> Send Emails directly</li>
                                                                        <li><i class='fa fa-caret-right'></i> Connect instantly</li>
                                                                        <li><i class='fa fa-caret-right'></i> Initiate Calls / Send SMS</li>


                                                                </ul>
                                                        </div>
                                                        <div class="col-md-6">
                                                                <ul class="list-unstyled control-labelz" style="line-height: 24px;">

                                                                        <li><i class='fa fa-caret-right'></i> Access detailed Profiles</li>
                                                                        <li><i class='fa fa-caret-right'></i> Enjoy Private Browsing</li>
                                                                        <li><i class='fa fa-caret-right'></i> Get Noticed by more Members</li>
                                                                        <li> <?php echo CHtml::link('Know More / Upgrade Now <i class="fa cart fa-caret-right"></i>', array('register/FifthStep'), array("class" => "viewall ")); ?>
                                                                        </li>
                                                                </ul>
                                                        </div>
                                                </div>
                                        <?php }
                                        ?>
                                </div>

                        </div>
                </div>



                <div class="row">

                        <div class="col-md-3 newgens short">
                                <h3>Inbox</h3>
                                <ul class="list-unstyled">
                                        <?php
                                        $this->renderPartial('_leftSideInbox');
                                        ?>

                                </ul>
                                <h3>Sent</h3>
                                <ul class="list-unstyled">
                                        <li><?php echo CHtml::link('Message', array('Myaccount/Message')); ?></li>
                                        <li><?php echo CHtml::link('Invitations', array('Myaccount/SentInvitations')); ?></li>
                                </ul>
                                <h3>Quick Links</h3>
                                <ul class="list-unstyled">
                                        <?php
                                        $this->renderPartial('_leftSideQuickLinks');
                                        ?>
                                </ul>
                                <h3>Explore</h3>
                                <ul class="list-unstyled">
                                        <li><?php echo CHtml::link('Blocked Members', array('Myaccount/ListBlockedMembers'), array('target' => 'blank')); ?></li>
                                        <li><?php echo CHtml::link('Favorite List', array('Partner/Favoritelist')); ?></li>
                                        <li><?php echo CHtml::link('Membership Details', array('Myaccount/Membershipdetails')); ?></li>
                                </ul>

                        </div>
                        <div class="col-md-9 mynewgenz actions">


                                <form action="action_page.php">
                                        <div class="zeros">
                                                <!--****-->







                                                <!--****-->
                                                <?php if (!empty($matches)) { ?>
                                                        <div class="listen">
                                                                <div class="match">
                                                                        <div class="rel-1">
                                                                                <h5>My Matches  (<?php echo count($matches); ?>)</h5>
                                                                        </div>

                                                                        <div class="rel-2">
                                                                                <h6><?php echo CHtml::link('View all<i class="fa cart fa-caret-right"></i>', array('Matches/MyMatches'), array('class' => 'viewall')); ?></h6>
                                                                        </div>
                                                                </div>
                                                                <div class="strip-paddings">


                                                                        <div class="common">
                                                                                <div class="col-sm-12 col-xs-12 zeros">


                                                                                        <div class="girls">
                                                                                                <?php
                                                                                                foreach ($matches as $match) {
                                                                                                        ?>
                                                                                                        <div class="item">
                                                                                                                <div class="main">
                                                                                                                        <div class="profile ">
                                                                                                                                <?php
                                                                                                                                $this->widget("application.client.widgets.PhotoVisibility", array(
                                                                                                                                    'id' => $match->id,
                                                                                                                                    'width' => 180,
                                                                                                                                    'height' => 238,
                                                                                                                                ));
                                                                                                                                ?>



                                                                                                                        </div>
                                                                                                                        <h1><?= $match->first_name; ?></h1>
                                                                                                                        <h1><?php echo date('Y') - date('Y', strtotime($match->dob_year)); ?>
                                                                                                                                <?php
                                                                                                                                if ($match->height != 0) {
                                                                                                                                        echo "," . MasterHeight::model()->findByPk($match->height)->height;
                                                                                                                                }
                                                                                                                                ?></h1>
                                                                                                                        <?php echo CHtml::link('Full profile', array('Partner/Partnerdetails', 'userid' => $match->user_id), array('class' => 'viewallz')); ?>
                                                                                                                        <!--<a class="viewallz" href="#">Full profile</a>-->
                                                                                                                </div>
                                                                                                        </div>


                                                                                                        <?php
                                                                                                }
                                                                                                ?>
                                                                                        </div>
                                                                                </div>

                                                                        </div>
                                                                </div>

                                                        </div>

                                                <?php } ?>







                                                <!--****-->
                                                <?php if (!empty($twowaymatche)) { ?>
                                                        <div class="listen">
                                                                <div class="match">
                                                                        <div class="rel-1">
                                                                                <h5>Two Way Matches  ( <?php echo count($twowaymatches); ?> )</h5>
                                                                        </div>

                                                                        <div class="rel-2">
                                                                                <h6><?php echo CHtml::link('View all<i class="fa cart fa-caret-right"></i>', array('Matches/TwoWayMatches'), array('class' => 'viewall')); ?></h6>
                                                                        </div>
                                                                </div>
                                                                <div class="strip-paddings">


                                                                        <div class="common">
                                                                                <div class="col-sm-12 col-xs-12 zeros">


                                                                                        <div class="girls">
                                                                                                <?php
                                                                                                foreach ($twowaymatches as $twowaymatche) {
                                                                                                        ?>
                                                                                                        <div class="item">
                                                                                                                <div class="main">
                                                                                                                        <div class="profile ">
                                                                                                                                <?php
                                                                                                                                $this->widget("application.client.widgets.PhotoVisibility", array(
                                                                                                                                    'id' => $twowaymatche->id,
                                                                                                                                    'width' => 180,
                                                                                                                                    'height' => 238,
                                                                                                                                ));
                                                                                                                                ?>                                                                                                                                </div>
                                                                                                                        <h1><?= $twowaymatche->first_name; ?></h1>
                                                                                                                        <h1><?php echo date('Y') - date('Y', strtotime($twowaymatche->dob_year)); ?>
                                                                                                                                <?php
                                                                                                                                if ($twowaymatche->height != 0) {
                                                                                                                                        echo "," . MasterHeight::model()->findByPk($twowaymatche->height)->height;
                                                                                                                                }
                                                                                                                                ?></h1>
                                                                                                                        <?php echo CHtml::link('Full profile', array('Partner/Partnerdetails', 'userid' => $twowaymatche->user_id), array('class' => 'viewallz')); ?>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                        <?php
                                                                                                }
                                                                                                ?>
                                                                                        </div>
                                                                                </div>

                                                                        </div>
                                                                </div>

                                                        </div>
                                                <?php } ?>






                                                <!--****-->
                                                <?php if (!empty($profile_visitors)) { ?>
                                                        <div class="listen">
                                                                <div class="match">
                                                                        <div class="rel-1">
                                                                                <h5>Profile Visitors (<?php echo count($profile_visitors); ?>)</h5>
                                                                        </div>

                                                                        <div class="rel-2">
                                                                                <h6><?php echo CHtml::link('View all<i class="fa cart fa-caret-right"></i>', array('Myaccount/ProfileVisitors'), array('class' => 'viewall')); ?></h6>
                                                                        </div>
                                                                </div>
                                                                <div class="strip-paddings">


                                                                        <div class="common">
                                                                                <div class="col-sm-12 col-xs-12 zeros">


                                                                                        <div class="girls">
                                                                                                <?php
                                                                                                if (!empty($profile_visitors)) {
                                                                                                        foreach ($profile_visitors as $profile_visitor) {
                                                                                                                $visitors = UserDetails::model()->findAllByAttributes(array('user_id' => $profile_visitor->user_id));
                                                                                                                foreach ($visitors as $visitor) {
//                                                                                                                var_dump($visitor);
//                                                                                                                exit;
                                                                                                                        ?>
                                                                                                                        <div class="item">
                                                                                                                                <div class="main">
                                                                                                                                        <div class="profile ">
                                                                                                                                                <?php
                                                                                                                                                $this->widget("application.client.widgets.PhotoVisibility", array(
                                                                                                                                                    'id' => $visitor->id,
                                                                                                                                                    'width' => 180,
                                                                                                                                                    'height' => 238,
                                                                                                                                                ));
                                                                                                                                                ?>
                                                                                                                                        </div>
                                                                                                                                        <h1><?= $visitor->first_name; ?></h1>
                                                                                                                                        <h1><?php echo date('Y') - date('Y', strtotime($visitor->dob_year)); ?>
                                                                                                                                                <?php
                                                                                                                                                if ($visitor->height != 0) {
                                                                                                                                                        echo "," . MasterHeight::model()->findByPk($visitor->height)->height;
                                                                                                                                                }
                                                                                                                                                ?></h1>
                                                                                                                                        <?php echo CHtml::link('Full profile', array('Partner/Partnerdetails', 'userid' => $visitor->user_id), array('class' => 'viewallz')); ?>
                                                                                                                                </div>
                                                                                                                        </div>


                                                                                                                        <?php
                                                                                                                }
                                                                                                        }
                                                                                                }
                                                                                                ?>

                                                                                        </div>
                                                                                </div>

                                                                        </div>
                                                                </div>

                                                        </div>
                                                <?php } ?>




                                        </div>
                                </form>
                        </div>
                </div>


                <div class="modal fade" id="myModal_share" role="dialog">
                        <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                        <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                                        </div>
                                        <div class="modal-body">
                                                <h1>Share with your friend</h1>
                                                <ul class="list-inline list-unstyled">
                                                        <!--<li class="link-1"><?php // echo CHtml::link('<i class="fa email fa-envelope"></i>Signup with Email', array('site/login'));                                                                                                                                                ?></li>-->
                                                        <li class="link-1"><a href="#"  data-toggle="modal" data-target="#myModal_share_email"><i class="fa email fa-envelope"></i>Share with Email</a></li>
                                                        <li class="link-2"><a onclick="popWindow('https://www.facebook.com/sharer/sharer.php?u=http://newgen.com', 'facebook', 'width=1000,height=200,left=0,top=0,location=no,status=yes,scrollbars=yes,resizable=yes');"><i class="fa email fa-facebook"></i>Share with Facebook</a></li>
                                                        <!--<li class="link-2"><a href="#"><i class="fa email fa-facebook"></i>Share with Facebook</a></li>-->
                                                </ul>
                                        </div>

                                </div>

                        </div>
                </div>
                <div id="myModal_share_email" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content dialogs report">
                                        <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body modal_span">
                                                <span class="newpops_blocked ">Share with your friend on email</span>
                                                <?php if (Yii::app()->user->hasFlash('success')): ?>
                                                        <div class="alert alert-success">
                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                <?php echo Yii::app()->user->getFlash('success'); ?>
                                                        </div>
                                                <?php endif; ?>
                                                <?php if (Yii::app()->user->hasFlash('error')): ?>
                                                        <div class="alert alert-danger">
                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                <?php echo Yii::app()->user->getFlash('error'); ?>
                                                        </div>
                                                <?php endif; ?>
                                                <form action="<?= Yii::app()->baseUrl; ?>/index.php/myaccount/ShareNewgen" id="social_share" method="post" name="social_share">
                                                        <div class="row">
                                                                <div class="col-md-3">
                                                                        Email id:
                                                                </div>
                                                                <div class="col-md-9">
                                                                        <input type="email"  required="required" name="email" class="form-control ui_source" placeholder="Email id you want to share"/>
                                                                </div>
                                                        </div>
                                                        <div class="row button_modal">
                                                                <input type="submit" class="connect-3 email_click" id="cancel_block" value="Ok" />
                                                                <a href="#" class="connect-4 " type="button" data-dismiss="modal" id="cancel_block">Cancel</a>
                                                        </div>
                                                </form>
                                        </div>

                                </div>

                        </div>
                </div>


        </div>
</section>
<script type="text/javascript">
        function popWindow(url) {
                var newWindow = window.open(url, "", "width=300, height=200");
        }
</script>
<script>
        $(document).ready(function () {
                //                $(".connect-3").on('click', function () {
                //                        $("form#social_share").submit();
                //                });
                //                $(".email_click").on('click', function () {
                ////                        alert();
                //////                        $("div#myModal_share").disable();
                //                        $('#myModal_share *').prop('disabled', true);
                //                });


        });

</script>
<script>

        $(document).ready(function () {

                $('.girls').slick({
                        slidesToShow: 4,
                        autoplay: false,
                        autoplaySpeed: 4000,
                        slidesToScroll: 1,
                        pauseOnHover: false,
                        prevArrow: '<i id="prev_slide_3"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/prev.jpg"></i>',
                        nextArrow: '<i id="next_slide_3"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/nex.jpg"></i>',
                        responsive: [
                                {
                                        breakpoint: 1000,
                                        settings: {
                                                centerMode: false,
                                                slidesToShow: 3
                                        }
                                },
                                {
                                        breakpoint: 800,
                                        settings: {
                                                centerMode: false,
                                                slidesToShow: 2
                                        }
                                },
                                {
                                        breakpoint: 767,
                                        settings: {
                                                centerMode: false,
                                                slidesToShow: 1
                                        }
                                }
                        ]
                });

        });

</script>