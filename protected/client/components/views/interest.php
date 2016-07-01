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
        <h5>Do you want to connect?</h5>

        <div class="yes">
                <div class="f4">

                        <a href="<?= Yii::app()->baseUrl; ?>/index.php/Partner/SendInterest/userid/<?= $id ?>" class="connect-3">Yes</a>
                </div>
                <div class="f5"><a href="#" class="connect-4">No</a></div>
        </div>
        <div class="clearfix"></div>
        <?php if ($plan_details->send_message_left > 0) { ?>
                <a href="<?= Yii::app()->baseUrl; ?>/index.php/Message/Index/id/<?php echo $id; ?>"  class="offsets"><i class="fa car fa-envelope"></i>Send a message<i class="fa car fa-caret-right"></i></a>
        <?php } else { ?>
                <a href="#" data-toggle="modal" data-target="#myModal1" class="offsets"><i class="fa car fa-envelope"></i>Send a message<i class="fa car fa-caret-right"></i></a>
        <?php } ?>
        <button type="button" class="btn btn-info offsets-btn" data-toggle="modal" data-target="#myModal"><i class="fa car fa-phone"></i>View  Contacts<i class="fa car fa-caret-right"></i></button>

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

                                                                        <input type="text" class="grd web" id="email" readonly="" placeholder="<?php echo $partner->contact_number; ?>">
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
                                        <?php } else { ?>
                                                <div class="common">
                                                        <h4>Please Upgrade Your plan to see the contact Details</h4>
                                                        <a href=""  class="btn btn-info offsets-btn" >Upgrade</a>

                                                </div>
                                        <?php } ?>
                                </div>


                        </div>

                </div>
        </div>
        <div id="myModal1" class="modal fade" role="dialog">
                <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content dialogs">
                                <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                                </div>
                                <div class="modal-body">


                                        <div class="common">
                                                <h4>Please Upgrade Your plan to  Message this user</h4>
                                                <a href=""  class="btn btn-info offsets-btn" >Upgrade</a>

                                        </div>
                                </div>


                        </div>

                </div>
        </div>
