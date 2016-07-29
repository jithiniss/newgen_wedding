<link href="<?= Yii::app()->baseUrl ?>/css/new.css" rel="stylesheet">
<section class="detail-list">
    <div class="container">
        <div class="row" data-sticky_parent="">
            <?php
            $service = MasterServices::model()->findByPk($service_detail->category_id);

            $serviceName = explode(' ', $service->name);
            $t = count($serviceName);
            ?>
            <h1>
                <?php
                foreach($serviceName as $serviceNames[$t]) {
                        if($t % 2 == 0) {
                                ?>
                                <span class="us"><?php echo $serviceNames[$t]; ?></span>
                                <?php
                        } else {
                                echo $serviceNames[$t];
                        }
                        $t++;
                }
                ?>
            </h1>
            <div class="col-md-9 col-sm-12 sticky-div" data-sticky_column="">
                <h2><?php echo $service_detail->name; ?></h2>
                <div class="feat">
                    <div class="scales">
                        <?php
                        if($service_detail->image != '') {
                                $folder1 = Yii::app()->Upload->folderName(0, 1000, $service_detail->id);
                                $service_detailPic = explode('.', $service_detail->image);
                                ?>
                                <img class="img-responsive maps" src="<?php echo Yii::app()->baseUrl . '/uploads/vendor/' . $folder1 . '/' . $service_detail->vendor_id . '/services/' . $service_detail->id . '/' . $service_detailPic[0] . '_809_342.' . $service_detailPic[1]; ?>">
                        <?php } ?>
                    </div>
                    <p><?php echo $service_detail->description; ?></p>


                    <div class="list-f1">
                        <h3>CONTACT INFO</h3>
                        <h4><?php echo $vendor_details->company_name; ?> </h4>
                        <?php
                        $serviceAddrsss = explode(',', $service_detail->address);
                        $r = count($serviceAddrsss);
                        ?>

                        <?php
                        foreach($serviceAddrsss as $serviceAddrssss[$r]) {
                                ?>
                                <h4><?php echo $serviceAddrssss[$r]; ?></h4>
                                <?php
                                $t++;
                        }
                        ?>

                        <h4><?php echo $service_detail->phn_no; ?> </h4>
                        <h4><?php echo $service_detail->email; ?> </h4>
                        <h4><?php echo $service_detail->website; ?> </h4>
                        <div class="clearfix"></div>
                        <ul>
                            <li><a href="<?php echo $service_detail->facebook; ?>" target="_blank"><i class="fa dev fa-facebook"></i></a></li>
                            <li><a href="<?php echo $service_detail->twitter; ?>" target="_blank"><i class="fa dev fa-twitter"></i></a></li>
                            <li><a href="<?php echo $service_detail->google_plus; ?>" target="_blank"><i class="fa dev fa-google-plus"></i></a></li>
                            <li><a href="<?php echo $service_detail->linkdin; ?>" target="_blank"><i class="fa dev fa-linkedin"></i></a></li>
                        </ul>
                    </div>

                    <div class="list-f2">
                        <h3>Our Location</h3>
                        <?php echo $service_detail->map; ?>  </div>
                    <div class="clearfix"></div>
                    <?php
                    if($service_detail->video != '') {
                            $video_id = explode("?v=", $service_detail->video);
                            $video_id1 = $video_id[1];
                            ?>
                            <div class="img-responsive col-sm-12">
                                <div class="col-md-12">
                                    <iframe  src="https://www.youtube.com/embed/<?php echo $video_id1; ?>" frameborder="0" allowfullscreen></iframe></div>
                            </div>  <?php } ?>
                    <div class="clearfix"></div>
                    <!-- Trigger the modal with a button -->


                    <!-- Modal -->
                    <div id="serviceModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content" style=" top: 89px;">
                                <div class="modal-header" style="padding-bottom:0px;">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h1 style="margin-bottom: 0">Enquire Now</h1>

                                </div>
                                <div class="modal-body">
                                    <?php if(Yii::app()->user->hasFlash('enquire_success')): ?>
                                            <div class="alert alert-success" id="success-alert">
                                                <?php echo Yii::app()->user->getFlash('enquire_success'); ?>
                                            </div>
                                    <?php endif; ?>

                                    <div class="form">

                                        <?php
                                        $form = $this->beginWidget('CActiveForm', array(
                                            'id' => 'wedding-planner-enquiry-form',
                                            // Please note: When you enable ajax validation, make sure the corresponding
                                            // controller action is handling ajax validation correctly.
                                            // There is a call to performAjaxValidation() commented in generated controller code.
                                            // See class documentation of CActiveForm for details on this.
                                            'enableAjaxValidation' => true,
                                        ));
                                        ?>


                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <?php echo $form->labelEx($model, 'name'); ?>
                                                <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                                                <?php echo $form->error($model, 'name'); ?>
                                            </div>

                                            <div class="col-md-6 col-sm-12">
                                                <?php echo $form->labelEx($model, 'email'); ?>
                                                <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                                                <?php echo $form->error($model, 'email'); ?>
                                            </div></div>

                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <?php echo $form->labelEx($model, 'contact_no'); ?>
                                                <?php echo $form->textField($model, 'contact_no', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                                                <?php echo $form->error($model, 'contact_no'); ?>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <?php echo $form->labelEx($model, 'address'); ?>
                                                <?php echo $form->textArea($model, 'address', array('rows' => 3, 'cols' => 50, 'class' => 'form-control', 'style' => 'height;100px !important;')); ?>
                                                <?php echo $form->error($model, 'address'); ?>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class=" col-sm-12">
                                                <?php echo $form->labelEx($model, 'message'); ?>
                                                <?php echo $form->textArea($model, 'message', array('rows' => 3, 'cols' => 50, 'class' => 'form-control', 'style' => 'height;100px !important;')); ?>
                                                <?php echo $form->error($model, 'message'); ?>
                                            </div> </div>



                                        <div class="row buttons">
                                            <?php echo CHtml::submitButton('Send', array('class' => 'enquire_plan pull-right')); ?>
                                        </div>

                                        <?php $this->endWidget(); ?>

                                    </div><!-- form -->


                                </div>

                            </div>

                        </div>
                    </div>
                    <?php
                    if(isset(Yii::app()->session['user']) && Yii::app()->session['user'] != '') {
                            ?>
                            <a  class="connect-85" data-toggle="modal" data-target="#serviceModal" style="cursor: pointer">Enquire Now</a>
                    <?php } ?>
                </div>

                <div class="clearfix"></div>
                <div class="row addi">
                    <?php
                    if(!empty($similar_services)) {
                            foreach($similar_services as $similar_service) {
                                    ?>
                                    <div class="teamx">
                                        <div class="wed-plan">
                                            <?php
                                            if($similar_service->image != '') {
                                                    $folder = Yii::app()->Upload->folderName(0, 1000, $similar_service->id);
                                                    $servicePic = explode('.', $similar_service->image);
                                                    ?>

                                                    <img class="img-responsive center-block" src="<?php echo Yii::app()->baseUrl . '/uploads/vendor/' . $folder . '/' . $similar_service->vendor_id . '/services/' . $similar_service->id . '/' . $servicePic[0] . '_271_263.' . $servicePic[1]; ?>">
                                            <?php } else { ?>
                                                    <img class="img-responsive center-block" src="<?php echo Yii::app()->baseUrl . '/uploads/service_270x261.jpg' ?>">

                                            <?php } ?>
                                            <div class="plan-hover">
                                                <h4><?php echo $similar_service->name ?></h4>
                                                <i class="fa violets fa-angle-right"></i>
                                                <?php echo CHtml::link('View more', array('weddingPlanner/detail', 'id' => $similar_service->id), array('class' => 'readzz')); ?>

                                            </div>
                                        </div>
                                    </div>
                                    <?php
                            }
                    }
                    ?>







                </div>

            </div>
            <div class="clearfix visible-xs"></div>
            <div class="col-md-3 col-sm-12" id="sidebar" data-sticky_column>

                <img src="<?= Yii::app()->baseUrl ?>/images/ad.jpg">

            </div>

        </div>
    </div>
</section>


<script src="<?= Yii::app()->baseUrl ?>/js/jquery.sticky-kit.min.js"></script>

<script>

        $(document).ready(function () {
            if ($(window).width() > 1200) {

                $("#sidebar").stick_in_parent();
            }

<?php if($model->getErrors() || Yii::app()->user->hasFlash('enquire_success1') != '') { ?>
                    $("#serviceModal").modal({show: true});
                    $("#success-alert").fadeTo(4000, 500).slideUp(500, function () {
                        $("#success-alert").alert('close');
                        $("#serviceModal").modal('hide');
                    });
<?php } ?>

        });

</script>