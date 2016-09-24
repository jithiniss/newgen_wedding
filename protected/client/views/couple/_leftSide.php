<div class="col-md-3 newgens short">

        <div class="messagez ">

                <?php if ($model->photo != '') { ?>
                        <img class="center-block line" src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/couple/1000/<?= $model->id; ?>/profile/<?= $model->photo ?>">
                <?php } else {
                        ?>

                        <img class="center-block line" src="<?php echo Yii::app()->request->baseUrl; ?>/images/demo-female.jpg">

                        <?php
                }
                ?>

        </div>
        <h3>Profile</h3>
        <ul class="list-unstyled">
                <li>   <?php echo CHtml::link('My Profile', array('Couple/myprofile')); ?></li>
        </ul>
        <h3>Settings</h3>
        <ul class="list-unstyled">
                <li>   <?php echo CHtml::link('Account Settings', array('Couple/accountsettings')); ?></li>
                <li>   <?php echo CHtml::link('Change Password', array('Couple/changePassword')); ?></li>
                <li>   <?php echo CHtml::link('Log Out', array('couple/logout')); ?></li>
        </ul>



</div>

