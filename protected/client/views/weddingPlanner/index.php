<link href="<?= Yii::app()->baseUrl ?>/css/new.css" rel="stylesheet">
<section class="detail-list">
    <div class="container">
        <div class="row">

            <h1>Wedding <span class="us">Planner</span></h1>
            <?php
            if(!empty($category)) {
                    foreach($category as $category_planner) {
                            ?>
                            <div class="col-md-3 col-sm-6">
                                <div class="wed-plan">

                                    <a href="#">
                                        <?php if($category_planner->field != '') { ?>
                                                <img class="img-responsive center-block" src="<?= Yii::app()->baseUrl ?>/uploads/services/<?= $category_planner->id ?>/<?= $category_planner->field ?>">
                                        <?php } else { ?>
                                                <img class="img-responsive center-block" src="<?= Yii::app()->baseUrl ?>/uploads/service_270x261.jpg">

                                        <?php } ?>
                                    </a>
                                    <div class="plan-hover">
                                        <h4><?php echo $category_planner->name; ?></h4>
                                        <i class="fa violets fa-angle-right"></i>
                                        <?php echo CHtml::link('View more', array('weddingPlanner/category', 'id' => $category_planner->id), array('class' => 'readzz')); ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                    }
            } else {
                    echo 'There is no services available';
            }
            ?>


        </div>
    </div>
</section>
<?php
if(!empty($featured_list)) {
        ?>
        <section class="case-wrp">
            <div class="container">
                <div class="row">
                    <h1>featured <span class="us">listings</span></h1>
                    <?php
                    foreach($featured_list as $featu_list) {
                            ?>
                            <div class="col-xs-12 col-md-6 case-study-margin">

                                <div class="case-box-main img-wraper-main">
                                    <div class="model-ui">

                                        <div class="model-1">
                                            <h5><?php echo $featu_list->name ?></h5>
                                        </div>
                                    </div>

                                    <div class="case-box-img img-inner">

                                        <?php
                                        if($featu_list->image != '') {
                                                $folder = Yii::app()->Upload->folderName(0, 1000, $featu_list->id);
                                                $servicePic = explode('.', $featu_list->image);
                                                ?>
                                                <img class="img-responsive bor" src="<?php echo Yii::app()->baseUrl . '/uploads/vendor/' . $folder . '/' . $featu_list->vendor_id . '/services/' . $featu_list->id . '/' . $servicePic[0] . '_246_172.' . $servicePic[1]; ?>">
                                        <?php } else {
                                                ?>
                                                <img class="img-responsive bor" src="<?php echo Yii::app()->baseUrl . '/uploads/service_246x172.jpg' ?>">

                                                <?php
                                        }
                                        ?>

                                    </div>

                                    <h6>Ayurveda Name: Gradhrasi</h6>
                                    <p><?php echo $featu_list->description ?></p>

                                    <?php echo CHtml::link('<span class="tree">Read more</span>', array('weddingPlanner/detail', 'id' => $featu_list->id)); ?>
                                </div>

                            </div>
                    <?php } ?>
                </div>

            </div>
        </section>
<?php } ?>

