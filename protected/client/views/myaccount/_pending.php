<?php
if (!empty($data)) {
//        $data = UserDetails::model()->findByAttributes(array('id' => $data->user_id));
        ?>
        <div class="ui-send">
                <div class="send-left ">
                        <?php
                        $this->widget("application.client.widgets.PhotoVisibility", array(
                            'id' => $data->id,
                            'width' => 72,
                            'height' => 79,
                        ));
                        ?>
                </div>
                <!--                <div class="send-left">
                                        <img class="sends" src="<?= Yii::app()->baseUrl; ?>/images/h1.png">
                                </div>-->

                <div class="send-right">
                        <h1><?= $data->first_name . ' ' . $data->last_name ?></h1>
                        <h2><?php echo date('Y') - $data->dob_year;
                        ?>, <?= $data->height ?>, <?php echo MasterReligion::model()->findByPk($data->religion)->religion; ?>,<?= $data->mothertongue ?>, <?php echo MasterWorkingAs::model()->findByPk($data->working_as)->working_as; ?>, <?= $data->home_town ?>,</h2>
                        <div class="lev-1">
                                <?php echo CHtml::link('Accept', array('Myaccount/Accept', 'id' => $data->user_id), array('class' => 'connect-7')); ?>
                                <?php echo CHtml::link('Reject', array('Myaccount/Reject', 'id' => $data->user_id), array('class' => 'connect-6')); ?>
                        </div>
                        <div class="lev-2">
                                <?php
                                $user = Requests::model()->findByAttributes(array('status' => 3, 'partner_id' => $data->user_id, 'user_id' => Yii::app()->session['user']['id']));
                                ?>
                                <h3><?php echo date(" dS F Y", strtotime($user->date)); ?></h3>
                        </div>
                </div>
        </div>
<?php } else { ?>
        <?php echo 'No Result'; ?>
<?php } ?>