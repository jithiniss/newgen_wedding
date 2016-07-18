<?php
if (!empty($data)) {
        $visitors = UserDetails::model()->findAllByAttributes(array('user_id' => $data->visited_id));
        foreach ($visitors as $visitor) {
                ?>


                <div class="col-md-4 col-sm-6 col-xs-6 sized">

                        <div class="load">

                                <?php if ($visitor->photo_visibility == 1) { ?>
                                        <img class="center-block img-responsive side" src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/user/1000/<?= $visitor->id; ?>/profile/<?= $visitor->photo ?>">
                                <?php } if ($visitor->photo_visibility == 2) { ?>
                                        <div class="profile mynewgenz ">
                                                <?php if ($visitor->gender == 1) { ?>
                                                        <img class="center-block img-responsive side" src="<?php echo Yii::app()->request->baseUrl; ?>/images/gen.jpg">
                                                <?php } else { ?>
                                                        <img class="center-block img-responsive side" src="<?php echo Yii::app()->request->baseUrl; ?>/images/p2.jpg">
                                                <?php } ?>                                                  <img class="lockz" src="<?php echo Yii::app()->request->baseUrl; ?>/images/lock.png">
                                                <p>Visible on Accept/Sent</p>
                                        </div>
                                <?php } if ($visitor->photo_visibility == 3) { ?>
                                        <div class="profile mynewgenz ">
                                                <?php if ($visitor->gender == 1) { ?>
                                                        <img class="center-block img-responsive side" src="<?php echo Yii::app()->request->baseUrl; ?>/images/gen.jpg">
                                                <?php } else { ?>
                                                        <img class="center-block img-responsive side" src="<?php echo Yii::app()->request->baseUrl; ?>/images/p2.jpg">
                                                <?php } ?>
                                                <img class="lockz" src="<?php echo Yii::app()->request->baseUrl; ?>/images/lock.png">
                                                <p>Password Protected</p>
                                        </div>
                                <?php } ?>
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

                                <div class="connect">
                                        <?php if ($visitor->gender == 1) { ?>
                                                <h5>Connect with him?</h5>
                                        <?php } else { ?>
                                                <h5>Connect with her?</h5>
                                        <?php } ?>


                                        <div class="f2"><a href="#" class="connect-1">Yes</a></div>
                                        <div class="f3"><a href="#" class="connect-2">No</a></div>


                                </div>

                        </div>

                </div>



                <?php
        }
}
?>
