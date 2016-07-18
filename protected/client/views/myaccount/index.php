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
                                                <img class="center-block line" src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/user/1000/<?= $user->id; ?>/profile/<?= $user->photo ?>">
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
                                                <img class="k1" src="<?php echo Yii::app()->request->baseUrl; ?>/images/k2.png">
                                        </div>
                                        <div class="trust">
                                                <img class="k1" src="<?php echo Yii::app()->request->baseUrl; ?>/images/k3.png">
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
                                <h3>Accepted</h3>
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
                                                                                                        if ($match->photo_visibility == 2) {
                                                                                                                ?>
                                                                                                                <div class="item">
                                                                                                                        <div class="main">
                                                                                                                                <div class="profile ">
                                                                                                                                        <?php if ($match->gender == 1) { ?>
                                                                                                                                                <img class="center-block file img-responsive fullz img_profile" src="<?php echo Yii::app()->request->baseUrl; ?>/images/gen.jpg">
                                                                                                                                        <?php } else { ?>
                                                                                                                                                <img class="center-block file img-responsive fullz img_profile" src="<?php echo Yii::app()->request->baseUrl; ?>/images/p2.jpg">
                                                                                                                                        <?php } ?>
                                                                                                                                        <img class="lockz" src="<?php echo Yii::app()->request->baseUrl; ?>/images/lock.png">
                                                                                                                                        <p>Visible on Accept/Sent</p>
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

                                                                                                        <?php } if ($match->photo_visibility == 1) { ?>
                                                                                                                <div class="item">
                                                                                                                        <div class="main">
                                                                                                                                <div class="profile ">
                                                                                                                                        <img class="center-block file img-responsive fullz img_profile" src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/user/1000/<?= $match->id; ?>/profile/<?= $match->photo ?>">

                                                                                                                                </div>
                                                                                                                                <h1><?= $match->first_name; ?></h1>
                                                                                                                                <h1><?php echo date('Y') - date('Y', strtotime($match->dob_year)); ?>
                                                                                                                                        <?php
                                                                                                                                        if ($match->height != 0) {
                                                                                                                                                echo "," . MasterHeight::model()->findByPk($match->height)->height;
                                                                                                                                        }
                                                                                                                                        ?></h1>
                                                                                                                                <?php echo CHtml::link('Full profile', array('Partner/Partnerdetails', 'userid' => $match->user_id), array('class' => 'viewallz')); ?>

                                                                                                                        </div>
                                                                                                                </div>
                                                                                                        <?php } if ($match->photo_visibility == 3) { ?>
                                                                                                                <div class="item">
                                                                                                                        <div class="main">
                                                                                                                                <div class="profile ">
                                                                                                                                        <?php if ($match->gender == 1) { ?>
                                                                                                                                                <img class="center-block file img-responsive fullz img_profile" src="<?php echo Yii::app()->request->baseUrl; ?>/images/gen.jpg">
                                                                                                                                        <?php } else { ?>
                                                                                                                                                <img class="center-block file img-responsive fullz img_profile" src="<?php echo Yii::app()->request->baseUrl; ?>/images/p2.jpg">
                                                                                                                                        <?php } ?>                                                                                                                                        <img class="lockz" src="<?php echo Yii::app()->request->baseUrl; ?>/images/lock.png">
                                                                                                                                        <p>Password Protected</p>
                                                                                                                                </div>
                                                                                                                                <h1><?= $match->first_name; ?></h1>
                                                                                                                                <h1><?php echo date('Y') - date('Y', strtotime($match->dob_year)); ?>
                                                                                                                                        <?php
                                                                                                                                        if ($match->height != 0) {
                                                                                                                                                echo "," . MasterHeight::model()->findByPk($match->height)->height;
                                                                                                                                        }
                                                                                                                                        ?></h1>
                                                                                                                                <?php echo CHtml::link('Full profile', array('Partner/Partnerdetails', 'userid' => $match->user_id), array('class' => 'viewallz')); ?>
                                                                                                                        </div>
                                                                                                                </div>
                                                                                                                <?php
                                                                                                        }
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
                                                                                                        if ($twowaymatche->photo_visibility == 1) {
                                                                                                                ?>
                                                                                                                <div class="item">
                                                                                                                        <div class="main">
                                                                                                                                <div class="profile ">
                                                                                                                                        <img class="center-block file img-responsive fullz img_profile" src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/user/1000/<?= $twowaymatche->id; ?>/profile/<?= $twowaymatche->photo ?>">
                                                                                                                                </div>
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

                                                                                                        <?php } if ($twowaymatche->photo_visibility == 2) { ?>
                                                                                                                <div class="item">
                                                                                                                        <div class="main">
                                                                                                                                <div class="profile ">
                                                                                                                                        <?php if ($twowaymatche->gender == 1) { ?>
                                                                                                                                                <img class="center-block file img-responsive fullz img_profile" src="<?php echo Yii::app()->request->baseUrl; ?>/images/gen.jpg">
                                                                                                                                        <?php } else { ?>
                                                                                                                                                <img class="center-block file img-responsive fullz img_profile" src="<?php echo Yii::app()->request->baseUrl; ?>/images/p2.jpg">
                                                                                                                                        <?php } ?>                                                                                                                                        <img class="lockz" src="<?php echo Yii::app()->request->baseUrl; ?>/images/lock.png">
                                                                                                                                        <p>Visible on Accept/Sent</p>
                                                                                                                                </div>
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
                                                                                                        <?php } if ($twowaymatche->photo_visibility == 3) { ?>
                                                                                                                <div class="item">
                                                                                                                        <div class="main">
                                                                                                                                <div class="profile ">
                                                                                                                                        <?php if ($twowaymatche->gender == 1) { ?>
                                                                                                                                                <img class="center-block file img-responsive fullz img_profile" src="<?php echo Yii::app()->request->baseUrl; ?>/images/gen.jpg">
                                                                                                                                        <?php } else { ?>
                                                                                                                                                <img class="center-block file img-responsive fullz img_profile" src="<?php echo Yii::app()->request->baseUrl; ?>/images/p2.jpg">
                                                                                                                                        <?php } ?>                                                                                                                                        <img class="lockz" src="<?php echo Yii::app()->request->baseUrl; ?>/images/lock.png">
                                                                                                                                        <p>Password Protected</p>
                                                                                                                                </div>
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
                                                                                                                        if ($visitor->photo_visibility == 2) {
                                                                                                                                ?>
                                                                                                                                <div class="item">
                                                                                                                                        <div class="main">
                                                                                                                                                <div class="profile ">
                                                                                                                                                        <?php if ($visitor->gender == 1) { ?>
                                                                                                                                                                <img class="center-block file img-responsive fullz img_profile" src="<?php echo Yii::app()->request->baseUrl; ?>/images/gen.jpg">
                                                                                                                                                        <?php } else { ?>
                                                                                                                                                                <img class="center-block file img-responsive fullz img_profile" src="<?php echo Yii::app()->request->baseUrl; ?>/images/p2.jpg">
                                                                                                                                                        <?php } ?>                                                                                                                                                        <img class="lockz" src="<?php echo Yii::app()->request->baseUrl; ?>/images/lock.png">
                                                                                                                                                        <p>Visible on Accept/sent</p>
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
                                                                                                                        <?php } if ($visitor->photo_visibility == 1) { ?>


                                                                                                                                <div class="item">
                                                                                                                                        <div class="main">
                                                                                                                                                <div class="profile ">
                                                                                                                                                        <img class="center-block file img-responsive fullz img_profile" src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/user/1000/<?= $visitor->id; ?>/profile/<?= $visitor->photo ?>">

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
                                                                                                                        <?php } if ($visitor->photo_visibility == 3) { ?>
                                                                                                                                <div class="item">
                                                                                                                                        <div class="main">
                                                                                                                                                <div class="profile ">
                                                                                                                                                        <?php if ($visitor->gender == 1) { ?>
                                                                                                                                                                <img class="center-block file img-responsive fullz img_profile" src="<?php echo Yii::app()->request->baseUrl; ?>/images/gen.jpg">
                                                                                                                                                        <?php } else { ?>
                                                                                                                                                                <img class="center-block file img-responsive fullz img_profile" src="<?php echo Yii::app()->request->baseUrl; ?>/images/p2.jpg">
                                                                                                                                                        <?php } ?>                                                                                                                                                         <img class="lockz" src="<?php echo Yii::app()->request->baseUrl; ?>/images/lock.png">
                                                                                                                                                        <p>Password Protected</p>
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

        </div>
</section>


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