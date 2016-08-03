<?php
/* @var $this MailSmsAlertController */
/* @var $model MailSmsAlert */
/* @var $form CActiveForm */
?>
<style>
        .slick-dots li{
                background-color: transparent;
        }


</style>
<section class="religion">
        <div class="container">
                <div class="row">

                        <div class="col-md-3 newgens">
                                <h3>Settings</h3>
                                <ul class="list-unstyled">
                                        <?php
                                        $this->renderPartial('_leftSideSettings');
                                        ?>

                                </ul>
                        </div>
                        <div class="col-md-9 alert_sms">
                                <h2>My Alerts Manager</h2>
                                <p>Manage your subscriptions to Newgen wedding Alerts on email listed below. You can also subscribe to Newgen wedding and Newgen wedding times Newsletters</p>
                                <?php
                                $form = $this->beginWidget('CActiveForm', array(
                                    'id' => 'mail-sms-alert-MailSmsAlert-form',
                                    // Please note: When you enable ajax validation, make sure the corresponding
                                    // controller action is handling ajax validation correctly.
                                    // See class documentation of CActiveForm for details on this,
                                    // you need to use the performAjaxValidation()-method described there.
                                    'enableAjaxValidation' => false,
                                ));
                                ?>

                                <div class="zeros">
                                        <!--****-->
                                        <div class="strip">
                                                <div class="rel">
                                                        <div class="rel-1">
                                                                <h2>My Alerts</h2>
                                                        </div>

                                                </div>

                                                <div class="strip-padding">
                                                        <div class="common">
                                                                <h2>Match Mail & Photo Match Mail</h2>
                                                        </div>
                                                        <div class="common">
                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                        <p>Personalized matches for you delivered via email as often as you like. A very effective match-making tool.</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-4 zeros"><?php echo $form->radioButtonList($model, 'photo_mail', array('1' => 'Daily', '2' => 'Tri-Weekly', '3' => 'Weekly', '4' => 'Unsubscribe'), array('class' => 'row'));
                                ?>
                                                                        <?php echo $form->error($model, 'photo_mail'); ?></div>
                                                        </div>
                                                        <div class="common">
                                                                <h2>Premium Match Mail</h2>
                                                        </div>
                                                        <div class="common">
                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                        <p>An email notification containing your Matches who have upgraded to a Premium Membership.</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-4 zeros"><?php echo $form->radioButtonList($model, 'premium_mail', array('1' => 'Weekly', '2' => 'Unsubscribe'), array('class' => 'row'));
                                                                        ?>
                                                                        <?php echo $form->error($model, 'premium_mail'); ?></div>
                                                        </div>

                                                        <div class="common">
                                                                <h2>Recent Visitors Email</h2>
                                                        </div>
                                                        <div class="common">
                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                        <p>An email notification of Members who have recently Viewed your Profile</p>
                                                                </div>

                                                                <div class="col-sm-4 col-xs-4 zeros"><?php echo $form->radioButtonList($model, 'recent_visitor_mail', array('1' => 'Daily', '2' => 'Unsubscribe'), array('class' => 'row'));
                                                                        ?>
                                                                        <?php echo $form->error($model, 'recent_visitor_mail'); ?></div>
                                                        </div>

                                                        <div class="common">
                                                                <h2>Members who Shortlisted you Email</h2>
                                                        </div>
                                                        <div class="common">
                                                                <div class="col-sm-8 col-xs-10 zeros">
                                                                        <p>An email notification of Members who have recently Shortlisted your Profile</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-2 zeros"> <?php echo $form->radioButtonList($model, 'shortlist_mail', array('1' => 'Weekly', '2' => 'Unsubscribe'), array('class' => 'row'));
                                                                        ?>
                                                                        <?php echo $form->error($model, 'shortlist_mail'); ?></div>
                                                        </div>

                                                        <div class="common">
                                                                <h2>Viewed Profiles Email</h2>
                                                        </div>
                                                        <div class="common">
                                                                <div class="col-sm-8 col-xs-10 zeros">
                                                                        <p>An email reminder containing Profiles you have Viewed recently but have not yet invited to Connect.</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-2 zeros"> <?php echo $form->radioButtonList($model, 'viewed_profile_mail', array('1' => 'Daily', '2' => 'Unsubscribe'), array('class' => 'row'));
                                                                        ?>
                                                                        <?php echo $form->error($model, 'viewed_profile_mail'); ?></div>
                                                        </div>

                                                        <div class="common">
                                                                <h2>Similar Profiles Email</h2>
                                                        </div>
                                                        <div class="common">
                                                                <div class="col-sm-8 col-xs-10 zeros">
                                                                        <p>An email containing Profiles that are similar to the ones you have liked recently.</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-2 zeros"><?php echo $form->radioButtonList($model, 'similar_profile_mail', array('1' => 'Bi-Weekly', '2' => 'Unsubscribe'), array('class' => 'row'));
                                                                        ?>
                                                                        <?php echo $form->error($model, 'similar_profile_mail'); ?></div>
                                                        </div>

                                                        <div class="common">
                                                                <h2>SMS Alert</h2>
                                                        </div>
                                                        <div class="common">
                                                                <div class="col-sm-8 col-xs-10 zeros">
                                                                        <p>All SMS alerts will be sent to you on this mobile phone number - <?php echo $user->mobile_number; ?></p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-2 zeros"><?php echo $form->radioButtonList($model, 'sms_alert', array('1' => 'For every Invitation received (max 2 per/day)', '2' => 'For every Accept to my Invitation (max 2 per/day)'), array('class' => 'row'));
                                                                        ?>
                                                                        <?php echo $form->error($model, 'sms_alert'); ?></div>
                                                        </div>
                                                </div>
                                        </div>

                                        <div class="strip">
                                                <div class="rel">
                                                        <div class="rel-1">
                                                                <h2>Newgen-wedding Newsletters</h2>
                                                        </div>

                                                </div>
                                                <div class="strip-padding">

                                                        <div class="common">
                                                                <h2>Newgen  Specials</h2>
                                                        </div>
                                                        <div class="common">
                                                                <div class="col-sm-8 col-xs-10 zeros">
                                                                        <p>Invitations, Discounts, and Offers just for Newgen wedding members. Offers range from free holidays to discounted jewellery. Delivered not more than twice a month.</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-2 zeros"><?php echo $form->radioButtonList($model, 'notification_offers', array('1' => 'Occasionally - Not more than twice a month', '2' => 'Unsubscribe'), array('class' => 'row'));
                                                                        ?>
                                                                        <?php echo $form->error($model, 'notification_offers'); ?></div>
                                                        </div>

                                                        <div class="common">
                                                                <h2>Newgen InSite</h2>
                                                        </div>
                                                        <div class="common">
                                                                <div class="col-sm-8 col-xs-10 zeros">
                                                                        <p>Advice and updates from Newgen wedding to help you get the most out of your Newgen wedding experience. A must-have.</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-2 zeros"> <?php echo $form->radioButtonList($model, 'newgen_insite_alert', array('1' => 'Monthly', '2' => 'Unsubscribe'), array('class' => 'row'));
                                                                        ?>
                                                                        <?php echo $form->error($model, 'newgen_insite_alert'); ?></div>
                                                        </div>


                                                        <div class="common">

                                                                <div class="form-group">
                                                                        <?php echo CHtml::submitButton('Submit', array('class' => 'btn row-btn btn-default mail_alert')); ?>
                                                                </div>
                                                        </div>


                                                        <?php $this->endWidget(); ?>

                                                </div><!-- form -->
                                        </div>
                                </div>
                                </section>