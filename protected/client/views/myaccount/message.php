<section class="ui-teams">
        <div class="container">
                <div class="row">
                        <div class="col-md-3">

                                <?php $this->renderPartial('_leftSide'); ?>
                        </div>

                        <div class="col-md-9">
                                <div class="send">
                                        <?php if (!empty($message)) { ?>
                                                <?php
                                                foreach ($message as $msg) {
                                                        ?>
                                                        <div class="ui-send ">
                                                                <div class="send-left">
                                                                        <?php
                                                                        $this->widget("application.client.widgets.PhotoVisibility", array(
                                                                            'id' => $msg->sender_id,
                                                                            'width' => 72,
                                                                            'height' => 79,
                                                                        ));
                                                                        ?>
                                                                </div>

                                                                <div class="send-right">
                                                                        <h1><?= $msg->sender->first_name . ' ' . $msg->sender->last_name ?></h1>
                                                                        <h2><?php echo date('Y') - $msg->sender->dob_year; ?>, <?= $msg->sender->height ?>,
                                                                                <?php echo MasterReligion::model()->findByPk($msg->sender->religion)->religion; ?>,<?= $msg->sender->mothertongue ?>,
                                                                                <?php echo MasterWorkingAs::model()->findByPk($msg->sender->working_as)->working_as; ?>, <?= $msg->sender->home_town ?>,
                                                                        </h2>
                                                                        <div class="lev-1">
                                                                                <?php echo CHtml::link('View Message', array('Message/ViewMessage', 'id' => $msg->sender->user_id), array('class' => 'connect-7')); ?>
                                                                        </div>
                                                                        <div class="lev-2">
                                                                                <h3><?php echo date(" dS F Y", strtotime($msg->DOC)); ?></h3>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                <?php }
                                                ?>
                                                <?php
                                        } else {
                                                echo 'No Result';
                                        }
                                        ?>
                                </div>

                        </div>
                </div>
        </div>
</section>
