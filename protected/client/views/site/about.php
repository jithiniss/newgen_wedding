<section class="banner">
        <img src="<?php echo Yii::app()->request->baseUrl . '/uploads/banner/' . $banner->id . '/banner.' . $banner->banner; ?>">
</section>


<section class="about-us">
        <div class="container">
                <div class="row">
                        <div class="col-md-12">
                                <h1>About <span class="us">Us</span></h1>
                                <?php echo $about->big_content; ?>


                        </div>
                </div>
        </div>
</section>