<section class="ui-teams">
        <div class="container">
                <div class="row">
                        <div class="col-md-3">
                                <div class="ui-team">
                                        <ul class="list-unstyled">
                                                <li><?php echo CHtml::link('Message', array('Myaccount/Message')); ?></li>
                                                <li><?php echo CHtml::link('Invitations', array('Myaccount/Invitations')); ?></li>
                                                <li><?php echo CHtml::link('Photo Requests', array('Myaccount/PhotoRequests')); ?></li>

                                        </ul>
                                </div>
                        </div>
                        <div class="col-md-9">
                                <div class="send">
                                        <h4>Photo Requests</h4>
                                        <div class="ui-send">
                                                <div class="send-four">
                                                        <h6>Photo Requests</h6>
                                                        <h5><?= count($requests); ?> Photo Requests Received</h5>
                                                </div>
                                                <div class="send-six">
                                                        <ul class="list-inline list-unstyled">
                                                                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Profile/MyPhotos" class="connect-8">Add Photo</a></li>
                                                        </ul>
                                                </div>
                                        </div>
                                        <h4>Requests</h4>
                                        <?php
                                        foreach ($requests as $requsts) {
                                                $sender_details = UserDetails::model()->findByAttributes(array('id' => $requsts->sender_id));
                                                ?>
                                                <div class="ui-send">
                                                        <div class="send-left">
                                                                <?php
                                                                $this->widget("application.client.widgets.PhotoVisibility", array(
                                                                    'id' => $sender_details->id,
                                                                    'width' => 72,
                                                                    'height' => 79,
                                                                ));
                                                                ?>
                                                        </div>

                                                        <div class="send-right">
                                                                <h1><?= $sender_details->first_name . ' ' . $sender_details->last_name ?></h1>
                                                                <h2><?php echo date('Y') - $sender_details->dob_year; ?>, <?= $sender_details->height ?>,
                                                                        <?php echo MasterReligion::model()->findByPk($sender_details->religion)->religion; ?>,<?= $sender_details->mothertongue ?>,
                                                                        <?php echo MasterWorkingAs::model()->findByPk($sender_details->working_as)->working_as; ?>, <?= $sender_details->home_town ?>,</h2>

                                                                <div class="lev-2">
                                                                        <h3><?php echo date(" dS F Y", strtotime($requsts->date)); ?></h3>
                                                                </div>
                                                        </div>
                                                </div>
                                        <?php } ?>

                                </div>

                        </div>

                </div>
        </div>
</section>