<div class="profile ">
        <?php
        if ($partner->photo != '') {
                $folder = Yii::app()->Upload->folderName(0, 1000, $partner->id);
                ?>
                <?php
                if ($partner->photo_visibility == 1) {
                        ?>
                        <a style="text-decoration: none" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Partner/Partnerdetails/userid/<?php echo $partner->user_id; ?>">

                                <img  class = "center-block img-responsive side" src = "<?php echo Yii::app()->baseUrl . '/uploads/user/' . $folder . '/' . $partner->id . '/profile/' . $partner->photo; ?>">
                        </a>
                        <?php
                } else if ($partner->photo_visibility == 2) {
                        if (!empty($intrest_send)) {
                                ?>
                                <a style="text-decoration: none" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Partner/Partnerdetails/userid/<?php echo $partner->user_id; ?>">

                                        <img class="center-block img-responsive side" style="max-height: 256px;" src = "<?php echo Yii::app()->baseUrl . '/uploads/user/' . $folder . '/' . $partner->id . '/profile/' . $partner->photo; ?>">
                                </a>   <?php
                        } else {
                                ?>
                                <?php if ($partner->gender == 1) { ?>
                                        <img  class="center-block img-responsive side" src="<?php echo Yii::app()->request->baseUrl; ?>/images/gen.jpg">
                                <?php } else { ?>
                                        <img  class="center-block img-responsive side" src="<?php echo Yii::app()->request->baseUrl; ?>/images/w4.jpg">
                                <?php } ?>
                                <img class="lockz" src="<?php echo Yii::app()->request->baseUrl; ?>/images/lock.png">
                                <h6>Visible on Accept</h6>
                        <?php } ?>
                        <?php
                } else if ($partner->photo_visibility == 3) {
                        ?>
                        <?php if ($partner->gender == 1) { ?>
                                <img  class="center-block img-responsive side" src="<?php echo Yii::app()->request->baseUrl; ?>/images/gen.jpg">
                        <?php } else { ?>
                                <img   class="center-block img-responsive side" src="<?php echo Yii::app()->request->baseUrl; ?>/images/w4.jpg">
                        <?php } ?>
                        <img class="lockz" src="<?php echo Yii::app()->request->baseUrl; ?>/images/lock.png">
                        <h6>Password Protected</h6>
                        <?php
                } else {
                        ?>
                        <a style="text-decoration: none" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Partner/Partnerdetails/userid/<?php echo $partner->user_id; ?>">
                                <img class="center-block img-responsive side" src="<?php echo Yii::app()->request->baseUrl; ?>/images/w1.jpg">
                        </a>
                <?php } ?>
                <?php
        } else {
                ?>
                <?php if ($partner->gender == 1) { ?>
                        <a style="text-decoration: none" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Partner/Partnerdetails/userid/<?php echo $partner->user_id; ?>">
                                <img class="center-block img-responsive side" src="<?php echo Yii::app()->request->baseUrl; ?>/images/demo-male.jpg">
                        </a>
                <?php } else { ?>
                        <a style="text-decoration: none" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Partner/Partnerdetails/userid/<?php echo $partner->user_id; ?>">
                                <img class="center-block img-responsive side" src="<?php echo Yii::app()->request->baseUrl; ?>/images/demo-female.jpg">
                        </a>
                <?php } ?>
        <?php } ?>

</div>
