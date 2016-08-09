
<style>
        span.newpops {
                padding-top: 0px;
                color: #0e8e81;
                font-weight: 500;
                font-family: 'Roboto', sans-serif;
                margin-bottom: 2px;
                font-size: 19px;
                text-align: center !important;
                padding-top: 12%;
                margin-top: 9px;
                margin-left: 0px;
                /* text-transform: uppercase; */
                padding-left: 0;
                padding-right: 0;
                margin-bottom: 18px;
                line-height: 24px;
                display: block;
        }
        .modal-content.dialogs.report {
                top: 200px;
                height: 324px;
                padding-left: 20px;
                padding-right: 20px;
                background-color: #f1f1f1;
                border:0;
        }
        a.btn.btn-info.ui-pops {
                background-color: #fb719a;
                border: 0;
                width: 100%;
                max-width: 133px;
                margin: auto;
                display: block;
                text-transform: uppercase;
                font-weight: 500;
                margin-top: 6%;
                font-size: 17px;
        }
</style>
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
<?php $partner = UserDetails::model()->findByAttributes(array('user_id' => $id)); ?>
<div class="connect-6">
        <?php if (empty($request_details)) { ?>
                <h5>Do you want to connect?</h5>
                <div class="yes">
                        <div class="f4">

                                <a href="<?= Yii::app()->baseUrl; ?>/index.php/Partner/SendInterest/userid/<?= $id ?>" class="connect-3">Yes</a>
                        </div>
                        <div class="f5"><a href="#" class="connect-4">No</a></div>
                </div>
        <?php } else { ?>
                <?php if ($request_details->status == 1) { ?>
                        <div class="request_result">
                                <button type="button" class="btn btn-default btn-interest">Interest Sent</button>
                        </div>
                <?php } else if ($request_details->status == 2) { ?>
                        <h5>Accepted Your Interest</h5>
                <?php } else if ($request_details->status == 3) { ?>
                        <h5>Your Interest is Pending</h5>
                <?php } else if ($request_details->status == 4) { ?>
                        <h5>Your Interest is Declined</h5>
                <?php } ?>
        <?php } ?>
</div>