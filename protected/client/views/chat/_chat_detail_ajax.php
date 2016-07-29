<?php
foreach ($chats as $chat) {
        $folder = Yii::app()->Upload->folderName(0, 1000, $chat->id);
        $user_details = UserDetails::model()->findByPk($chat->sender);
        if ($chat->sender == Yii::app()->session['user']['id']) {
                ?>
                <li class="right clearfix"><span class="chat-img pull-right">
                        <?php } else { ?>
                                <li class="left clearfix"><span class="chat-img pull-left">
                                        <?php }
                                        ?>

                                        <img alt="New Gen" class="img-circle"  src = "<?php echo Yii::app()->baseUrl . '/uploads/user/' . $folder . '/' . $user_details->id . '/profile/' . $user_details->photo; ?>">

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <!--<img src="<?= Yii::app()->baseUrl ?>/images/a1.jpg" alt="User Avatar" class="img-circle" />-->
                                </span>
                                <div class="chat-body clearfix">
                                        <div class="header">
                                                <strong class="primary-font"><?php echo $user_details->first_name . ' ' . $user_details->last_name; ?> </strong> <small class="pull-right text-muted">
                                                        <span class="glyphicon glyphicon-time"></span><?php echo $this->time_elapsed_string($chat->date); ?></small>
                                        </div>
                                        <p>
                                                <?php if ($chat->feild1 == '') { ?>

                                                        <?php echo $chat->message; ?>
                                                <?php } else { ?>
                <!--                                                        <img src="<?= Yii::app()->baseUrl ?>/images/a1.jpg" alt="User Avatar" class="img-circle" />-->
                                                        <img src = "<?php echo Yii::app()->baseUrl; ?>/uploads/chat/<?php echo $folder; ?>/<?php echo $chat->id; ?>/chatimage/<?php echo $chat->feild1; ?> " width = '100px;'/>


                                                <?php } ?>
                                        </p>
                                </div>
                        </li>
                <?php } ?>

