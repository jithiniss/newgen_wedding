<div class="profile">

        <?php
        if ($partner->photo != '') {

                $folder = Yii::app()->Upload->folderName(0, 1000, $partner->id);
                ?>
                <?php
                if ($partner->photo_visibility == 1) {
                        ?>
                        <img class = "center-block img-responsive side" src = "<?php echo Yii::app()->baseUrl . '/uploads/user/' . $folder . '/' . $partner->id . '/profile/' . $partner->photo; ?>">
                        <?php
                } else if ($partner->photo_visibility == 2) {
                        if (!empty($intrest_send)) {
                                ?>
                                <img class = "center-block img-responsive side" src = "<?php echo Yii::app()->baseUrl . '/uploads/user/' . $folder . '/' . $partner->id . '/profile/' . $partner->photo; ?>">

                                <img class="center-block img-responsive side" src="<?php echo Yii::app()->request->baseUrl; ?>/images/w1.jpg">
                        <?php } else if (!empty($intrest_send)) {
                                ?>
                                <img class = "center-block img-responsive side" src = "<?php echo Yii::app()->baseUrl . '/uploads/user/' . $folder . '/' . $partner->id . '/profile/' . $partner->photo; ?>">
                        <?php } else { ?>
                                <img class="center-block img-responsive side" src="<?php echo Yii::app()->request->baseUrl; ?>/images/w4.jpg">
                                <img class="lock" src="<?php echo Yii::app()->request->baseUrl; ?>/images/lock.png">
                                <h6>Visible on Accept</h6>
                        <?php } ?>
                <?php } else if ($partner->photo_visibility == 2) { ?>
                        <img class="center-block img-responsive side" src="<?php echo Yii::app()->request->baseUrl; ?>/images/w4.jpg">
                        <img class="lock" src="<?php echo Yii::app()->request->baseUrl; ?>/images/lock.png">
                        <h6>Password Protected</h6>
                <?php } else { ?>
                        <img class="center-block img-responsive side" src="<?php echo Yii::app()->request->baseUrl; ?>/images/w1.jpg">
                <?php } ?>
        <?php } else {
                ?>
                <img class="center-block img-responsive side" src="<?php echo Yii::app()->request->baseUrl; ?>/images/w1.jpg">
        <?php } ?>

</div>
