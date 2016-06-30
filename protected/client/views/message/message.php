<section class="ui-teams">
    <div class="container">
        <div class="row">
            <?php
            foreach ($messages as $mes) {
                    $date_time = $mes->DOC;
                    if ($mes->sender_id == $receiver && $mes->receiver_id == Yii::app()->session['user']['id']) {
                            $receiver_detail = UserDetails::model()->findByPk($mes->sender_id);
                            ?>
                            <div class="upcmg_msg">
                                <div class="msg_img"><img src="" class="img-circle" ></div>

                                <div class="msg_box"  style="padding-left: 290px;">
                                    <h5><?= $receiver_detail->first_name . ' ' . $receiver_detail->last_name ?></h5>
                                    <p><?php echo $mes->message; ?>
                                    </p>
                                    <span><?php echo date('d M Y, H:i A', strtotime($date_time)); ?></span>


                                </div><div style="clear: both"></div>

                            </div>
                            <?php
                    } elseif ($mes->sender_id == Yii::app()->session['user']['id'] && $mes->receiver_id == $receiver) {
                            ?>
                            <div class="upcmg_msg">
                                <div class="msg_img2" ><img class="img-circle" src="" ></div>

                                <div class="msg_box2">
                                    <h5><?php echo $mes->sender->first_name; ?></h5>
                                    <p><?php echo $mes->message; ?>
                                    </p>
                                    <span><?php echo date('d M Y, H:i A', strtotime($date_time)); ?></span>
                                </div>

                                <div style="clear: both"></div>
                            </div>
                            <?php
                    }
                    ?>

            <?php }
            ?>

            <div class="form-group fdbk_cmnt">
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'message-form',
                    // Please note: When you enable ajax validation, make sure the corresponding
                    // controller action is handling ajax validation correctly.
                    // There is a call to performAjaxValidation() commented in generated controller code.
                    // See class documentation of CActiveForm for details on this.
                    'enableAjaxValidation' => false,
                ));
                ?>
                <label for="inputEmail3" class="col-sm-1 control-label feed_inn">Message: </label>
                <div class="col-sm-6">
                    <?php echo $form->textArea($model, 'message', array('rows' => 3, 'class' => 'form-control txt-fld')); ?>
                    <?php echo $form->error($model, 'message'); ?>


                </div>

                <div class="col-sm-2"> <div class="form-group">

                        <div class="col-sm-offset-2 col-sm-11 ">

                            <button type="submit" class="btn btn-default login up up_mrg">SUBMIT</button>
                        </div>
                    </div></div>

                <?php $this->endWidget(); ?>
                <div style=" clear: both"></div> </div>
        </div>
    </div>
</section>






