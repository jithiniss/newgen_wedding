<?php
if (!empty($data)) {
        $visitors = UserDetails::model()->findAllByAttributes(array('id' => $data->user_id));
        foreach ($visitors as $visitor) {
                ?>


                <div class="col-md-4 col-sm-6 col-xs-6 sized">

                        <div class="load">

                                                                                                                                                                                                                                                                                                                                                <!--<img class="center-block img-responsive side" src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/user/1000/<?= $visitor->id; ?>/profile/<?= $visitor->photo ?>">-->
                                <?php
                                $this->widget("application.client.widgets.PhotoVisibility", array(
                                    'id' => $visitor->id,
                                    'width' => 262,
                                    'height' => 257,
                                ));
                                ?>
                                <div class="user_connect">
                                        <div class="details_length">
                                                <h1><?= $visitor->first_name; ?></h1>
                                                <h2>Profile created by <?= $visitor->profileFor->profile_for; ?> </h2>
                                                <h3><?php echo date('Y') - date('Y', strtotime($visitor->dob_year)); ?>
                                                        <?php
                                                        if ($visitor->height != 0) {
                                                                echo "," . MasterHeight::model()->findByPk($visitor->height)->height;
                                                        }
                                                        ?>, <?= $visitor->religion0->religion; ?></h3>
                                                <h3><?= $visitor->workingAs->working_as; ?></h3>
                                                <h3><?= $visitor->state0->state; ?>, <?= $visitor->country0->country; ?></h3>
                                                <h3>Grew up in <?= $visitor->country0->country; ?></h3>
                                        </div>
                                        <div class="connect">
                                                <?php
                                                $this->widget("application.client.components.UserInterestConnect", array(
                                                    'interest_id' => $visitor->user_id,
                                                ));
                                                ?>

                                        </div>
                                </div>

                        </div>

                </div>



                <?php
        }
}
?>
