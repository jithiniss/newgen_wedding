<?php if (Yii::app()->user->hasFlash('success')): ?>
        <div class="alert alert-success">
            <strong>Success!</strong> <?php echo Yii::app()->user->getFlash('success'); ?>
        </div>
<?php endif; ?>
<?php if (Yii::app()->user->hasFlash('error')): ?>
        <div class="alert alert-danger">
            <strong>Danger!</strong><?php echo Yii::app()->user->getFlash('error'); ?>
        </div>
<?php endif; ?>
<div class="connect-6">
    <h5>Do you want to connect?</h5>

    <div class="yes">
        <div class="f4">

            <a href="<?= Yii::app()->baseUrl; ?>/index.php/Partner/SendInterest/userid/<?= $id ?>" class="connect-3">Yes</a>
        </div>
        <div class="f5"><a href="#" class="connect-4">No</a></div>
    </div>
    <div class="clearfix"></div>
    <a href="#" class="offsets"><i class="fa car fa-envelope"></i>Send a message<i class="fa car fa-caret-right"></i></a>
    <a href="#" class="offsets"><i class="fa car fa-phone"></i>View  Contacts<i class="fa car fa-caret-right"></i></a>


