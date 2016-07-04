<section class="banner">
        <img src="<?php echo Yii::app()->request->baseUrl . '/uploads/static_pages/' . $banner->id . '/banner.' . $banner->banner; ?>">
</section>


<section class="awards">
        <div class="container">
                <div class="row">
                        <div class="col-md-12">
                                <?php if ($banner->title) { ?><h1><?php echo $banner->title ?><span class="us"><?php echo $banner->heading; ?></span></h1><?php } ?>
                                <?php if ($banner->big_content) { ?>
                                        <?php echo $banner->big_content; ?>
                                <?php } ?>


                                <div class="row lifts">
                                        <?php
                                        foreach ($about as $abouts) {
                                                ?>
                                                <div class="col-md-4 col-sm-4">
                                                        <img class="center-block" src="<?= Yii::app()->baseUrl ?>/uploads/awards/<?php echo $abouts->id; ?>/awards.<?php echo $abouts->image; ?>">
                                                        <h2><?php echo $abouts->year; ?></h2>
                                                        <h3><?php echo $abouts->content; ?></h3>
                                                </div>
                                                <?php
                                        }
                                        ?>



                                </div>





                        </div>
                </div>
        </div>
</section>