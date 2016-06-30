<?php
if (!empty($data)) {
        $detail = UserDetails::model()->findByAttributes(array('user_id' => $data->partner_id));
        ?>
        <div class="ui-send">
            <div class="send-left">
                <img class="sends" src="<?= Yii::app()->baseUrl; ?>/images/h1.png">
            </div>

            <div class="send-right">
                <h1><?= $detail->first_name . ' ' . $detail->last_name ?></h1>
                <h2><?php echo date('Y') - $detail->dob_year;
        ?>, <?= $detail->height ?>, <?php echo MasterReligion::model()->findByPk($detail->religion)->religion; ?>,<?= $detail->mothertongue ?>, <?php echo MasterWorkingAs::model()->findByPk($detail->working_as)->working_as; ?>, <?= $detail->home_town ?>,</h2>
                <div class="lev-1">
                    <?php echo CHtml::link('Cancel', array('Myaccount/Reject', 'id' => $data->id), array('class' => 'connect-6')); ?>
                </div>
                <div class="lev-2">
                    <h3><?php echo date(" dS F Y", strtotime($data->date)); ?></h3>
                </div>
            </div>
        </div>
<?php } ?>