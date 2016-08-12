<section class="ui-teams">
        <div class="container">
                <div class="row">
                        <div class="col-md-3">

                                <?php $this->renderPartial('_leftSide'); ?>
                        </div>

                        <div class="col-md-9">
                                <?php if (Yii::app()->user->hasFlash('success')): ?>
                                        <div class="alert alert-success">
                                                <strong>Success!</strong> <?php echo Yii::app()->user->getFlash('success'); ?>
                                        </div>
                                <?php endif; ?>
                                <?php if (Yii::app()->user->hasFlash('error')): ?>
                                        <div class="alert alert-danger">
                                                <strong>Sorry!</strong><?php echo Yii::app()->user->getFlash('error'); ?>
                                        </div>
                                <?php endif; ?>
                                <div class="send">
                                        <?php if (!empty($message)) {
                                                ?>
                                                <?php
                                                foreach ($message as $msg) {
                                                        ?>
                                                <?php } ?>
                                                <div class="view_message">
                                                        <?php
//                                                $this->widget("application.client.widgets.PhotoVisibility", array(
//                                                    'id' => $msg->sender_id,
//                                                    'width' => 72,
//                                                    'height' => 79,
//                                                ));
                                                        ?>
                                                </div>




                                                <?php
                                                foreach ($message as $msg) {
                                                        ?>
                                                        <div class="ui-send ">
                                                                <div class="message">
                                                                        <div class="sender_name_left">
                                                                                <?php
                                                                                $message_person = UserDetails::model()->findByPk($msg->sender_id);
                                                                                ?>
                                                                                <?php if ($message_person->id != Yii::app()->session['user']['id']) { ?>
                                                                                        <?php echo $message_person->first_name; ?> <?php echo $message_person->last_name; ?>
                                                                                <?php } ?>
                                                                                <?php if ($message_person->id == Yii::app()->session['user']['id']) { ?>
                                                                                        <?php echo 'Me'; ?>
                                                                                <?php } ?>
                                                                        </div>
                                                                        <?php if ($msg->sender_id != Yii::app()->session['user']['id']) { ?>
                                                                                <p><?php echo $msg->message; ?></p>
                                                                                <div class="send-right">
                                                                                        <div class="lev-2">
                                                                                                <h3><?php echo date("l jS \of F Y h:i:s A", strtotime($msg->DOC)); ?></h3>
                                                                                        </div>
                                                                                        <div class="lev-2">
                                                                                                <h2><?php
//                                                                                        if ($msg->viewed == 2) {
//                                                                                                echo 'Seen';
//                                                                                        }
                                                                                                        ?></h2>
                                                                                        </div>
                                                                                </div>


                                                                        <?php }
                                                                        ?>

                                                                        <?php if ($msg->sender_id == Yii::app()->session['user']['id']) { ?>
                                                                                <p><?php echo $msg->message; ?></p>
                                                                                <div class="send-right">
                                                                                        <div class="lev-2">
                                                                                                <h3><?php echo date("l jS \of F Y h:i:s A", strtotime($msg->DOC)); ?></h3>
                                                                                        </div>

                                                                                        <h2><?php
                                                                                                if ($msg->viewed == 2) {
                                                                                                        echo 'Seen';
                                                                                                } else {
                                                                                                        echo 'Not Seen';
                                                                                                }
                                                                                                ?></h2>

                                                                                </div>
                                                                        <?php }
                                                                        ?>
                                                                </div>
                                                        </div>

                                                        <?php
                                                }
                                                ?>




                                                <div class="message_reply">
                                                        <div class="ui-send">
                                                                <form action="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Message/ReplyMessage?id=<?php echo $user->id; ?>" method="post" id="reply_message">
                                                                        <textarea id="reply" name="reply_message"></textarea>
                                                                        <input type="submit" name="submit" value="Send" />
                                                                </form>
                                                        </div>
                                                </div>
                                                <div class="lev-1">
                                                        <a href="#" id="reply_button" onclick="reply();" class="connect-7" >Reply</a>
                                                </div>

                                        <?php } else { ?>
                                                <?php echo 'No Result'; ?>
                                        <?php } ?>
                                </div>
                        </div>
                </div>
        </div>
</section>
<script>
        $(".message_reply").hide();
        function reply() {
                $(".message_reply").show();
                $("#reply_button").hide();
        }
</script>
