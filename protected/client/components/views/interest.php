<style>
        span.newpops {
                padding-top: 0px;
                color: #0e8e81;
                font-weight: 500;
                font-family: 'Roboto', sans-serif;
                margin-bottom: 2px;
                font-size: 19px;
                text-align: center !important;
                padding-top: 12%;
                margin-top: 9px;
                margin-left: 0px;
                /* text-transform: uppercase; */
                padding-left: 0;
                padding-right: 0;
                margin-bottom: 18px;
                line-height: 24px;
                display: block;
        }
        .modal-content.dialogs.report {
                top: 200px;
                height: 324px;
                padding-left: 20px;
                padding-right: 20px;
                background-color: #f1f1f1;
                border:0;
        }
        a.btn.btn-info.ui-pops {
                background-color: #fb719a;
                border: 0;
                width: 100%;
                max-width: 133px;
                margin: auto;
                display: block;
                text-transform: uppercase;
                font-weight: 500;
                margin-top: 6%;
                font-size: 17px;
        }
</style>
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
<?php $partner = UserDetails::model()->findByAttributes(array('user_id' => $id)); ?>
<div class="connect-6">
        <?php if (empty($request_details)) { ?>
                <h5>Do you want to connect?</h5>
                <div class="yes">
                        <div class="f4">

                                <a href="<?= Yii::app()->baseUrl; ?>/index.php/Partner/SendInterest/userid/<?= $id ?>" class="connect-3">Yes</a>
                        </div>
                        <div class="f5"><a href="#" class="connect-4">No</a></div>
                </div>
        <?php } else { ?>
                <?php if ($request_details->status == 1) { ?>
                        <div class="request_result">
                                <button type="button" class="btn btn-default btn-interest">Interest Send</button>
                        </div>
                <?php } else if ($request_details->status == 2) { ?>
                        <h5>Accepted Your Interest</h5>
                <?php } else if ($request_details->status == 3) { ?>
                        <h5>Your Interest is Pending</h5>
                <?php } else if ($request_details->status == 4) { ?>
                        <h5>Your Interest is Declined</h5>
                <?php } ?>
        <?php } ?>
        <div class="clearfix"></div>
        <?php if (Yii::app()->controller->id != "search") { ?>

                <?php if ($plan_details->send_message_left > 0) { ?>
                        <a href="<?= Yii::app()->baseUrl; ?>/index.php/Message/Index/id/<?php echo $id; ?>"  class="offsets"><i class="fa car fa-envelope"></i>Send a message<i class="fa car fa-caret-right"></i></a>
                <?php } else { ?>
                        <a href="#" data-toggle="modal" data-target="#myModal1" class="offsets"><i class="fa car fa-envelope"></i>Send a message<i class="fa car fa-caret-right"></i></a>
                <?php } ?>
                <button type="button" class="btn btn-info offsets-btn view_contact" id="<?php echo $id; ?>" data-toggle="modal" data-target="#myModal"><i class="fa car fa-phone"></i>View  Contacts<i class="fa car fa-caret-right"></i></button>

                <?php
                $favorite = Favorites::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id'], 'partner_id' => $user_details->id, 'status' => 1));

                if (empty($favorite)) {
                        ?>
                        <a href="<?= Yii::app()->baseUrl; ?>/index.php/Partner/Favorites?userid=<?php echo $id; ?>"  class="offsets"><i class="fa car fa-star"></i>Add To Favorite</a>
                        <!--echo CHtml::link('<i class="fa car fa-star"></i>Add To Favorite<i class="fa car fa-caret-right"></i>', 'partner/Favorites?userid=' . $id, array('class' => "offsets"));-->
                <?php } else {
                        ?>
                        <a href="<?= Yii::app()->baseUrl; ?>/index.php/Partner/Remove?userid=<?php echo $id; ?>"  class="offsets"><i class="fa car fa-star"></i>Remove From Favorite</a>
                                          <!--echo CHtml::link('<i class="fa car fa-star"></i>Remove From Favorite', 'Remove?userid=' . $id, array('class' => "offsets"));-->
                <?php }
                ?>
        <?php } ?>
<!--        <a href="#" class="offsets"><i class="fa car fa-phone"></i>View  Contacts<i class="fa car fa-caret-right"></i></a>-->
        <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content dialogs">
                                <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                        <?php if ($plan_details->view_contact_left > 0) { ?>
                                                <div class="common">
                                                        <div class="col-sm-3 col-xs-3 zeros">
                                                                <label for="textinput" class="control-label">Email</label>
                                                        </div>
                                                        <div class="col-sm-1 col-xs-1 zeros">
                                                                <label for="textinput" class="control-label">:</label>
                                                        </div>
                                                        <div class="col-sm-8 col-xs-8 zeros">
                                                                <div class="form-group do">
                                                                        <input type="text" class="grd web" id="email" readonly="" placeholder="<?php echo $partner->email; ?>">
                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="common">
                                                        <div class="col-sm-3 col-xs-3 zeros">
                                                                <label for="textinput" class="control-label">Phone</label>
                                                        </div>
                                                        <div class="col-sm-1 col-xs-1 zeros">
                                                                <label for="textinput" class="control-label">:</label>
                                                        </div>
                                                        <div class="col-sm-8 col-xs-8 zeros">
                                                                <div class="form-group do">
                                                                        <a class="grd web" href="tel:<?php echo $partner->contact_number; ?>"><?php echo $partner->contact_number; ?></a>
                                                                        <!--<input type="text" class="grd web" id="email" readonly="" placeholder="<?php echo $partner->contact_number; ?>">-->
                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="common">
                                                        <div class="col-sm-3 col-xs-3 zeros">
                                                                <label for="textinput" class="control-label">Address</label>
                                                        </div>
                                                        <div class="col-sm-1 col-xs-1 zeros">
                                                                <label for="textinput" class="control-label">:</label>
                                                        </div>
                                                        <div class="col-sm-8 col-xs-8 zeros">
                                                                <div class="form-group do">
                                                                        <div class="form-group">
                                                                                <h4><?php echo $partner->house_name; ?> , <?php echo $partner->home_town; ?></h4>
                                                                                <h4><?php echo $partner->zip_code; ?> , <?php echo MasterCity::model()->findByPk($partner->city)->city; ?></h4>
                                                                                <h4><?php echo MasterState::model()->findByPk($partner->state)->state; ?> , <?php echo MasterCountry::model()->findByPk($partner->country)->country; ?></h4>
                                                                        </div>
                                                                </div>
                                                        </div>

                                                </div>
                                                <b>Remaining Contacts : <b id="remaining"></b></b>


                                        <?php } else { ?>
                                                <div class="common">
                                                        <h4>Please Upgrade Your plan to see the contact Details</h4>
                                                        <?php echo CHtml::link('Upgrade', array('register/FifthStep'), array("class" => "btn btn-info offsets-btn")); ?>
                                                </div>
                                        <?php } ?>
                                </div>


                        </div>

                </div>
        </div>
        <?php if (isset(Yii::app()->session['user'])) { ?>
                <div id="myModal1" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content dialogs report">
                                        <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                                        </div>
                                        <div class="modal-body">


                                                <span class="newpops">Please Upgrade Your Plan To See The Contact Details</span>

                                                <?php echo CHtml::link('Upgrade', array('register/FifthStep'), array('class' => 'btn btn-info ui-pops')); ?>

                                        </div>

                                </div>

                        </div>
                </div>
        <?php } else { ?>

                <div id="guest_user_search" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content dialogs report">
                                        <div class="modal-body">
                                                <span class="newpops">Please Login to see the search result</span>
                                                <?php echo CHtml::link('Login', array('site/login'), array('class' => 'btn btn-info ui-pops')); ?>
                                        </div>
                                </div>
                        </div>
                </div>
        <?php } ?>
</div>
