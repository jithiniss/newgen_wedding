
<div class="row">
    <div class="col-md-12 mynewgen nest">



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

</div>

<div class="row">
    <div class="col-md-12 newgens short">
        <?php echo CHtml::link('<h3>Account Settings</h3>', array('vendor/myProfile')); ?>
        <?php echo CHtml::link(' <h3>My Services</h3>', array('vendor/home')); ?>
        <?php echo CHtml::link(' <h3>Log Out</h3>', array('vendor/logout')); ?>
    </div>

</div>
