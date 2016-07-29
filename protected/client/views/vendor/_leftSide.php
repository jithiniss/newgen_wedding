<div class="col-md-3 newgens short">

    <div class="messagez ">


        <?php if($model->photo != '') { ?>
                <img class="center-block line" src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/vendor/1000/<?= $model->id; ?>/profile/<?= $model->photo ?>">
        <?php } else {
                ?>
                <?php if($model->gender == 1) { ?>
                        <img class="center-block line" src="<?php echo Yii::app()->request->baseUrl; ?>/images/demo-male.jpg">
                <?php } else if($model->gender == 2) { ?>
                        <img class="center-block line" src="<?php echo Yii::app()->request->baseUrl; ?>/images/demo-female.jpg">

                        <?php
                }
        }
        ?>

    </div>
    <h3>Account Settings</h3>
    <ul class="list-unstyled">
        <li>   <?php echo CHtml::link('My Profile', array('vendor/myProfile')); ?></li>
        <li>   <?php echo CHtml::link('Change Password', array('vendor/myProfile')); ?></li>
    </ul>
    <h3>Services</h3>
    <ul class="list-unstyled">
        <li>   <?php echo CHtml::link('My Services', array('vendor/home')); ?></li>
        <li>   <?php echo CHtml::link('Enquiry', array('vendor/enquiry')); ?></li>
    </ul>
    <?php echo CHtml::link(' <h3>Contact Us</h3>', array('vendor/home')); ?>
    <?php echo CHtml::link(' <h3>Log Out</h3>', array('vendor/logout')); ?>

</div>

