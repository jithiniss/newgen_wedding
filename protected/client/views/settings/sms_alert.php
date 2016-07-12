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
                                <p>Manage your subscriptions to Shaadi.com Alerts on email listed below. You can also subscribe to Shaadi.com and ShaadiTimes Newsletters</p>
                                <?php
                                $form = $this->beginWidget('CActiveForm', array(
                                    'id' => 'userdetails-form',
                                    // Please note: When you enable ajax validation, make sure the corresponding
                                    // controller action is handling ajax validation correctly.
                                    // There is a call to performAjaxValidation() commented in generated controller code.
                                    // See class documentation of CActiveForm for details on this.
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



                                                                <div class="col-sm-4 col-xs-4 zeros">
                                                                        <div class="row">
                                                                                <input type="radio" name="photo_mail" value="1"/>Daily
                                                                        </div>
                                                                        <div class="row">
                                                                                <input type="radio" name="photo_mail" value="2"/>Tri-Weekly
                                                                        </div>
                                                                        <div class="row">
                                                                                <input type="radio" name="photo_mail" value="3"/>Weekly
                                                                        </div>
                                                                        <div class="row">
                                                                                <input type="radio" name="photo_mail" value="4"/>Unsubscribe
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <div class="common">
                                                                <h2>Premium Match Mail</h2>
                                                        </div>
                                                        <div class="common">
                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                        <p>Personalized matches for you delivered via email as often as you like. A very effective match-making tool.</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-4 zeros">

                                                                        <div class="row">
                                                                                <input type="radio" name="premium_mail" value="1"/>Weekly
                                                                        </div>
                                                                        <div class="row">
                                                                                <input type="radio" name="premium_mail" value="2"/>Unsubscribe
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <div class="common">
                                                                <h2>Recent Visitors Email</h2>
                                                        </div>
                                                        <div class="common">
                                                                <div class="col-sm-8 col-xs-8 zeros">
                                                                        <p>An email notification of Members who have recently Viewed your Profile</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-4 zeros">

                                                                        <div class="row">
                                                                                <input type="radio" name="recent_visitor_mail" value="1"/>Daily
                                                                        </div>
                                                                        <div class="row">
                                                                                <input type="radio" name="recent_visitor_mail" value="2"/>Unsubscribe
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <div class="common">
                                                                <h2>Members who Shortlisted you Email</h2>
                                                        </div>
                                                        <div class="common">
                                                                <div class="col-sm-8 col-xs-10 zeros">
                                                                        <p>An email notification of Members who have recently Shortlisted your Profile</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-2 zeros">

                                                                        <div class="row">
                                                                                <input type="radio" name="shortlist_mail" value="1"/>Weekly
                                                                        </div>
                                                                        <div class="row">
                                                                                <input type="radio" name="shortlist_mail" value="2"/>Unsubscribe
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <div class="common">
                                                                <h2>Viewed Profiles Email</h2>
                                                        </div>
                                                        <div class="common">
                                                                <div class="col-sm-8 col-xs-10 zeros">
                                                                        <p>An email reminder containing Profiles you have Viewed recently but have not yet invited to Connect.</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-2 zeros">

                                                                        <div class="row">
                                                                                <input type="radio" name="viewed_profile_mail" value="1"/>Weekly
                                                                        </div>
                                                                        <div class="row">
                                                                                <input type="radio" name="viewed_profile_mail" value="2"/>Unsubscribe
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <div class="common">
                                                                <h2>Similar Profiles Email</h2>
                                                        </div>
                                                        <div class="common">
                                                                <div class="col-sm-8 col-xs-10 zeros">
                                                                        <p>An email containing Profiles that are similar to the ones you have liked recently.</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-2 zeros">

                                                                        <div class="row">
                                                                                <input type="radio" name="similar_profile_mail" value="1"/>Bi-Weekly
                                                                        </div>
                                                                        <div class="row">
                                                                                <input type="radio" name="similar_profile_mail" value="2"/>Unsubscribe
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <div class="common">
                                                                <h2>SMS Alert</h2>
                                                        </div>
                                                        <div class="common">
                                                                <div class="col-sm-8 col-xs-10 zeros">
                                                                        <p>All SMS alerts will be sent to you on this mobile phone number - <?php echo $user->mobile_number; ?></p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-2 zeros">

                                                                        <div class="row">
                                                                                <input type="radio" name="sms_alert" value="1"/>For every Invitation received (max 2 per/day)
                                                                        </div>
                                                                        <div class="row">
                                                                                <input type="radio" name="sms_alert" value="2"/>For every Accept to my Invitation (max 2 per/day)
                                                                        </div>
                                                                </div>
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
                                                                        <p>Invitations, Discounts, and Offers just for Shaadi.com members. Offers range from free holidays to discounted jewellery. Delivered not more than twice a month.</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-2 zeros">

                                                                        <div class="row">
                                                                                <input type="radio" name="notification_offers" value="1"/>Occasionally - Not more than twice a month
                                                                        </div>
                                                                        <div class="row">
                                                                                <input type="radio" name="notification_offers" value="2"/>Unsubscribe
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <div class="common">
                                                                <h2>Newgen InSite</h2>
                                                        </div>
                                                        <div class="common">
                                                                <div class="col-sm-8 col-xs-10 zeros">
                                                                        <p>Advice and updates from Shaadi.com to help you get the most out of your Shaadi.com experience. A must-have.</p>
                                                                </div>
                                                                <div class="col-sm-4 col-xs-2 zeros">

                                                                        <div class="row">
                                                                                <input type="radio" name="newgen_insite_alert" value="1"/>Monthly
                                                                        </div>
                                                                        <div class="row">
                                                                                <input type="radio" name="newgen_insite_alert" value="2"/>Unsubscribe
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <div class="common">

                                                                <div class="form-group">
                                                                        <button type="submit" class="btn row-btn btn-default">Save</button>
                                                                </div>
                                                        </div>


                                                </div>
                                        </div>
                                        <?php $this->endWidget(); ?>
                                </div>
                        </div>
                </div>
</section>